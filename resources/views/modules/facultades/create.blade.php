@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0"><i class="fas fa-university"></i> Register New Faculty</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('facultades.store') }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="faculty_name" class="font-weight-bold">Faculty Name:</label>
                            <input type="text" name="faculty_name" id="faculty_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="location" class="font-weight-bold">Location:</label>
                            <input type="text" name="location" id="location" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="dean_name" class="font-weight-bold">Dean Name:</label>
                            <input type="text" name="dean_name" id="dean_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="acronym_name" class="font-weight-bold">Acronym Name:</label>
                            <input type="text" name="acronym_name" id="acronym_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_fac" class="font-weight-bold">Phone:</label>
                            <input type="text" name="phone_fac" id="phone_fac" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email_fac" class="font-weight-bold">Email:</label>
                            <input type="email" name="email_fac" id="email_fac" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="logo_fac" class="font-weight-bold">Logo:</label>
                            <div class="custom-file">
                                <input type="file" name="logo_fac" id="logo_fac" class="custom-file-input" accept=".jpg,.jpeg,.png,.gif" required>
                                <label class="custom-file-label" for="logo_fac">Select an image...</label>
                            </div>
                            <small class="form-text text-muted">Allowed formats: JPG, JPEG, PNG, GIF</small>
                        </div>

                        <div class="form-group">
                            <label for="year_fac" class="font-weight-bold">Year of Foundation:</label>
                            <input type="number" name="year_fac" id="year_fac" class="form-control" min="1900" max="{{ date('Y') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group text-right mt-4">
                    <a href="{{ route('facultades') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save Faculty
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
