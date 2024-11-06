<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMaestroRequest;
use App\Http\Requests\UpdateMaestroRequest;
use App\Models\Maestro;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('maestros.index')->with([
            'maestro'=>Maestro::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maestros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddMaestroRequest $request)
    {
        if($request->validated()){
            Maestro::create($request->validated());
            return redirect()->route('maestros.index')->with([
                'success'=> 'El maestro se creo correctamente'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Maestro $maestro)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maestro $maestro)
    {
        return view('maestros.edit')->with([
            'maestro'=>$maestro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaestroRequest $request, Maestro $maestro)
    {
        if($request->validated()){
            $maestro->update($request->validated());
            return redirect()->route('maestros.index')->with([
                'success'=>'El color se ha actualizado correctamente'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maestro $maestro)
    {
        $maestro->delete();
        return redirect()->route('maestros.index')->with([
            'success'=> 'El color se ha eliminado correctamente'
        ]);
    }
}
