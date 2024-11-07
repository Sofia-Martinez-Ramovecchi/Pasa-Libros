index
<table class="table table-light">
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
                    <a href="{{route('usuarios.edit', $usuario)}}">Editar</a>

                    <form action="{{route('usuarios.destroy', $usuario)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Eliminar</button>
                    </form>


                </td>
            </tr>
        @endforeach
    </tbody>
</table>
