<!-- resources/views/publicacionesUsuarios.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Publicaciones de Otros Usuarios</h1>
        
        <div class="row">
            @foreach ($publicaciones as $publicacion)
                <div class="col-md-3">
                    <div class="book-item border p-3 rounded mb-3">
                        <h3>{{ $publicacion->libro->titulo }}</h3>
                        <p class="descripcion">{{ $publicacion->descripcion_publicacion }}</p>
                        <p class="Estado">{{ $publicacion->estado_publicacion->estado }}</p>
                        <p class="Localidad">Localidad: {{ $publicacion->localidad->nombre }}</p>
                        <p class="Provincia">Provincia: {{ $publicacion->localidad->provincia->nombre ?? 'Sin provincia' }}</p>
                        <button type="button" class="btn btn-link edit-button" data-bs-toggle="modal" data-bs-target="#ModalInfoLibro">
                            Ver más&#8230;
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


