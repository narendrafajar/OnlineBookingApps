<?php

namespace App\Http\Controllers\ForUser;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Treatments;
use App\Models\Categories;
use App\Models\locations;
use App\Models\Therapist;
use Illuminate\Http\Request;

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
    protected Therapist $therapists;

    public function __construct(
        locations $location,
        Treatments $treatment,
        Categories $category,
        Appointment $appointment,
        Therapist $therapists,
    )
    {
        $this->location = $location;
        $this->treatment = $treatment;
        $this->category = $category;
        $this->appointment = $appointment;
        $this->therapist = $therapists;
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

        // Ambil jadwal yang sudah ada pada tanggal yang dipilih
        $checkDate = $this->appointment
            ->where('appointment_date', $dateSelect)
            ->pluck('appointment_time')
            ->toArray();

        // Slot waktu yang tersedia
        $timeSlots = [
            "08:00", "09:00", "10:00", "11:00", "12:00",
            "13:00", "14:00", "15:00", "16:00", "17:00",
            "18:00", "19:00", "20:00", "21:00", "22:00",
            "23:00", "24:00"
        ];

        // Siapkan format untuk setiap slot waktu
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
        //
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
