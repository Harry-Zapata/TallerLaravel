@extends('adminlte::page')

@section('title', 'Propietario')

@section('content')
<x-adminlte-card title="Propietario {{$propietario->id}}" theme="purple" icon="fas fa-lg fa-car" collapsible>
    <div style="height: 70vh" class="display-flex justify-content-between">
        <h2><b>ID</b></h2><h5>{{ $propietario->id }}</h5>
        <h4><b>Nombre</b></h4><h5>{{ $propietario->nombre }}</h5>
        <h4><b>Documento</b></h4><h5>{{ $propietario->documento }}</h5>
        <h4><b>Dirección</b></h4><h5>{{ $propietario->direccion }}</h5>
        <h4><b>Teléfono</b></h4><h5>{{ $propietario->telefono }}</h5>
        <h4><b>Email</b></h4><h5>{{ $propietario->email }}</h5>
    </div>
</x-adminlte-card>
    <div>
        <a href="{{ url('/propietario') }}" type="button" class="btn btn-info btn-lg float-left" data-dismiss="modal" value="cancel"
            style="width: 100%">Atras</a>
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
