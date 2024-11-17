<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Usuario;
use Carbon\Carbon;

class RevisarSuspensiones extends Command
{
    protected $signature = 'usuarios:revisar-suspensiones';
    protected $description = 'Revisa las suspensiones de usuarios y activa a aquellos que ya cumplieron su tiempo de suspensión.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $usuariosSuspendidos = Usuario::where('id_estado_cuenta', 2) // Usuarios suspendidos
            ->where('fecha_suspension', '<=', Carbon::now()) // Fecha de suspensión ya pasada
            ->get();

        foreach ($usuariosSuspendidos as $usuario) {
            $usuario->id_estado_cuenta = 1; // Cambiar a estado activo
            $usuario->fecha_suspension = null; // Limpiar fecha de suspensión
            $usuario->save();
            $this->info("Usuario {$usuario->nombre_usuario} ahora está activo.");
        }

        $this->info('Revisión de suspensiones completada.');
    }
}

