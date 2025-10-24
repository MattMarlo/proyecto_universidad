@extends('layouts.main')

@section('title', $titulo)

@section('content')
<div class="card">
    <div class="card-header">
        <h5>NEW CAREER</h5>
    </div>
    <div class="card-body">
        <form id="careerForm" action="{{ route('carreras.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="career_name" class="form-label">NAME</label>
                <input type="text" name="career_name" id="career_name" class="form-control" placeholder="Enter career name" required>
            </div>

            <div class="mb-3">
                <label for="duration_years" class="form-label">DURATION (YEARS)</label>
                <input type="number" name="duration_years" id="duration_years" class="form-control" placeholder="Enter duration in years" required>
            </div>

            <div class="mb-3">
                <label for="modality" class="form-label">MODALITY</label>
                <select name="modality" id="modality" class="form-select" required>
                    <option value="">Select modality</option>
                    <option value="Presencial">In-person</option>
                    <option value="Virtual">Virtual</option>
                    <option value="Mixta">Mixed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="faculty_id" class="form-label">FACULTY</label>
                <select name="faculty_id" id="faculty_id" class="form-select" required>
                    <option value="">Select faculty</option>
                    @foreach($facultades as $facultad)
                        <option value="{{ $facultad->faculty_id }}">{{ $facultad->faculty_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="career_number" class="form-label">CAREER NUMBER</label>
                <input type="text" name="career_number" id="career_number" class="form-control" placeholder="Enter career number" required>
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
