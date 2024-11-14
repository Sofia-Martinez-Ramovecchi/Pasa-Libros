@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Administrador de usuarios</h1>

@if(Session::has('Mensaje'))

<div class="alert alert-success">

    {{ Session::get('Mensaje') }}

</div>

@endif

<form action="{{ route('usuarios.index') }}" method="GET" class="form-inline mb-3">
    <div class="input-group w-100">
        <input type="text" name="search" class="form-control" placeholder="Buscar por nombre de usuario" value="{{ request('search') }}">
            <button type="submit" class="btn btn-info ml-2"><span class="input-group-text"><i class="fa fa-search"></i></span></button> <!-- Ícono de lupa -->
    </div>
</form>

<br>

<table class="table table-light table-striped">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th>Rol</th>
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
                <td>{{ $usuario->password }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->rol_usuario->nombre_rol ?? 'No asignado' }}</td> <!-- Asegúrate de que 'nombre_rol' sea el atributo correcto en RolUsuario -->
                <!-- Mostrar el nombre del estado -->
                <td>{{ $usuario->estado_cuentum->nombre_estado_cuenta ?? 'No asignado' }}</td> <!-- Asegúrate de que 'nombre_estado' sea el atributo correcto en EstadoCuentum -->
                <td>

                <td>

                    <a class="btn btn-primary botones"  href="{{route('usuarios.verPerfil', $usuario)}}">Ver perfil</a>


                    <a class="btn btn-warning botones" href="{{route('usuarios.edit', $usuario)}}">Editar</a>

                    <form action="{{ route('usuarios.suspender', $usuario) }}" method="POST" style="display:inline">
                        @csrf
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