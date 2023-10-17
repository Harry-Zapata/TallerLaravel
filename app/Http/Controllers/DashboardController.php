<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;
use App\Models\Automovil;

class DashboardController extends Controller
{
    public function index()
    {
        $propietario = Propietario::all();
        $auto = Automovil::all();
        return view('admin.index', compact('propietario', 'auto'));
    }
}
