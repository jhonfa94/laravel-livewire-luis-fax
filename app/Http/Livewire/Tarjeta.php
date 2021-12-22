<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tarjeta extends Component
{
    public $saldo = 0;

    protected $listeners = ['asignar' => 'asignarSaldo'];

    public function asignarSaldo($saldo)
    {
        $this->saldo = $saldo; //RECIBIMOS EL SALDO
        $this->emitTo('banco', 'recibido'); // EMITIMOS UN EVENTO AL BANCO LLAMADO RECIBIDO
    }


    public function render()
    {
        return view('livewire.tarjeta');
    }
}
