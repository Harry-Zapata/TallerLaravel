<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Automovil;
use App\Models\Propietario;

class AutomovilController extends Controller
{
    public function home()
    {
        $auto = Automovil::all();
        $propietario = Propietario::all();
        return view('admin/automovil/home', compact('auto', 'propietario'));
    }
    public function vistaadd()
    {
        // Que permita mostrar la vista para agregar un automovil y un selector de propietario
        $propietario = Propietario::all();
        return view('admin/automovil/add', compact('propietario'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required'
        ]);
        $auto = new Automovil();
        $auto->marca = $request->input('marca');
        $auto->modelo = $request->input('modelo');
        $auto->color = $request->input('color');
        $auto->tipo = $request->input('tipo');
        $auto->placa = $request->input('placa');
        $auto->idpropietario = $request->input('idpropietario');
        $auto->save();
        return redirect('/automovil')->with('info', 'Automovil Guardado');
    }

    public function update($id)
    {
        $auto = Automovil::find($id);
        $propietario = Propietario::all();
        return view('admin/automovil/update', compact('auto', 'propietario'));
    }
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required'
        ]);
        $data = array(
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'color' => $request->input('color'),
            'tipo' => $request->input('tipo'),
            'placa' => $request->input('placa'),
            'idpropietario' => $request->input('idpropietario'),
        );
        Automovil::where('id', $id)->update($data);
        return redirect('/automovil')->with('info', 'Automovil Actualizado');
    }

    public function read($id)
    {
        $auto = Automovil::find($id);
        $propietario = Propietario::all();
        return view('admin/automovil/read', compact('auto', 'propietario'));
    }
    public function delete($id)
    {
        Automovil::where('id', $id)->delete();
        return redirect('/automovil')->with('info', 'Automovil Eliminado');
    }
}
