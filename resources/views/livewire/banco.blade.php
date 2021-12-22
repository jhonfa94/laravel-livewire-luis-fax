<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col">
                <label>Capital del Banco</label>
                <span>{{$capital}}</span>
                <br>
                <button class="btn btn-primary" wire:click="$emitTo('tarjeta','asignar',{{$capital}})">
                    Asignar crédito
                </button>

        </div>
    </div>
    <!-- =====================
      AGREGAMOS COMPONENTE DE TARJETA
    ========================= -->
    @livewire('tarjeta')
</div>
