@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h1><b>Detalles de la Publicación</b></h1>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Publicación ID:</strong> {{ $publicacion->id_publicacion }}</p>
            <p class="card-text"><strong>Estado: {{ $publicacion->estado_publicacion->nombre_estado_publicacion ?? 'N/A' }}</p>
            <p class="card-text"><strong>Libro:</strong> {{ $publicacion->libro->nombre_libro ?? 'N/A' }}</p>
            <p class="card-text"><strong>Localidad:</strong> {{ $publicacion->localidad->nombre_localidad ?? 'N/A' }}</p>
            <p class="card-text"><strong>Fecha de Creación:</strong> {{ $publicacion->fecha_creacion->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $publicacion->descripcion_publicacion }}</p>
        </div>
    </div>

    <!-- Formulario para reportar la publicación -->
    <div class="card">
        <div class="card-header">Reportar Publicación</div>
        <div class="card-body">
            <form method="POST" action="{{ route('publicaciones.reportar', $publicacion->id_publicacion) }}">
                @csrf
                <div class="form-group">
                    <label for="comentario">Comentario (opcional):</label>
                    <textarea name="comentario" id="comentario" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-danger mt-3">Reportar</button>
                <!-- Botón para volver al listado -->
            </form>
        </div>
    </div>
    <a href="{{ route('publicaciones.mostrar') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection

