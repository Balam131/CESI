<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nombre = $request->input('nombre');

        // Filtrar los responsables activos y por nombre
        $responsables = Responsable::with('tutores') -> where('responsable_activacion', 1)
            ->when($nombre, function ($query, $nombre) {
                return $query->where('responsable_nombre', 'like', '%' . $nombre . '%');
            })->get();

        return view('responsables.index', compact('responsables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Responsable $responsable)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsable $responsable)
    {
        return view('responsables.edit', compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsable $responsable)
    {
        $request->validate([
            'responsable_nombre' => 'required|string|max:255',
            'responsable_usuario' => 'required|email',
            'responsable_telefono' => 'nullable|regex:/^[0-9]{10,11}$/',
            'responsable_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Actualizar los datos del responsable
        $responsable->responsable_nombre = $request->responsable_nombre;
        $responsable->responsable_usuario = $request->responsable_usuario;
        $responsable->responsable_contraseña = bcrypt($request->responsable_contraseña);
        $responsable->responsable_telefono = $request->responsable_telefono;

        // Manejo de actualización de imagen
        if ($request->hasFile('responsable_foto')) {
            if ($responsable->responsable_foto) {
                $previousPhotoPath = public_path('storage/' . $responsable->responsable_foto);
                if (file_exists($previousPhotoPath)) {
                    unlink($previousPhotoPath); // Eliminar foto anterior
                }
            }

            // Almacenar nueva foto
            $imagePath = $request->file('responsable_foto')->store('responsables', 'public');
            $responsable->responsable_foto = $imagePath;
        }

        // Guardar cambios
        $responsable->save();

        return redirect()->route('responsables.index')->with('success', 'Responsable actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsable $responsable)
    {
        abort(404);
    }
}
