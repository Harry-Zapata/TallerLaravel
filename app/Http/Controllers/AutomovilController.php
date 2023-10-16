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
}
