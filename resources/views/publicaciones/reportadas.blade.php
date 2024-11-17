<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.app')

@section('content')
    <div class="container">

        <h1><b>Publicaciones Reportadas</b></h1>

        @if (Session::has('Mensaje'))
            <div class="alert alert-success">
                {{ Session::get('Mensaje') }}
            </div>
        @endif

        <table class="table table-light table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>ID Publicación</th>
                    <th>Descripcion del reporte</th>
                    <th>Reporte del usuario</th>
                    <th>Comentario</th>
                    <th>Fecha de Reporte</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($publicacionesReportadas as $reporte)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reporte->publicacion->id_publicacion ?? 'No disponible' }}</td>
                        <td>{{ $reporte->reporte->descripcion_reporte ?? 'No disponible' }}</td>
                        <td>{{ $reporte->usuario->nombre_usuario ?? 'No disponible' }}</td>
                        <td>{{ $reporte->comentario_reporte ?? 'No disponible' }}</td>
                        <td>{{ $reporte->fecha_creacion->format('d/m/Y H:i') ?? 'No disponible' }}</td>
                        <td>
                            <a href="{{ route('publicacionesreportadas.ver', $reporte->publicacion->id_publicacion) }}"
                                class="btn btn-primary">Ver Publicación</a>

                            <form action="{{ route('publicaciones.eliminar', $reporte->publicacion->id_publicacion) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar esta publicación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection
