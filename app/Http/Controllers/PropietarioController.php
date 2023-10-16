<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

class PropietarioController extends Controller
{
    public function home()
    {
        $propietario = Propietario::all();
        return view('admin/propietario/home', ['propietario' => $propietario]);
    }
    public function vistaadd()
    {
        return view('admin/propietario/add');
    }
    public function add(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'documento' => 'required'
        ]);
        $propietario = new Propietario();
        $propietario->nombre = $request->input('nombre');
        $propietario->documento = $request->input('documento');
        $propietario->direccion = $request->input('direccion');
        $propietario->telefono = $request->input('telefono');
        $propietario->email = $request->input('email');
        $propietario->save();
        return redirect('/propietario')->with('info', 'Propietario Guardado');
    }


    public function update($id)
    {
        $propietario = Propietario::find($id);
        return view('admin/propietario/update', ['propietario' => $propietario]);
    }
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'documento' => 'required'
        ]);
        $data = array(
            'nombre' => $request->input('nombre'),
            'documento' => $request->input('documento'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
        );
        Propietario::where('id', $id)->update($data);
        return redirect('/propietario')->with('info', 'Propietario Actualizado');
    }

    public function read($id)
    {
        $propietario = Propietario::find($id);
        return view('admin/propietario/read', ['propietario' => $propietario]);
    }

    public function delete($id)
    {
        Propietario::where('id', $id)->delete();
        return redirect('/propietario')->with('info', 'Propietario Eliminado');
    }
}
