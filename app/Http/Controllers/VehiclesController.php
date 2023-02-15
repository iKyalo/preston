<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the vehicles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editing = false;

        return view('vehicles.create', compact('editing'));
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vehicle = new Vehicle([
            'number_plate' => $request->get('number_plate'),
            'capacity' => $request->get('capacity'),
            'type' => $request->get('type'),
            'status' => $request->get('status'),
        ]);

        $vehicle->save();

        return redirect('/vehicles')->with('success', 'Vehicle has been added');
    }

    /**
     * Display the specified vehicle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $editing = true;

        return view('vehicles.create', compact('vehicle', 'editing'));
    }

    /**
     * Update the specified vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->get('name');
        $vehicle->status = $request->get('status');
        $vehicle->save();

        return redirect('/vehicles')->with('success', 'Vehicle has been updated');
    }

    /**
     * Remove the specified vehicle from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $vehicle = Vehicle::findOrFail($request->id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle has been deleted successfully');
    }

    
    /**
     * Return list of available vehicles.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function available()
    {
        $vehicles = Vehicle::where('status', 'Available')->get();

        return response()->json($vehicles);
    }

}