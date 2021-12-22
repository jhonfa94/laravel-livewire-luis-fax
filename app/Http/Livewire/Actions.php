<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Actions extends Component
{
    public $nombre;

    public function render()
    {
        return view('livewire.actions')->layout('layouts.theme');
    }

    public function cambiarNombre($texto){
        $this->nombre = $texto;
    }
}
