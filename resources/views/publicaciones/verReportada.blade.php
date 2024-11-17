@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h1><b>Detalles de la Publicación Reportada</b></h1>
        </div>

        <div class="card-body">
            <p><strong>Libro:</strong>{{ $publicacionReporte->publicacion->libro->nombre_libro ?? 'Título no disponible' }}</p>
            <p><strong>Descripción:</strong> {{ $publicacionReporte->publicacion->descripcion_publicacion ?? 'No disponible' }}</p>
            <p><strong>Estado:</strong> {{ $publicacionReporte->publicacion->estado_publicacion->nombre_estado_publicacion ?? 'No disponible' }}</p>
            <p><strong>Localidad:</strong> {{ $publicacionReporte->publicacion->localidad->nombre_localidad ?? 'No disponible' }}</p>
            <p><strong>Usuario que reportó:</strong> {{ $publicacionReporte->usuario->nombre_usuario ?? 'No disponible' }}</p>
            <p><strong>Comentario del reporte:</strong> {{ $publicacionReporte->comentario_reporte ?? 'No disponible' }}</p>
            <p><strong>Fecha de reporte:</strong> {{ $publicacionReporte->fecha_creacion->format('d/m/Y H:i') }}</p>
        </div>

        <div class="card-footer">
            <!-- Botón para eliminar la publicación -->
            <form action="{{ route('publicaciones.eliminar', $publicacionReporte->publicacion->id_publicacion) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta publicación?')">Eliminar Publicación</button>
            </form>

            <!-- Botón para volver al listado -->
            <a href="{{ route('publicaciones.reportadas') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
    </div>
</div>

@endsection

