@extends('layouts.main')

@section('title', $titulo)

@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Career</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('carreras.update', $career->career_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="career_name" class="form-label">Career Name</label>
                <input type="text" name="career_name" id="career_name" class="form-control" value="{{ $career->career_name }}">
            </div>

            <div class="mb-3">
                <label for="duration_years" class="form-label">Duration (Years)</label>
                <input type="number" name="duration_years" id="duration_years" class="form-control" value="{{ $career->duration_years }}">
            </div>

            <div class="mb-3">
                <label for="modality" class="form-label">Modality</label>
                <select name="modality" id="modality" class="form-select">
                    <option value="Presencial" {{ $career->modality == 'Presencial' ? 'selected' : '' }}>In-person</option>
                    <option value="Virtual" {{ $career->modality == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                    <option value="Mixta" {{ $career->modality == 'Mixta' ? 'selected' : '' }}>Mixed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="faculty_id" class="form-label">Faculty</label>
                <select name="faculty_id" id="faculty_id" class="form-select">
                    @foreach($facultades as $facultad)
                        <option value="{{ $facultad->faculty_id }}" {{ $career->faculty_id == $facultad->faculty_id ? 'selected' : '' }}>
                            {{ $facultad->faculty_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="career_number" class="form-label">Career Number</label>
                <input type="text" name="career_number" id="career_number" class="form-control" value="{{ $career->career_number }}">
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('carreras.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
        </form>
    </div>
</div>
@endsection
