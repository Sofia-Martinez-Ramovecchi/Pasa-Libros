<!-- resources/views/publicaciones/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Publicaciones</h1>
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
                    <td>{{ $publicacion->estado_publicacion->nombre_estado ?? 'N/A' }}</td>
                    <td>{{ $publicacion->libro->titulo ?? 'N/A' }}</td>
                    <td>{{ $publicacion->localidad->nombre ?? 'N/A' }}</td>
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
