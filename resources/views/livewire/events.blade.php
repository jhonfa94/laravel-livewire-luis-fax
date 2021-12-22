<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    {{-- <button wire:click="destroy(1)" class="btn btn-danger">Eliminar</button> --}}
                    <button onClick="confirmar(1)" class="btn btn-danger">Eliminar</button>
                    <button onClick="confirmar(1)" class="btn btn-warning">Eliminar</button>
                </td>
            </tr>


        </tbody>
    </table>


    <script>
        function confirmar(id) {
            let op = confirm("¿Deseas eliminar el registro?");
            if (op == true) {
                window.livewire.emit('destroy', id);
            }
        }
        //Escuchamos eventos
        document.addEventListener('livewire:load', function() {
            Livewire.on('destroy-result', event => {
                alert(event);
            });
        });

        window.addEventListener('destroy-result', event => {
            console.log(event);

            alert(event.detail.resultado);
        })
    </script>

</div>
