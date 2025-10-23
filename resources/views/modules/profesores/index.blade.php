@extends('layouts.main')

@section('content')
@section('titulo', $titulo)

<h1 class="mb-4">Profesores</h1>

<div class="mb-3">
    <a href="{{ route('profesores.create') }}" class="btn btn-primary">Nuevo Profesor 
        <i class="fas fa-plus-circle"></i>
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5>Listado de Profesores</h5>
    </div>
    <div class="card-body">
        @if($profesores->isEmpty())
            <p class="text-muted">No hay profesores registrados.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle" id="tbl_profesores">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Título Académico</th>
                            <th>Email Institucional</th>
                            <th>Teléfono</th>
                            <th>Fecha Contrato</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
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
                            <td>{{ $profesor->career->career_name ?? 'Sin carrera' }}</td>
                            <td>
                                <a href="{{ route('profesores.edit', $profesor->professor_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </a>
                                <form action="{{ route('profesores.destroy', $profesor->professor_id) }}" method="POST" class="form-eliminar" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Eliminar
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
                emptyTable: "No hay datos disponibles en la tabla",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                lengthMenu: "Mostrar _MENU_ registros",
                search: "Buscar:",
                paginate: {
                    next: "Siguiente",
                    previous: "Anterior"
                }
            }
        });
    });
</script>
@endsection
