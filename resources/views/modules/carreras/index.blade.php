@extends('layouts.main')

@section('title', 'Careers')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Carreras</h1>

    <div class="mb-3">
        <a href="{{ route('carreras.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus-circle"></i> Nueva Carrera
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-header">
            <h5 class="mb-0">Carreras Registradas</h5>
        </div>
        <div class="card-body">
            @if($careers->isEmpty())
                <p class="text-muted">No hay carreras registradas todavía.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Career Name</th>
                                <th>Duration (Years)</th>
                                <th>Modality</th>
                                <th>Career Number</th>
                                <th>Faculty</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($careers as $career)
                                <tr>
                                    <td>{{ $career->career_id }}</td>
                                    <td>{{ $career->career_name }}</td>
                                    <td>{{ $career->duration_years }}</td>
                                    <td>{{ ucfirst($career->modality) }}</td>
                                    <td>{{ $career->carrer_number }}</td>
                                    <td>
                                        @if($career->faculty)
                                            {{ $career->faculty->faculty_name }}
                                        @else
                                            <span class="text-muted">No asignada</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('carreras.edit', $career->career_id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </a>

                                        <form action="{{ route('carreras.destroy', $career->career_id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i> Eliminar
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
</div>
@endsection
