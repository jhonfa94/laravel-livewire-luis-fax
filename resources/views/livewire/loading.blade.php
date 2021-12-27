<div>
    <h3>Nuevo Usuario</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Nombre: </label>
                <input id="name" class="form-control" type="text">
                <small class="text-info" wire:loading>Guardando espere...</small>
            </div>
        </div>
        <div class="col-sm-12 mt-2">
            <button class="btn btn-primary mr-2" wire:click='save' wire:loading.remove>
                Guardar y Ocultarse
            </button>
            <button class="btn btn-secondary mr-2" wire:click='save' wire:loading.attr='disabled'>
                Guardar y Bloquearse
            </button>

            <button class="btn btn-danger mr-2" wire:click='save' wire:loading.attr='disabled'>
                <span wire:loading.remove>
                    Guardar y Mostrar Icono
                </span>

                <span wire:loading>
                    Procesando...
                </span>
                <div wire:loading wire:target="save">
                    <i class="la la-spinner spinner"></i>
                </div>

            </button>
        </div>
    </div>
</div>
