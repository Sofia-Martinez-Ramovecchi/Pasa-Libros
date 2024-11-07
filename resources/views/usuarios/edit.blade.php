edit
<form action="{{route('usuarios.update', $usuario)}}" method="POST">
    @csrf
    @method('patch')
    <label for="nombre_usuario">{{'nombre'}}</label>
    <input type="text" name="nombre_usuario" id="nombre_usuario" value="{{$usuario->nombre_usuario}}">
</br>

<button type="submit">Guardar></button>
</form>