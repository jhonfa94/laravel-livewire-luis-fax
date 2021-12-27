<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Crud extends Component
{
    use WithPagination;


    public $search = '', $action = 'Registrar', $result;
    public $name, $email, $password, $user_id = 0, $hiddenPassword;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['destroy'];

    // Aplicamos validación
    protected    $rules = [
        'name' => 'required|string|max:8|min:4',
        'email' => 'required|email',
        // 'password' => 'required|min:8'
    ];

    // Mensajes de validacion
    protected   $messages = [
        'name.required' => 'El nombre es requerido',
        'name.max' => 'El nombre debe tener máximo 8 caracteres',
        'name.min' => 'El nombre debe tener mínimo 4 caracteres',
        'email.required' => 'Igresa un email',
        'email.email' => 'El email es inválido',
        'password.required' => 'La contraseña es requerida',
        'password.min' => 'La contraseña debe tener 8 caracteres',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        if (strlen($this->search) > 0) {
            $users = User::where('name', 'like', "%{$this->search}%")->orWhere('email', 'like', "%{$this->search}%")
                ->orderBy('name', 'asc')
                ->paginate(3);
        } else {
            $users = User::orderBy('name', 'asc')->paginate(3);
        }

        return view('livewire.crud', [
            'users' => $users
        ])->layout('layouts.theme');
    }

    //CERRAR MODAL
    public function closeModal()
    {
        $this->reset('name', 'email', 'hiddenPassword', 'user_id', 'action', 'search');
        $this->dispatchBrowserEvent('modal', ['action' => 'hidden']);

    }

    //STORE
    public function store()
    {

         $this->validate();

        $user = User::updateOrCreate(
            ['id' => $this->user_id],
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => strlen($this->password) > 0 ? bcrypt($this->password) : $this->hiddenPassword
            ]
        );
        $this->dispatchBrowserEvent(
            'notify',
            [
                'result' => $this->user_id  > 0  ? 'Usuario Actualizado' : 'Usuario Registrado'
            ]
        );

        $this->reset('name', 'email', 'hiddenPassword', 'user_id', 'action', 'search');

        $this->dispatchBrowserEvent('modal', ['action' => 'hide']);
    }

    //EDIT
    public function edit(User $user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = null;
        $this->hiddenPassword = $user->password;
        $this->action = 'Actualizar';
        $this->dispatchBrowserEvent('modal', ['action' => 'show']);
    }

    //DESTROY
    public function destroy(User $user)
    {
        $user->delete();
        $this->dispatchBrowserEvent('notify', ['result' => 'Usuario Eliminado']);
        $this->resetPage();
    }
}
