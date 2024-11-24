<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Localidad;
use App\Models\SolicitudIntercambio;

class UsuarioController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::with(['libro', 'estado_publicacion', 'localidad'])
            ->paginate(12);  // Paginación de 12 publicaciones por página

        // Retorna la vista y pasa las publicaciones
        return view('publicaciones.index', compact('publicaciones'));
    }

    public function publicacionesUsuarios()
    {
        $usuario = auth()->user();  // Obtienes el usuario autenticado

        // Obtener publicaciones en la localidad del usuario
        $publicacionesLocalidad = Publicacion::where('id_localidad', $usuario->id_localidad)
            ->orderBy('fecha_creacion', 'desc')
            ->get();

        // Obtener publicaciones en la provincia del usuario, excluyendo las de la localidad ya mostradas
        $publicacionesProvincia = Publicacion::where('id_localidad', '!=', $usuario->id_localidad)
            ->where('id_localidad', 'in', Localidad::where('id_provincia', $usuario->provincia_id)->pluck('id_localidad'))
            ->orderBy('fecha_creacion', 'desc')
            ->get();

        // Obtener las demás publicaciones que no coinciden ni en localidad ni en provincia
        $publicacionesRestantes = Publicacion::whereNotIn('id_localidad', [$usuario->id_localidad])
            ->whereNotIn('id_localidad', Localidad::where('id_provincia', $usuario->provincia_id)->pluck('id_localidad'))
            ->orderBy('fecha_creacion', 'desc')
            ->get();

        // Combina todas las colecciones
        $publicaciones = $publicacionesLocalidad->merge($publicacionesProvincia)->merge($publicacionesRestantes);

        return view('publicacionesUsuarios', compact('publicaciones'));
    }

    public function solicitudesIntercambio()
    {
        // Obtienes el usuario autenticado
        $usuario = auth()->user();

        // Obtienes todas las solicitudes de intercambio del usuario
        $solicitudes = SolicitudIntercambio::where('id_usuario_ofertante', $usuario->id_usuario)
                                            ->with('estado_solicitud', 'libro_intercambios') // Cargar relaciones necesarias
                                            ->get();

        // Pasas las solicitudes a la vista
        return view('solicitudes.index', compact('solicitudes'));
    }
}
