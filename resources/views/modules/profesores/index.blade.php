@extends('layouts.main')

@section('content')
@section('titulo', $titulo)

<h1 class="mb-4">Professors</h1>

<div class="mb-3">
    <a href="{{ route('profesores.create') }}" class="btn btn-primary">New Professor
        <i class="fas fa-plus-circle"></i>
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5>Professor List</h5>
    </div>
    <div class="card-body">
        @if($profesores->isEmpty())
            <p class="text-muted">No professors registered.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle" id="tbl_profesores">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Academic Title</th>
                            <th>Institutional Email</th>
                            <th>Phone Number</th>
                            <th>Hire Date</th>
                            <th>Career</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor->professor_id }}</td>
                            <td>{{ $profesor->first_name }}</td>
                            <td>{{ $profesor->last_name }}</td>
                            <td>{{ $profesor->academic_title }}</td>
                            <td>{{ $profesor->institutional_email }}</td>
                            <td>{{ $profesor->phone_number }}</td>
                            <td>{{ $profesor->hire_date }}</td>
                            <td>{{ $profesor->career->career_name ?? 'No career assigned' }}</td>
                            <td>
                                <a href="{{ route('profesores.edit', $profesor->professor_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('profesores.destroy', $profesor->professor_id) }}" method="POST" class="form-eliminar" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
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
        new DataTable('#tbl_profesores', {
            language: {
                emptyTable: "No data available in the table",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                lengthMenu: "Show _MENU_ entries",
                search: "Search:",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
@endsection
