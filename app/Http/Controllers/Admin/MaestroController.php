<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMaestroRequest;
use App\Models\Maestro;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nombre = $request->input('nombre');

        $maestros = Maestro::when($nombre, function ($query, $nombre) {
            return $query->where('maestro_nombre', 'like', '%' . $nombre . '%');
        })->get();

        return view('maestros.index', compact('maestros'));
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
    public function store(Request $request)
    {
        $request->validate([
            'maestro_nombre' => 'required|string|max:255',
            'maestro_usuario' => 'required|email',
            'maestro_contraseña' => 'required|string|min:6',
            'maestro_telefono' => 'nullable|regex:/^[0-9]{10,11}$/',
            'maestro_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $maestro = new Maestro();
        $maestro->maestro_nombre = $request->maestro_nombre;
        $maestro->maestro_usuario = $request->maestro_usuario;
        $maestro->maestro_contraseña = bcrypt($request->maestro_contraseña);
        $maestro->maestro_telefono = $request->maestro_telefono;

        // Verificar si se ha subido una nueva foto
        if ($request->hasFile('maestro_foto')) {
            // Almacenar la imagen en el directorio 'public/storage/maestros'
            $imagePath = $request->file('maestro_foto')->store('maestros', 'public');
            $maestro->maestro_foto = $imagePath;  // Guardar la ruta en la base de datos
        }

        $maestro->save();

        return redirect()->route('maestros.index')->with('success', 'Maestro creado exitosamente');
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
        return view('maestros.edit',compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaestroRequest $request, Maestro $maestro)
    {
        $request->validate([
            'maestro_nombre' => 'required|string|max:255',
            'maestro_usuario' => 'required|email',
            'maestro_telefono' => 'nullable|regex:/^[0-9]{10,11}$/',
            'maestro_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Actualizar datos
        $maestro->maestro_nombre = $request->maestro_nombre;
        $maestro->maestro_usuario = $request->maestro_usuario;
        $maestro->maestro_contraseña = bcrypt($request->maestro_contraseña);
        $maestro->maestro_telefono = $request->maestro_telefono;

        // Si se sube una nueva foto, eliminar la anterior y guardar la nueva
        if ($request->hasFile('maestro_foto')) {
            // Verificar si existe una foto anterior y eliminarla
            if ($maestro->maestro_foto) {
                $previousPhotoPath = public_path('storage/' . $maestro->maestro_foto);
                if (file_exists($previousPhotoPath)) {
                    unlink($previousPhotoPath); // Eliminar la foto anterior
                }
            }

            // Almacenar la nueva foto
            $imagePath = $request->file('maestro_foto')->store('maestros', 'public');
            $maestro->maestro_foto = $imagePath; // Actualizar la ruta de la nueva imagen
        }

        // Guardar los cambios
        $maestro->save();

        return redirect()->route('maestros.index')->with('success', 'Maestro actualizado exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maestro $maestro)
    {
        $previousPhotoPath = public_path('storage/' . $maestro->maestro_foto);
                if (file_exists($previousPhotoPath)) {
                    unlink($previousPhotoPath); // Eliminar la foto anterior
                }
        $maestro->delete();
        return redirect()->route('maestros.index')->with('success', 'El maestro se ha eliminado correctamente');

    }
}
