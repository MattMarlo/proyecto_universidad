@extends('layouts.main')

@section('title', $titulo)

@section('content')
<h1 class="mb-4">{{ $titulo }}</h1>

<div class="card">
    <div class="card-header">
        <h5>NEW CAREER</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('carreras.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="career_name" class="form-label">NAME</label>
                <input type="text" name="career_name" id="career_name" class="form-control" placeholder="Ingrese nombre de la carrera">
            </div>

            <div class="mb-3">
                <label for="duration_years" class="form-label">DURATION (YEARS)</label>
                <input type="number" name="duration_years" id="duration_years" class="form-control" placeholder="Ingrese duración en años">
            </div>

            <div class="mb-3">
                <label for="modality" class="form-label">Modalidad</label>
                <select name="modality" id="modality" class="form-select">
                    <option value="">Seleccione modalidad</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                    <option value="Mixta">Mixta</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="faculty_id" class="form-label">Facultad</label>
                <select name="faculty_id" id="faculty_id" class="form-select">
                    <option value="">Seleccione facultad</option>
                    @foreach($facultades as $facultad)
                        <option value="{{ $facultad->faculty_id }}">{{ $facultad->faculty_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="career_number" class="form-label">Número de Carrera</label>
                <input type="text" name="career_number" id="career_number" class="form-control" placeholder="Ingrese número de carrera">
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> SAVE
            </button>
            <a href="{{ route('carreras.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> CANCEL
            </a>
        </form>
    </div>
</div>
@endsection
