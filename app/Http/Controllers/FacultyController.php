<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo='Facultades';
        $facultades =Faculty::all();
        return view('modules.facultades.index',compact('titulo','facultades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.facultades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $faculty = new Faculty();

            // Asignar los datos recibidos del formulario
            $faculty->faculty_name = $request->faculty_name;
            $faculty->location = $request->location;
            $faculty->dean_name = $request->dean_name;
            $faculty->acronym_name = $request->acronym_name;
            $faculty->phone_fac = $request->phone_fac;
            $faculty->email_fac = $request->email_fac;
            $faculty->year_fac = $request->year_fac;

            // Subir archivo si existe - **CAMBIADO**
            if ($request->hasFile('logo_fac') && $request->file('logo_fac')->isValid()) {
                $file = $request->file('logo_fac');
                $filename = time() . '_' . $file->getClientOriginalName();
                // **CAMBIÉ ESTA LÍNEA:**
                $file->move(storage_path('app/public/logos'), $filename);
                $faculty->logo_fac = $filename;
            }

            // Guardar en la base de datos
            $faculty->save();

            return to_route('facultades')->with('success', 'Faculty creada correctamente.');
        } catch (\Exception $e) {
            return to_route('facultades')->with('error', 'No se pudo guardar la Faculty: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facultades = Faculty::find($id);
        return view('modules.facultades.edit',compact('facultades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $facultad = Faculty::find($id);
            $facultad->faculty_name = $request->faculty_name;
            $facultad->location = $request->location;
            $facultad->dean_name = $request->dean_name;
            $facultad->acronym_name = $request->acronym_name;
            $facultad->phone_fac = $request->phone_fac;
            $facultad->email_fac = $request->email_fac;
            $facultad->year_fac = $request->year_fac;

            // Manejar la imagen en update - **CAMBIADO**
            if ($request->hasFile('logo_fac') && $request->file('logo_fac')->isValid()) {
                // Eliminar imagen anterior si existe
                if ($facultad->logo_fac && file_exists(storage_path('app/public/logos/' . $facultad->logo_fac))) {
                    unlink(storage_path('app/public/logos/' . $facultad->logo_fac));
                }

                // Subir nueva imagen
                $file = $request->file('logo_fac');
                $filename = time() . '_' . $file->getClientOriginalName();
                // **CAMBIÉ ESTA LÍNEA:**
                $file->move(storage_path('app/public/logos'), $filename);
                $facultad->logo_fac = $filename;
            }

            $facultad->save();
            return to_route('facultades')->with('success','Faculty actualizada correctamente');
        }catch(Exception $e){
            return to_route('facultades')->with('error','Error al actualizar faculty: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $facultad = Faculty::find($id);
            
            // Eliminar imagen si existe - **CAMBIADO**
            if ($facultad->logo_fac && file_exists(storage_path('app/public/logos/' . $facultad->logo_fac))) {
                unlink(storage_path('app/public/logos/' . $facultad->logo_fac));
            }
            
            $facultad->delete();
            return to_route('facultades')->with('success','Faculty eliminada correctamente');
        } catch(Exception $e){
            return to_route('facultades')->with('error','Error al eliminar: '.$e->getMessage());
        }
    }
}