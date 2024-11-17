<!-- resources/views/publicaciones/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1><b>Lista de Publicaciones</b></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Libro</th>
                <th>Localidad</th>
                <th>Fecha de Creación</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publicaciones as $publicacion)
                <tr>
                    <td>{{ $publicacion->id_publicacion }}</td>
                    <td>{{ $publicacion->estado_publicacion->nombre_estado_publicacion ?? 'N/A' }}</td>
                    <td>{{ $publicacion->libro->nombre_libro ?? 'N/A' }}</td>
                    <td>{{ $publicacion->localidad->nombre_localidad ?? 'N/A' }}</td>
                    <td>{{ $publicacion->fecha_creacion->format('d-m-Y') }}</td>
                    <td>{{ $publicacion->descripcion_publicacion }}</td>

                    <td>
                        <a class="btn btn-primary botones" href="{{ route('publicaciones.ver', $publicacion->id_publicacion) }}">Ver publicación</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $publicaciones->links() }}
</div>
@endsection
