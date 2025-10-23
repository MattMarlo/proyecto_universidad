@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
<h1 class="mb-4">Faculties</h1>

<div class="mb-3">
    <a href="{{route('facultades.create')}}" class="btn btn-primary">
        New faculty
        <i class="fas fa-plus-circle"></i>
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5>Listado de Facultades</h5>
    </div>
    <div class="card-body">
        @if($facultades->isEmpty())
            <p class="text-muted">No hay Facultades registradas.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle" id="tbl_puntos">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Faculty Name</th>
                            <th>Location</th>
                            <th>Dean Name</th>
                            <th>Acronym Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Year Foundation</th>
                            <th>Acciones</th>
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
                            <td>{{ $facultad->logo_fac }}</td>
                            <td>{{ $facultad->year_fac }}</td>
                            <td>
                                <a href="{{ route('facultades.edit', $facultad->faculty_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                <form action="{{ route('facultades.destroy', $facultad->faculty_id) }}" method="POST" class="form-eliminar" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Eliminar
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
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar columna ascendente",
                    "sortDescending": ": activar para ordenar columna descendente"
                }
            }
        });
    });
</script>
@endsection
