@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Publicaciones Reportadas</h1>

    @if(Session::has('Mensaje'))
        <div class="alert alert-success">
            {{ Session::get('Mensaje') }}
        </div>
    @endif

    <table class="table table-light table-striped">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Publicación</th>
                <th>Reporte</th>
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Fecha de Reporte</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($publicacionesReportadas as $reporte)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reporte->publicacion->titulo ?? 'No disponible' }}</td>
                    <td>{{ $reporte->reporte->descripcion ?? 'No disponible' }}</td>
                    <td>{{ $reporte->usuario->nombre_usuario ?? 'No disponible' }}</td>
                    <td>{{ $reporte->comentario_reporte ?? 'No disponible' }}</td>
                    <td>{{ $reporte->fecha_creacion->format('d/m/Y H:i') ?? 'No disponible' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
