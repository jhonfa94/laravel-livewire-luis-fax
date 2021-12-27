<div>


    <div class="row align-items-center">

        <div class="col-12 col-md-10 card">
            <div class="form-group mt-1">
                <input id="search" class="form-control" type="text" wire:model="search"
                    placeholder="Buscar por nombre  o correo" autocomplete="off">
            </div>
        </div>
        <div class="col-12 col-md-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUser">
                Agregar
            </button>

        </div>

        <div class="col-sm-12 card">
            <table class="table table-sm table-bordered table-hover mt-1" style="width:100%;">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <button onclick="confirmar({{ $user->id}})" class="btn btn-danger">
                                    &times; Eliminar
                                </button>
                                <button wire:click="edit({{$user->id}})" class="btn btn-warning">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Sin resultados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 mt-2">
            {{ $users->links() }}
        </div>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $action }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <label>Nombre</label>
                                <input wire:model="name" type="text" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label>Email</label>
                                <input wire:model="email" type="text" class="form-control">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label>Password</label>
                                <input wire:model="password" type="password" class="form-control">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button wire:click="closeModal" type="button" class="btn btn-danger">&times; Cerrar</button>
                        <button wire:click="store" type="button" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        function confirmar(id) {
            let option = confirm("¿Confirmas eliminar el registro?");
            if (option == true) {
                window.livewire.emit('destroy', id);
            }
        }

        //funcionalidad para abrirar o cerrar la modal
        window.addEventListener('modal', event => {
            $("#modalUser").modal(event.detail.action);
        });

        window.addEventListener('notify', event => {
            alert(event.detail.result);
        })
    </script>



</div>{{-- div principal --}}
