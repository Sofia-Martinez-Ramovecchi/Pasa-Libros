@extends('layouts.app')

@section('content')
    <div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
            @csrf
            @method('patch')

            <div class="form-group">
                <label class="control-label" for="nombre_usuario">{{ 'Nombre' }}</label>
                <input class="form-control {{ $errors->has('nombre_usuario') ? 'is-invalid' : '' }}" type="text"
                    name="nombre_usuario" id="nombre_usuario"
                    value="{{ isset($usuario->nombre_usuario) ? $usuario->nombre_usuario : old('nombre_usuario') }}">
                {!! $errors->first('nombre_usuario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br />

            <div class="form-group">
                <label class="control-label" for="password">{{ 'Contraseña' }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                    name="password" id="password"
                    value="{{ isset($usuario->password) ? $usuario->password : old('password') }}">
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br />


            <div class="form-group">
                <label class="control-label" for="email">{{ 'Email' }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                    id="email" value="{{ isset($usuario->email) ? $usuario->email : old('email') }}">
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <br />

            <button class="btn btn-success" type="submit">Guardar</button>
            <a class="btn btn-dark" href="{{ route('usuarios.index') }}">Regresar</a>

            <br />

        </form>

    </div>
@endsection
