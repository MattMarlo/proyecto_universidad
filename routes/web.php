<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CareerController;

use Illuminate\Support\Facades\Route;

// Rutas para Facultades
Route::get('/', [FacultyController::class, 'index'])->name('facultades');
Route::get('/create', [FacultyController::class, 'create'])->name('facultades.create');
Route::post('/store', [FacultyController::class, 'store'])->name('facultades.store');
Route::get('/edit/{id}', [FacultyController::class, 'edit'])->name('facultades.edit');
Route::put('/update/{id}', [FacultyController::class, 'update'])->name('facultades.update');
Route::delete('/destroy/{id}', [FacultyController::class, 'destroy'])->name('facultades.destroy');

// Rutas para Profesores
Route::resource('profesores', ProfessorController::class)->except(['show']);
// rutas para carreras
Route::resource('carreras', CareerController::class)->except(['show']);