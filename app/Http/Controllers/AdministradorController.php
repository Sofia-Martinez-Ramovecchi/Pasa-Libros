<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\PublicacionReporte;
use App\Models\Publicacion;
use Carbon\Carbon;



class AdministradorController extends Controller
{
    /*
    public function index(){
        $datos['usuarios']=Usuario::paginate(10);
        return view('usuarios.index', $datos);
    }*/

    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtén el término de búsqueda

        // Obtener los usuarios con las relaciones 'rol_usuario' y 'estado_cuentum'
        $usuarios = Usuario::when($search, function ($query, $search) {
            return $query->where('nombre_usuario', 'like', "%{$search}%");
        })->with(['estado_cuentum']) // Cargar las relaciones
            ->paginate(10); // Filtra y pagina los resultados

        /*$usuarios = Usuario::when($search, function ($query, $search) {
        return $query->where('nombre_usuario', 'like', "%{$search}%");
    })->paginate(10); // Filtra y pagina los resultados*/

        return view('usuarios.index', ['usuarios' => $usuarios]);
    }


    public function create()
    {
        return view('usuarios.create');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect('usuarios')->with('Mensaje', 'Usuario eliminado correctamente.');
    }

    public function edit($id)
    {

        $usuario = Usuario::findOrFail($id);
        $roles = Role::all(); // Obtener todos los roles disponibles
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {

        $campos = [
            'nombre_usuario' => 'required|string|max:50|min:2',
            'password' => 'required|string|max:50|min:6',
            'email' => 'required|string|max:50|min:6',
        ];

        $Mensaje = ["required" => 'El :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);


        $datosUsuario = request()->except(['_token', '_method']);
        Usuario::where('id_usuario', '=', $id)->update($datosUsuario);

        //$usuario = Usuario::findOrFail($id);
        //return view('usuarios.edit', compact('usuario'));

        return redirect('usuarios')->with('Mensaje', 'Usuario modificado con exito');
    }

    /*public function suspender($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->id_estado_cuenta = 2; // Cambiar el estado a "suspendido"
        $usuario->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('Mensaje', 'Usuario suspendido correctamente.');
    }*/

    public function suspender(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
    
        // Obtener la duración de la suspensión desde el formulario
        $duracionSuspension = intval($request->input('duracion_suspension', 7)); // Por defecto, 7 días
    
        // Calcula la fecha de suspensión
        $fechaSuspension = Carbon::now()->addDays($duracionSuspension);
    
        // Actualiza los campos
        $usuario->id_estado_cuenta = 2; // Cambiar el estado a suspendido
        $usuario->fecha_suspension = $fechaSuspension; // Establecer la fecha de suspensión
        $usuario->save();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('Mensaje', 'Usuario suspendido por ' . $duracionSuspension . ' días.');
    }


    public function verPerfil($id)
    {
        $usuario = Usuario::findOrFail($id); // Encuentra al usuario por su ID
        return view('usuarios.perfil', compact('usuario')); // Pasa el usuario a la vista
    }

    public function publicacionesReportadas()
    {
        // Obtener todas las publicaciones reportadas con las relaciones correspondientes
        $publicacionesReportadas = PublicacionReporte::with(['publicacion', 'reporte', 'usuario'])->get();

        // Pasar las publicaciones reportadas a la vista
        return view('publicaciones.reportadas', compact('publicacionesReportadas'));
    }

    public function mostrarPublicaciones()
    {
        $publicaciones = Publicacion::with(['estado_publicacion', 'libro', 'localidad', 'criticas', 'reportes'])->paginate(10);
        return view('publicaciones.mostrar', compact('publicaciones'));
    }

    public function verPublicacion($id)
    {
        $publicacion = Publicacion::with(['estado_publicacion', 'libro', 'localidad', 'criticas', 'reportes'])->findOrFail($id);
        return view('publicaciones.ver', compact('publicacion'));
    }

    public function reportarPublicacion(Request $request, $id)
{
    $request->validate([
        'comentario' => 'nullable|string|max:500',
    ]);

    // Crear el reporte de la publicación
    PublicacionReporte::create([
        'id_publicacion' => $id,
        'id_usuario' => auth()->id(), // El usuario autenticado que reporta
        'id_reporte' => 1, // ID de tipo de reporte (modificar luego)
        'comentario_reporte' => $request->comentario,
        'fecha_creacion' => now(),
    ]);

    return redirect()->route('publicaciones.mostrar', $id)->with('Mensaje', 'La publicación ha sido reportada correctamente.');
}

public function eliminarPublicacion($id)
{
    $publicacion = Publicacion::findOrFail($id); // Busca la publicación
    $publicacion->delete(); // Elimina la publicación

    // Redirige al listado de publicaciones reportadas con un mensaje de éxito
    return redirect()->route('publicaciones.reportadas')->with('Mensaje', 'Publicación eliminada correctamente.');
}

public function verPublicacionReportada($id)
{
    // Buscar la publicación reportada, incluyendo las relaciones necesarias
    $publicacionReporte = PublicacionReporte::with([
        'publicacion.libro',
        'publicacion.estado_publicacion',
        'publicacion.localidad',
        'usuario'
    ])->where('id_publicacion', $id)->firstOrFail();

    return view('publicaciones.verReportada', compact('publicacionReporte'));
}




}
