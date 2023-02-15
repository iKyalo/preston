<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depot;
use Illuminate\Http\Request;

class DepotsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the depots.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depots = Depot::all();

        return view('depots.index', compact('depots'));
    }

    /**
     * Show the form for creating a new depot.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('depots.create');
    }

    /**
     * Store a newly created depot in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',
        ]);

        $depot = new Depot([
            'name' => $request->get('name'),
            'location' => $request->get('location'),
            'capacity' => $request->get('capacity'),
        ]);

        $depot->save();

        return redirect('/depots')->with('success', 'Depot has been added');
    }

    /**
     * Display the specified depot.
     *
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function show(Depot $depot)
    {
        return view('depots.show', compact('depot'));
    }

    /**
     * Show the form for editing the specified depot.
     *
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function edit(Depot $depot)
    {
        return view('depots.edit', compact('depot'));
    }

    /**
     * Update the specified depot in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depot $depot)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',
        ]);

        $depot->update([
            'name' => $request->get('name'),
            'location' => $request->get('location'),
            'capacity' => $request->get('capacity'),
        ]); 

        return redirect('/depots')->with('success', 'Depot has been updated');
    }

    /**
     * Remove the specified depot from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depot = Depot::findOrFail($id);
        $depot->delete();
        return redirect()->route('depots.index')->with('success', 'Depot deleted successfully!');
    }
}
    
