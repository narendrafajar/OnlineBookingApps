<?php

namespace App\Http\Controllers;

use App\Models\Treatments;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('treatment');
    protected Treatments $treatments;

    public function __construct(
        Treatments $treatments,
    )
    {
        $this->treatment = $treatments;
    }
    public function index()
    {
        $lstPerawatan = $this->treatment->where('treatment_recomend','!=','1')->get();
        return view('homepage',['lstTreatment'=>$lstPerawatan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Treatments $treatments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatments $treatments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Treatments $treatments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatments $treatments)
    {
        //
    }
}
