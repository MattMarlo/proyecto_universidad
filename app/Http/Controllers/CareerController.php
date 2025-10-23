<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importando el modelo Career
use App\Models\Career;
use App\Models\Faculty;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Careers';
        $careers = Career::all(); 
        return view('modules.carreras.index', compact('titulo', 'careers'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Nueva Carrera';
        $facultades = Faculty::all(); 
        return view('modules.carreras.create', compact('titulo', 'facultades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $career = new Career();
        $career->career_name = $request->career_name;
        $career->duration_years = $request->duration_years;
        $career->modality = $request->modality;
        $career->faculty_id = $request->faculty_id;
        $career->career_number = $request->career_number;

        $career->save();

        return redirect()->route('carreras.index');
                
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
        $career = Career::findOrFail($id);
        $facultades = Faculty::all(); // Para llenar el select de facultades
        $titulo = 'Editar Carrera';

        return view('modules.carreras.edit', compact('career', 'facultades', 'titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $career = Career::findOrFail($id);

        $career->career_name = $request->career_name;
        $career->duration_years = $request->duration_years;
        $career->modality = $request->modality;
        $career->faculty_id = $request->faculty_id;
        $career->career_number = $request->career_number;

        $career->save();

        return redirect()->route('carreras.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return redirect()->route('carreras.index');
    }
}
