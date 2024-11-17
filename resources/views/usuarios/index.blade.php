<?php
use Illuminate\Support\Facades\Session
?>

@extends('layouts.app')

@section('content')

<div class="container">

    <h1><b>Administrador de usuarios</b></h1>

@if(Session::has('Mensaje'))

<div class="alert alert-success">

    {{ Session::get('Mensaje') }}

</div>

@endif

<form action="{{ route('usuarios.index') }}" method="GET" class="form-inline mb-3" style="margin-top:10px">
    <div class="input-group w-100">
        <input type="text" name="search" class="form-control" placeholder="Buscar por nombre de usuario" value="{{ request('search') }}">
            <button type="submit" class="btn btn-warning ml-2"><span class="input-group-text"><i class="fa fa-search"></i></span></button> <!-- Ícono de lupa -->
    </div>
</form>

<br>

<table class="table table-light table-striped">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $usuario->id_usuario }}</td>
                <td>{{ $usuario->nombre_usuario }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->estado_cuentum->nombre_estado_cuenta ?? 'No asignado' }}</td> 
    

                <td>

                    <a class="btn btn-primary botones"  href="{{route('usuarios.verPerfil', $usuario)}}">Ver perfil</a>

                    <form action="{{ route('usuarios.suspender', $usuario) }}" method="POST" style="display:inline">
                        @csrf
                        <input type="number" name="duracion_suspension" placeholder="Días" min="1" class="form-control" style="width: 80px; display: inline;">
                        <button class="btn btn-secondary botones" type="submit">Suspender</button>
                    </form>
                    

                    <form action="{{route('usuarios.destroy', $usuario)}}" method="POST" style="display:inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger botones"  type="submit">Eliminar</button>
                    </form>


                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $usuarios->links('pagination::bootstrap-4') }}


</div>
@endsection