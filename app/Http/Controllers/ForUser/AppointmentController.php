<?php

namespace App\Http\Controllers\ForUser;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentsDetail;
use App\Models\Treatments;
use App\Models\Categories;
use App\Models\locations;
use App\Models\Therapist;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('locations','appointments');
    protected locations $location;
    protected Treatments $treatment;
    protected Categories $category;
    protected Appointment $appointment;
    protected AppointmentsDetail $appdetail;
    protected Therapist $therapists;

    public function __construct(
        locations $location,
        Treatments $treatment,
        Categories $category,
        Appointment $appointment,
        Therapist $therapists,
        AppointmentsDetail $appdetail,
    )
    {
        $this->location = $location;
        $this->treatment = $treatment;
        $this->category = $category;
        $this->appointment = $appointment;
        $this->therapist = $therapists;
        $this->appDetail = $appdetail;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function location_select()
    {
        $loc = $this->location->all();
        return view('user-page.appointment.form-select-location',['loc'=>$loc]);
    }

    public function treatment_select(Request $request)
    {   
        $cat = $this->category->with('manyTreatments')->get();
        return view('user-page.appointment.form-select-treatment',['cat'=>$cat]);
    }

    public function select_slots()
    {
        return view('user-page.appointment.form-check-slots');
    }

    public function check_slots(Request $request)
    {
        $dateSelect = $request->date;

        $checkDate = $this->appointment
            ->where('appointment_date', $dateSelect)
            ->pluck('appointment_time')
            ->toArray();

        $timeSlots = [
            "08:00:00", "09:00:00", "10:00:00", "11:00:00", "12:00:00",
            "13:00:00", "14:00:00", "15:00:00", "16:00:00", "17:00:00",
            "18:00:00", "19:00:00", "20:00:00", "21:00:00", "22:00:00",
            "23:00:00", "24:00:00"
        ];

        $slots = [];
        foreach ($timeSlots as $slot) {
            $slots[] = [
                'time' => $slot,
                'isAvailable' => !in_array($slot, $checkDate), // Tersedia jika tidak ada di $checkDate
            ];
        }

        return response()->json([
            'date' => $dateSelect,
            'slots' => $slots, // Format semua slot dengan statusnya
        ]);
    }

    public function select_therapist(Request $request)
    {
        return view('user-page.appointment.form-select-therapist');
    }

    public function previewUser()
    {
        return view('user-page.appointment.form-preview');
    }

    public function app_review()
    {
        $code = $this->getTransactionCode();

        return view('user-page.appointment.form-appointment-review',['code'=>$code]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        try {
            $params = $request->input('params');
            $validatedData = $request->validate([
                'params.location_id' => 'required|integer',
                'params.treatments' => 'required|array',
                'params.treatments.*' => 'integer',
                'params.date' => 'required|date',
                'params.time' => 'required|string',
                'params.therapist' => 'required|array',
                'params.therapist.*' => 'integer',
            ]);
            $storeTransaction = DB::transaction(function () use ($request,$params) {           
                $idLocations = $params['location_id'];
                $treatmentId = $params['treatments']; // array
                $date = $params['date'];
                $timeSelect = $params['time'];
                $therapistId = $params['therapist']; // array

                // dd($therapistId);

                $storeAppointment = $this->appointment->create([
                    'app_code' => $this->getTransactionCode(),
                    'users_id' => Auth::user()->id,
                    'appointment_date' => $date,
                    'appointment_time' => $timeSelect,
                ]);

                foreach ($treatmentId as $index => $treatment) {
                    if (isset($therapistId[$index])) {
                        $this->appDetail->create([
                            'app_id' => $storeAppointment->id,
                            'treatment_id' => $treatment,
                            'therapist_id' => $therapistId[$index],
                        ]);
                    }
                }

                return 'success';
            });
            if ($storeTransaction) {
                return response()->json([
                    'success' => true
                ],200);
            } else {
                return response()->json([
                    'error' => true
                ]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            //throw $th;
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Tangkap error umum
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while booking the appointment.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function getTherapist(Request $request)
    {
        
        $treatmentIds = $request->treatmentData;
        $treatmentArray = is_array($treatmentIds) ? $treatmentIds : explode(',', $treatmentIds);

        // $therapists = $this->therapist
        //     ->whereIn('id', function ($query) use ($treatmentArray) {
        //         $query->select('therapist_id')
        //             ->from('treatments')
        //             ->whereIn('id', $treatmentArray);
        //     })
        //     ->get();

        $findTreatment = $this->treatment->whereIn('id',$treatmentArray)->get();

        $findTreatment->load('personTherapist');

            return response()->json([
                'success' => true,
                'treatment' => $findTreatment
            ]);
    }

    public function getAllAppoinment(Request $request)
    {
        // dd($request->all());
        $params = $request->input('params');

        // Debugging: tampilkan data yang diterima
        // dd($data);
        
        $validatedData = $request->validate([
            'params.location_id' => 'required|integer',
            'params.treatments' => 'required|array',
            'params.treatments.*' => 'integer',
            'params.date' => 'required|date',
            'params.time' => 'required|string',
            'params.therapist' => 'required|array',
            'params.therapist.*' => 'integer',
        ]);

        // Mengakses masing-masing parameter dalam array
        $idLocations = $params['location_id'];
        $treatmentId = $params['treatments']; // array
        $date = $params['date'];
        $timeSelect = $params['time'];
        $therapistId = $params['therapist']; // array

        $data['locations'] = $this->location->find($idLocations);

        $data['treatments'] = $this->treatment->whereIn('id',$treatmentId)->with('category')->get();
        // $data['treatments']->load('category');
        $data['date'] = $date;
        $data['time'] = $timeSelect;

        $data['therapist'] = $this->therapist->whereIn('id',$therapistId)->get();

        // dd($data);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function getTransactionCode()
    {
        $nextCode = '000001';

        $getCode = $this->appointment->latest()->orderBy('app_code','desc')->first();

        if($getCode){
            $getNumberCode = substr($getCode->app_code,-6);
            $nextCode = sprintf("%06d", (int)$getNumberCode + 1);
            // dd($getNumberProduct);
        }

        $getNextNumberCode = 'APP'. date('Y') . date('m'). $nextCode;
        // dd($getNexProductNumber);
        return $getNextNumberCode;
    }
}
