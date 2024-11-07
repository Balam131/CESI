<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use App\Models\Escuela;
use App\Models\Maestro;
use Illuminate\Http\Request;

class SalonController extends Controller
{

    public function index(Request $request)
    {
        $query = Salon::with(['escuelas', 'maestros']);


        if ($request->filled('grado')) {
            $query->where('salon_grado', 'like', '%' . $request->input('grado') . '%');
        }


        if ($request->filled('grupo')) {
            $query->where('salon_grupo', 'like', '%' . $request->input('grupo') . '%');
        }

        $salones = $query->get();

        return view('salones.index', compact('salones'));
    }

    public function create()
    {
        $escuelas = Escuela::all();
        $maestros = Maestro::all();
        return view('salones.create', compact('escuelas', 'maestros'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'salon_grado' => 'nullable|string|max:255',
            'salon_grupo' => 'nullable|string|max:255',
            'cesi_escuela_id' => 'required|exists:cesi_escuelas,id',
            'cesi_maestro_id' => 'required|exists:cesi_maestros,id',
        ]);

        Salon::create($request->all());

        return redirect()->route('salones.index')->with('success', 'Salón creado exitosamente');
    }


    public function edit(Salon $salon)
    {

        $escuelas = Escuela::all();
        $maestros = Maestro::all();

        return view('salones.edit', compact('salon', 'escuelas', 'maestros'));
    }


    public function update(Request $request, Salon $salon)
    {
        $request->validate([
            'salon_grado' => 'nullable|string|max:255',
            'salon_grupo' => 'nullable|string|max:255',
            'cesi_escuela_id' => 'required|exists:cesi_escuelas,id',
            'cesi_maestro_id' => 'required|exists:cesi_maestros,id',
        ]);


        $salon->update($request->all());

        return redirect()->route('salones.index')->with('success', 'Salón actualizado exitosamente');
    }

    public function destroy(Salon $salon)
    {
        $salon->delete();

        return redirect()->route('salones.index')->with('success', 'Salón eliminado exitosamente');
    }
}
