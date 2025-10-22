@extends('layouts.main')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Editar Facultad</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Editar Facultad</h5>
            <form action="{{ route('facultades.update', $facultades->faculty_id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <label for="faculty_name">Faculty Name</label>
              <input type="text" class="form-control" name="faculty_name" id="faculty_name" value="{{ $facultades->faculty_name }}" required>

              <label for="location">Location</label>
              <input type="text" class="form-control" name="location" id="location" value="{{ $facultades->location }}" required>

              <label for="dean_name">Dean Name</label>
              <input type="text" class="form-control" name="dean_name" id="dean_name" value="{{ $facultades->dean_name }}" required>

              <label for="acronym_name">Acronym Name</label>
              <input type="text" class="form-control" name="acronym_name" id="acronym_name" value="{{ $facultades->acronym_name }}">

              <label for="phone_fac">Phone</label>
              <input type="text" class="form-control" name="phone_fac" id="phone_fac" value="{{ $facultades->phone_fac }}">

              <label for="email_fac">Email</label>
              <input type="email" class="form-control" name="email_fac" id="email_fac" value="{{ $facultades->email_fac }}">

              <label for="logo_fac">Logo</label>
              @if($facultades->logo_fac)
                <div class="mb-2">
                  <img src="{{ asset('storage/'.$facultades->logo_fac) }}" alt="Logo" width="100">
                </div>
              @endif
              <input type="file" class="form-control" name="logo_fac" id="logo_fac" accept=".jpg,.jpeg,.png,.gif">

              <label for="year_fac">Year Foundation</label>
              <input type="number" class="form-control" name="year_fac" id="year_fac" min="1900" max="{{ date('Y') }}" value="{{ $facultades->year_fac }}">

              <button class="btn btn-primary mt-3">Guardar</button>
              <a href="{{ route('facultades') }}" class="btn btn-info mt-3">Cancelar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
