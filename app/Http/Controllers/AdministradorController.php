<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function index(){
        $datos['usuarios']=Usuario::paginate(5);
        return view('usuarios.index', $datos);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function destroy(Usuario $usuario){
        $usuario->delete();
    }

    /*public function edit(){}

    public function destroy($id)
    {
    $usuario = Usuario::findOrFail($id);
    $usuario->delete();

    return redirect('/usuarios')->with('success', 'Usuario eliminado correctamente.');
    }*/

}
