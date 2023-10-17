<div>
    <div class="row filter">
        <div class="col-md-12 mt-4">
            <div class="input-group">
                <input id="search" wire:model="search" name="search" type="text" class="form-control" placeholder="Buscar...">
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover" style="margin: 50px 0">
        <thead>
            <tr class="text-center">
                <th>Nombre</th>
                <th>Documento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($propietarios as $propietario)
                <tr>
                    <td>{{ $propietario->nombre }}</td>
                    <td>{{ $propietario->documento }}</td>
                    <td>{{ $propietario->direccion }}</td>
                    <td>{{ $propietario->telefono }}</td>
                    <td>{{ $propietario->email }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ url("/propietario/read/{$propietario->id}") }}" class="material-icons read"
                            data-toggle="tooltip" data-placement="tooltip" title="Read">&#xE86D;</a>
                        <a href="{{ url("/propietario/edit/{$propietario->id}") }}" class="material-icons edit"
                            data-toggle="tooltip" data-placement="tooltip" title="Update">&#xE254;</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
