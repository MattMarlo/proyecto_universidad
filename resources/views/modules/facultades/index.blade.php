@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
<h1 class="mb-4">Faculties</h1>

<div class="mb-3">
    <a href="{{route('facultades.create')}}" class="btn btn-primary">
        New Faculty
        <i class="fas fa-plus-circle"></i>
    </a>
</div>

<div class="card">
    <div class="card-header">
        
        <h5>Faculty List</h5>
    </div>
    <div class="card-body">
        @if($facultades->isEmpty())
            <p class="text-muted">No faculties registered.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle" id="tbl_puntos">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Faculty Name</th>
                            <th>Location</th>
                            <th>Dean Name</th>
                            <th>Acronym Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Year of Foundation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facultades as $facultad)
                        <tr>
                            <td>{{ $facultad->faculty_id }}</td>
                            <td>{{ $facultad->faculty_name }}</td>
                            <td>{{ $facultad->location }}</td>
                            <td>{{ $facultad->dean_name }}</td>
                            <td>{{ $facultad->acronym_name }}</td>
                            <td>{{ $facultad->phone_fac }}</td>
                            <td>{{ $facultad->email_fac }}</td>
                            <td>
                                @if($facultad->logo_fac)
                                    <img src="{{ asset('storage/logos/' . $facultad->logo_fac) }}" 
                                        alt="Logo {{ $facultad->faculty_name }}" 
                                        style="max-width: 80px; max-height: 60px; object-fit: cover;"
                                        class="img-thumbnail">
                                @else
                                    <span class="text-muted">No logo</span>
                                @endif
                            </td>
                            <td>{{ $facultad->year_fac }}</td>
                            <td>
                                <a href="{{ route('facultades.edit', $facultad->faculty_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('facultades.destroy', $facultad->faculty_id) }}" method="POST" class="form-eliminar" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new DataTable('#tbl_puntos', {
            language: {
                "decimal": "",
                "emptyTable": "No data available in the table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "thousands": ",",
                "lengthMenu": "Show _MENU_ entries per page",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
@endsection
