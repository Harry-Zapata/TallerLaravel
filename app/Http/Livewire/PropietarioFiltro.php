<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\propietario;
class PropietarioFiltro extends Component
{
    public $search = '';
    public function render()
    {
        $propietarios = Propietario::where('nombre', 'like', '%' . $this->search . '%')->get();

        return view('livewire.propietario-filtro', ['propietarios' => $propietarios]);
    }
}
