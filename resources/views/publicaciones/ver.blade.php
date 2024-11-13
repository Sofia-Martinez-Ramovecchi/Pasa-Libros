@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $publicacion->libro->titulo ?? 'Título no disponible' }}</h1>
    <p><strong>Estado:</strong> {{ $publicacion->estado_publicacion->nombre_estado ?? 'N/A' }}</p>
    <p><strong>Localidad:</strong> {{ $publicacion->localidad->nombre ?? 'N/A' }}</p>
    <p><strong>Fecha de Creación:</strong> {{ $publicacion->fecha_creacion->format('d-m-Y') }}</p>
    <p><strong>Descripción:</strong> {{ $publicacion->descripcion_publicacion }}</p>
    <a href="{{ route('publicaciones.mostrar') }}" class="btn btn-secondary">Volver a la lista de publicaciones</a>
</div>
@endsection
