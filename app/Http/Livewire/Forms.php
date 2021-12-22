<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Forms extends Component
{
    use WithFileUploads;

    public $name, $email, $password, $photo;

    // Aplicamos validación
    protected    $rules = [
        'name' => 'required|string|max:8|min:4',
        'email' => 'required|email',
        'password' => 'required|min:8'
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
        return view('livewire.forms')->layout('layouts.theme');
    }


    public function store()
    {
        // $this->validate($rules, $messages);
        $this->validate();

        //Guardamos el registro
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        //VALIDAMOS SI TENEMOS UNA FOTO CARGADA
        if (!empty($this->photo)) {
            // generar nombre único
            $customFileName = uniqid() . '_.' . $this->photo->extension();

            //Guardamos el archivo
            $this->photo->storeAs('public/avatars', $customFileName);

            // Actualizamos la columna de foto en la DB
            $user->photo = $customFileName;
            $user->save();
        }



        //Notificamos al usuario de forma correcta fue registrado
        $this->dispatchBrowserEvent('user-register', ['result' => 'Usuario registrado']);

        //Reset de las propiedades
        // $this->name =''; # Primera forma valida
        $this->reset('name', 'email', 'password', 'photo'); # Segunda opción
    }
}
