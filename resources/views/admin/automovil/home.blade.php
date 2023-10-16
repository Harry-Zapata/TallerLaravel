@extends('adminlte::page')

@section('title', 'Automovil')

@section('content')
    <div class="container">
        <div class="table-wrapper">

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-between align-items-center mt-5">
                        <a href="{{ url('/automovil') }}">
                            <h2>Automovil</h2>
                        </a>
                        <a href="{{ url('/automovil/add') }}" class="btn btn-success" style="width: 50px;height: 50px;display: grid; place-content: center"><i class="material-icons">&#xE147;</i></a>
                    </div>
                </div>
            </div>
            @if (session('info'))
                <div class="alert alert-success mt-4">
                    {{ session('info') }}
                </div>
            @endif
            {{--
            Schema::create('automovils', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('color');
            $table->string('tipo');
            $table->string('placa');
            $table->bigInteger('idpropietario')->unsigned();

            $table->foreign('idpropietario')->references('id')->on('propietarios');
        });
                --}}
            <table class="table table-striped table-hover" style="margin: 50px 0">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Tipo</th>
                        <th>Placa</th>
                        <th>Propietario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($auto) > 0)
                        @foreach ($auto->all() as $auto)
                            <tr>
                                <td>{{ $auto->marca }}</td>
                                <td>{{ $auto->modelo }}</td>
                                <td>{{ $auto->color }}</td>
                                <td>{{ $auto->tipo }}</td>
                                <td>{{ $auto->placa }}</td>
                                {{-- Buscar Propietario por idpropietario --}}
                                <td>{{ $propietario->find($auto->idpropietario)->nombre }}</td>
                                <td>
                                    <a href='{{ url("/automovil/read/{$auto->id}") }}' class="material-icons read"
                                        data-toggle="tooltip" data-placement="tooltip" title="Read">&#xE86D;</a>
                                    <a href='{{ url("/automovil/edit/{$auto->id}") }}' class="material-icons edit"
                                        data-toggle="tooltip" data-placement="tooltip" title="Update">&#xE254;</a>

                                    <a href='{{ url("/automovil/borrar/{$auto->id}") }}' class="material-icons delete"
                            data-id="{{ $auto->id }}" data-toggle="tooltip" data-placement="tooltip"
                            title="Delete">&#xE872;</a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @include('inc.footer')
@stop

@section('css')
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@stop
