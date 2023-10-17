@extends('adminlte::page')

@section('title', 'Automovil')

@section('content')
<form method="POST" action="{{ url('automovil/update/' . $auto->id) }}">
    {{ csrf_field() }}
    <div class="modal-header">
        <h4 class="modal-title">Editar Automovil</h4>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
    </div>

    <div class="modal-body">
        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ $auto->marca }}" required>
        </div>
        <div class="form-group">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ $auto->modelo }}" required>
        </div>

        <div class="form-group">
            <label>Color</label>
            <input type="text" name="color" class="form-control" value="{{ $auto->color }}" required>
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" value="{{ $auto->tipo }}" required>
        </div>
        <div class="form-group">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" value="{{ $auto->placa }}" required>
        </div>
        <div class="form-group">
            <label>Propietario</label>
            {{-- Que seleccione el propietario por defecto de la base de datos --}}
             <select name="idpropietario" class="form-control">
                @foreach ($propietario->all() as $propietario)
                {{-- Si el id del propietario es igual al id del propietario los selecciona si no no hace nada --}}
                    @if ($auto->idpropietario == $propietario->id)
                        <option value="{{ $propietario->id }}" selected>{{ $propietario->nombre }}</option>
                    @else
                        <option value="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                    @endif

                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <a href="{{ url('/automovil') }}" type="button" class="btn btn-default" data-dismiss="modal" value="cancel">Atras</a>
        <input type="submit" class="btn btn-success" value="Editar">
    </div>
</form>
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
