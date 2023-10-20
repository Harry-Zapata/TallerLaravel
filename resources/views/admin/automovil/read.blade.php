@extends('adminlte::page')

@section('title', 'Automovil')

@section('content')
    <x-adminlte-card title="Automovil {{ $auto->id }}" theme="purple" icon="fas fa-lg fa-car" collapsible>
        <div style="height: 70vh" class="display-flex justify-content-between">
            <h2><b>ID</b></h2><h5>{{ $auto->id }}</h5>
            <h4><b>Marca</b></h4><h5>{{ $auto->marca }}</h5>
            <h4><b>Modelo</b></h4><h5>{{ $auto->modelo }}</h5>
            <h4><b>Color</b></h4><h5>{{ $auto->color }}</h5>
            <h4><b>Tipo</b></h4><h5>{{ $auto->tipo }}</h5>
            <h4><b>Placa</b></h4><h5>{{ $auto->placa }}</h5>
            <h4><b>Propietario</b></h4><h5><a href="{{ url("/propietario/read/{$auto->idpropietario}") }}">{{ $propietario->find($auto->idpropietario)->nombre }}</a></h5>

        </div>
    </x-adminlte-card>
    <div>
        <a href="{{ url('/automovil') }}" type="button" class="btn btn-info btn-lg float-left" data-dismiss="modal"
            value="cancel" style="width: 100%">Atras</a>
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
