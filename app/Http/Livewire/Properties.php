<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Properties extends Component
{
    public $saludo = "Hola Mundo";

    public function render()
    {
        return view('livewire.properties')->layout('layouts.theme');
    }
}
