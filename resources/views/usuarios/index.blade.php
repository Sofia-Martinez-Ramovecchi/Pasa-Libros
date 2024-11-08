@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Administrador de usuarios</h1>

@if(Session::has('Mensaje'))

<div class="alert alert-success">

    {{ Session::get('Mensaje') }}

</div>

@endif
<table class="table table-light table-striped">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $usuario->nombre_usuario }}</td>
                <td>{{ $usuario->email }}</td>
                <td>

                    <a class="btn btn-primary" href="">Ver perfil</a>


                    <a class="btn btn-warning" href="{{route('usuarios.edit', $usuario)}}">Editar</a>

                    <a class="btn btn-secondary" href="">Suspender</a>

                    <form action="{{route('usuarios.destroy', $usuario)}}" method="POST" style="display:inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>


                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $usuarios->links('pagination::bootstrap-4') }}


</div>
@endsection