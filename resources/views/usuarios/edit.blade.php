@extends('layouts.app')

@section('content')

<div class="container">

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('usuarios.update', $usuario)}}" method="POST">
    @csrf
    @method('patch')

    <div class="form-group">
    <label class="control-label" for="nombre_usuario">{{'nombre'}}</label>
    <input class="form-control {{$errors->has('nombre_usuario')?'is-invalid':''}}" type="text" name="nombre_usuario" id="nombre_usuario" value="{{isset($usuario->nombre_usuario)?$usuario->nombre_usuario:old('nombre_usuario')}}">
    {!! $errors->first('nombre_usuario','<div class="invalid-feedback">:message</div>') !!}
</div>

    <br/>


<button class="btn btn-success" type="submit">Guardar</button>
<a  class="btn btn-info" href="{{route('usuarios.index')}}">Regresar</a>

<br/>

</form>

</div>
@endsection