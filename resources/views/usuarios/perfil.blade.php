@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Perfil de {{ $usuario->nombre_usuario }}</h1>

    <div class="row">
        <div class="col-md-4">
            <h3>Foto de Perfil</h3>
            <div class="profile-photo">
                <img 
                    src="{{ $usuario->profile_photo ? asset('storage/' . $usuario->profile_photo) : asset('images/default-profile.png') }}" 
                    class="img-thumbnail rounded-circle" 
                    style="width: 150px; height: 150px; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-8">
            <h3>Información Personal</h3>
            <ul>
                <li><strong>Nombre de usuario:</strong> {{ $usuario->nombre_usuario }}</li>
                <li><strong>Email:</strong> {{ $usuario->email }}</li>
                <li><strong>Estado de cuenta:</strong> {{ $usuario->id_estado_cuenta == 1 ? 'Activo' : 'Suspendido' }}</li>
            </ul>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Acciones</h3>
            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="margin-top:10px">Eliminar Cuenta</button>
            </form>
        </div>
    </div>

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Volver a la lista de usuarios</a>
</div>

@endsection
