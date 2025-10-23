@extends('layouts.main')

@section('title', $titulo)

@section('content')
<h1 class="mb-4">{{ $titulo }}</h1>

<div class="card">
    <div class="card-header">
        <h5>Editar Career</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('carreras.update', $career->career_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="career_name" class="form-label">Nombre de la Carrera</label>
                <input type="text" name="career_name" id="career_name" class="form-control" value="{{ $career->career_name }}">
            </div>

            <div class="mb-3">
                <label for="duration_years" class="form-label">Duración (años)</label>
                <input type="number" name="duration_years" id="duration_years" class="form-control" value="{{ $career->duration_years }}">
            </div>

            <div class="mb-3">
                <label for="modality" class="form-label">Modalidad</label>
                <select name="modality" id="modality" class="form-select">
                    <option value="Presencial" {{ $career->modality == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="Virtual" {{ $career->modality == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                    <option value="Mixta" {{ $career->modality == 'Mixta' ? 'selected' : '' }}>Mixta</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="faculty_id" class="form-label">Facultad</label>
                <select name="faculty_id" id="faculty_id" class="form-select">
                    @foreach($facultades as $facultad)
                        <option value="{{ $facultad->faculty_id }}" {{ $career->faculty_id == $facultad->faculty_id ? 'selected' : '' }}>
                            {{ $facultad->faculty_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="career_number" class="form-label">Número de Carrera</label>
                <input type="text" name="career_number" id="career_number" class="form-control" value="{{ $career->career_number }}">
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Actualizar
            </button>
            <a href="{{ route('carreras.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </form>
    </div>
</div>
@endsection
