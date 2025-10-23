@extends('layouts.main')

@section('titulo', 'Editar Profesor')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Profesor</h1>

    <a href="{{ route('profesores.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Volver a Profesores
    </a>

    <div class="card card-custom">
        <div class="card-body">
            <form action="{{ route('profesores.update', $profesor->professor_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="first_name" class="form-label">Nombre</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $profesor->first_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $profesor->last_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="academic_title" class="form-label">Título Académico</label>
                    <input type="text" name="academic_title" id="academic_title" class="form-control" value="{{ $profesor->academic_title }}">
                </div>

                <div class="mb-3">
                    <label for="institutional_email" class="form-label">Email Institucional</label>
                    <input type="email" name="institutional_email" id="institutional_email" class="form-control" value="{{ $profesor->institutional_email }}">
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Teléfono</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $profesor->phone_number }}">
                </div>

                <div class="mb-3">
                    <label for="hire_date" class="form-label">Fecha de Contratación</label>
                    <input type="date" name="hire_date" id="hire_date" class="form-control" value="{{ $profesor->hire_date }}">
                </div>

                <div class="mb-3">
                    <label for="career_id" class="form-label">Carrera</label>
                    <select name="career_id" id="career_id" class="form-select" required>
                        <option value="">-- Selecciona Carrera --</option>
                        @foreach($careers as $career)
                            <option value="{{ $career->career_id }}" {{ $career->career_id == $profesor->career_id ? 'selected' : '' }}>
                                {{ $career->career_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Actualizar Profesor
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
