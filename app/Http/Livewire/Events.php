<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Events extends Component
{

    protected $listeners = ['destroy' => 'destroy'];

    public function render()
    {
        return view('livewire.events')->layout('layouts.theme');
    }


    public function destroy($id){
        //Eliminando registro

        //mandamoe el evento
        // $this->emit('destroy-result','Registro eliminado');
        $this->dispatchBrowserEvent('destroy-result',['resultado' => 'Eliminación exitosa', 'otro' => 'Otro resultado']);
    }

}
