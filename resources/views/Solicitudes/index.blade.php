{{-- resources/views/solicitudes/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis Solicitudes de Intercambio</h1>

        @if ($solicitudes->isEmpty())
            <p>No tienes solicitudes de intercambio.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Cantidad de Libros</th>
                        <th>Fecha de Creación</th>
                        <th>Estado</th>
                        <th>Libros Asociados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->descripcion_solicitud }}</td>
                            <td>{{ $solicitud->cant_libros }}</td>
                            <td>{{ $solicitud->fecha_creacion->format('d/m/Y H:i') }}</td>
                            <td>{{ $solicitud->estado_solicitud->nombre_estado ?? 'No disponible' }}</td>
                            <td>
                                <ul>
                                    @foreach ($solicitud->libro_intercambios as $libro)
                                        <li>{{ $libro->libro->titulo }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
