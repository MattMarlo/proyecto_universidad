<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;


route::get('/',[FacultyController::class,'index'])->name('facultades');
route::get('/create',[FacultyController::class,'create'])->name('facultades.create');
route::post('/store',[FacultyController::class,'store'])->name('facultades.store');
//route::get('/',[ProfessorController::class,'index'])->name('profesores');
route::get('/edit/{id}',[FacultyController::class,'edit'])->name('facultades.edit');
route::put('/update/{id}',[FacultyController::class,'update'])->name('facultades.update');
route::delete('/destroy/{id}',[FacultyController::class,'destroy'])->name('facultades.destroy');