<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Databinding extends Component
{

    public $nombre = "jhon";

    public function render()
    {
        return view('livewire.databinding')->layout('layouts.theme');
    }
}
