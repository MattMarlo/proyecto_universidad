@extends('layouts.main')

@section('title', 'New Professor')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create New Professor</h1>

    <a href="{{ route('profesores.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Back to Professors
    </a>

    <div class="card card-custom">
        <div class="card-body">
            <form id="professorForm" action="{{ route('profesores.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="academic_title" class="form-label">Academic Title</label>
                    <input type="text" name="academic_title" id="academic_title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="institutional_email" class="form-label">Institutional Email</label>
                    <input type="email" name="institutional_email" id="institutional_email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="hire_date" class="form-label">Hire Date</label>
                    <input type="date" name="hire_date" id="hire_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="career_id" class="form-label">Career</label>
                    <select name="career_id" id="career_id" class="form-select" required>
                        <option value="">-- Select Career --</option>
                        @foreach($careers as $career)
                            <option value="{{ $career->career_id }}">{{ $career->career_name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Create Professor
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#professorForm').validate({
        rules: {
            first_name: {
                required: true,
                minlength: 2
            },
            last_name: {
                required: true,
                minlength: 2
            },
            academic_title: {
                required: true,
                minlength: 2
            },
            institutional_email: {
                required: true,
                email: true
            },
            phone_number: {
                required: true,
                digits: true
            },
            hire_date: {
                required: true,
                date: true
            },
            career_id: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Please enter the first name",
                minlength: "First name must be at least 2 characters"
            },
            last_name: {
                required: "Please enter the last name",
                minlength: "Last name must be at least 2 characters"
            },
            academic_title: {
                required: "Please enter the academic title",
                minlength: "Academic title must be at least 2 characters"
            },
            institutional_email: {
                required: "Please enter the institutional email",
                email: "Please enter a valid email address"
            },
            phone_number: {
                required: "Please enter the phone number",
                digits: "Phone number must contain only numbers"
            },
            hire_date: {
                required: "Please select the hire date",
                date: "Please enter a valid date"
            },
            career_id: {
                required: "Please select a career"
            }
        },
        errorElement: 'div',
        errorClass: 'text-danger',
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
@endpush

@endsection
