<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="form-group">
        <label for="nombre">Nombre</label>
        {{-- <input wire:model="nombre" class="form-control" type="text"  > --}}
        <input wire:keydown.enter="$set('nombre','Fax')" class="form-control" type="text"  >
    </div>
    <button wire:click="cambiarNombre('Jhon')">
        Cambiar Nombre
    </button>
    <br>
    Nombre: {{$nombre}}
</div>
