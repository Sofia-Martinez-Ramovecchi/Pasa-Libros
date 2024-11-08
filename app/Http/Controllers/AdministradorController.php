<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function index(){
        $datos['usuarios']=Usuario::paginate(10);
        return view('usuarios.index', $datos);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function destroy(Usuario $usuario){
        $usuario->delete();
        return redirect('usuarios')->with('Mensaje', 'Usuario eliminado correctamente.');
    }

    public function edit($id){

        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));

    }

    public function update(Request $request, $id){

        $campos=[
            'nombre_usuario' => 'required|string|max:50' 
        ];

        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);


        $datosUsuario=request()->except(['_token', '_method']);
        Usuario::where('id_usuario','=',$id)->update($datosUsuario);

        //$usuario = Usuario::findOrFail($id);
        //return view('usuarios.edit', compact('usuario'));

        return redirect('usuarios')->with('Mensaje', 'Usuario modificado con exito');
    }


}
