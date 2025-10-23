<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Career;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Profesores';
        $profesores = Professor::all(); 
        return view('modules.profesores.index', compact('titulo', 'profesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $careers = Career::all();
        $titulo = 'Nuevo Profesor';
        return view('modules.profesores.create', compact('careers', 'titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profesor = new Professor();
        $profesor->first_name = $request->first_name;
        $profesor->last_name = $request->last_name;
        $profesor->academic_title = $request->academic_title;
        $profesor->institutional_email = $request->institutional_email;
        $profesor->phone_number = $request->phone_number;
        $profesor->hire_date = $request->hire_date;
        $profesor->career_id = $request->career_id;

        $profesor->save();
        
        return redirect()->route('profesores.index');
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
        $profesor = Professor::findOrFail($id);
        $careers = Career::all();
        $titulo = 'Editar Profesor';
        return view('modules.profesores.edit', compact('profesor', 'careers', 'titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profesor = Professor::findOrFail($id);
        $profesor->first_name = $request->first_name;
        $profesor->last_name = $request->last_name;
        $profesor->academic_title = $request->academic_title;
        $profesor->institutional_email = $request->institutional_email;
        $profesor->phone_number = $request->phone_number;
        $profesor->hire_date = $request->hire_date;
        $profesor->career_id = $request->career_id;

        $profesor->save();
        return redirect()->route('profesores.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesor = Professor::findOrFail($id);
        $profesor->delete();
        return redirect()->route('profesores.index');

    }
}
