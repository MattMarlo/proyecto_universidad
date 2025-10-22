@extends('layouts.admin')

@section('content')
@section('titulo',$titulo)
<h1 class="mb-4">Profesores</h1>

<div class="mb-3">
    <a href="{{route('puntos.create')}}" class="btn btn-primary">Nuevo Profesor 
        <i class="fas fa-plus-circle"></i>
    </a>
   
</div>

<div class="card">
    <div class="card-header">
        <h5>Listado de Profesores</h5>
    </div>
    <div class="card-body">
        @if($items->isEmpty())
            <p class="text-muted">No hay Profesores registrados.</p>
        @else
            <div class="table-responsive" >
                <table class="table table-striped table-bordered align-middle" id="tbl_puntos">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Titulo Academico</th>
                            <th>email</th>
                            <th>telefono</th>
                            <th>Longitud</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($puntos as $punto)
                        <tr>
                            <td>{{ $punto->id }}</td>
                            <td>{{ $punto->nombre }}</td>
                            <td>{{ ucfirst($punto->categoria) }}</td>
                            <td>{{ Str::limit($punto->descripcion, 50) }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $punto->imagenes) }}" alt="Imagen" width="100">
                            </td>


                            <td>{{ $punto->latitud }}</td>
                            <td>{{ $punto->longitud }}</td>
                            <td>
                                <a href="{{route('puntos.edit',$punto->id)}}" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </a>
                                <form action="{{ route('puntos.destroy', $punto->id) }}" method="POST" class="form-eliminar" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> <!-- Ícono clásico -->
                                            Eliminar
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
                "infoPostFix": "",
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
