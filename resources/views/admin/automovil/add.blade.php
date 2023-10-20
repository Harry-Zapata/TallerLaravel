@extends('adminlte::page')

@section('title', 'Automovil')

@section('content')
    <form id="formAutomovil">
        {{ csrf_field() }}
        <div class="modal-header">
            <h4 class="modal-title">Agregar Automovil</h4>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label>Marca</label>
                <input type="text" name="marca" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Color</label>
                <input type="text" name="color" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tipo</label>
                <input type="text" name="tipo" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Placa</label>
                <input type="text" name="placa" class="form-control" required>
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between mb-2">
                    <label>Propietario</label>

                    {{-- Modal Add Propietario --}}
                    {{-- Custom --}}
                    <x-adminlte-modal id="modalCustom" title="Agregar Propietario" size="lg" theme="purple"
                        icon="fas fa-user-plus" v-centered static-backdrop scrollable>
                        <div style="height:450px;" id="formPropietario">
                            {{-- modal content --}}
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Documento</label>
                                    <input type="text" name="documento" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" name="direccion" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>
                        {{-- end modal content --}}
                        </div>
                        <x-slot name="footerSlot">
                            <x-adminlte-button type="button" onclick="addPropietario()" class="mr-auto" theme="success"
                                label="Add" />
                            <x-adminlte-button theme="danger" label="Cancel" data-dismiss="modal" />
                        </x-slot>
                    </x-adminlte-modal>
                    {{-- Example button to open modal --}}
                    <x-adminlte-button label="Propietario" data-toggle="modal" data-target="#modalCustom"
                        class="bg-teal" />

                    {{-- fin del modal --}}
                </div>
                <x-adminlte-select2 class="select2" id="idpropietario" name="idpropietario" label-class="text-lightblue" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($propietario->all() as $propietario)
                        <option value="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
            </div>
        </div>

        <div class="modal-footer">
            <a href="{{ url('/automovil') }}" type="button" class="btn btn-default" data-dismiss="modal"
                value="cancel">Atras</a>
            <input type="button" onclick="addAutomovil()" class="btn btn-success" value="Agregar">
        </div>
    </form>
@stop

@section('css')
    <style>
    .select2-container {
        width: 100% !important;
        height: 35px !important;
    }
    .select2-selection--single{
        height: 35px !important;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
@stop

@section('js')
    <!-- Agrega los scripts de Select2 y jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Agrega el script de Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Inicializa Select2 en tu formulario -->
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        function addPropietario() {
            var form = document.getElementById("formPropietario");
            var token = form.children[0].value
            var nombre = form.children[1].children[0].children[1].value
            var documento = form.children[1].children[1].children[1].value
            var direccion = form.children[1].children[2].children[1].value
            var telefono = form.children[1].children[3].children[1].value
            var email = form.children[1].children[4].children[1].value
            var dataForm = {
                nombre: nombre,
                documento: documento,
                direccion: direccion,
                telefono: telefono,
                email: email,
                _token: token
            }

            $.ajax({
                url: "{{ url('propietario/insert') }}",
                type: "POST",
                data: dataForm,
                success: function(data) {
                    // Alerta con sweetalert
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Propietario Agregado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    // Cerrar modal
                    cerrarModal()
                    // Recargar select
                    reloadSelect()
                },
                error: function(data) {
                    console.log(data)
                }
            })
        }

        function cerrarModal() {
            $('#modalCustom').modal('hide')
            // eliminar los elementos con la clase modal-backdrop fade show
            $('.modal-backdrop').remove()
        }
        // funcion para que vuelva a cargar la los datos del select
        function reloadSelect() {
            location.reload();
        }
    </script>
    <script>
        function addAutomovil() {
            var form = document.getElementById("formAutomovil");
            var token = form.children[0].value
            var marca = form.children[2].children[0].children[1].value
            var modelo = form.children[2].children[1].children[1].value
            var color = form.children[2].children[2].children[1].value
            var tipo = form.children[2].children[3].children[1].value
            var placa = form.children[2].children[4].children[1].value
            var idpropietario = document.getElementById("idpropietario").value

            var dataForm = {
                marca: marca,
                modelo: modelo,
                color: color,
                tipo: tipo,
                placa: placa,
                idpropietario: idpropietario,
                _token: token
            }
            $.ajax({
                url: "{{ url('automovil/insert') }}",
                type: "POST",
                data: dataForm,
                success: function(data) {
                    // Alerta con sweetalert
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Automovil Agregado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    // Enviar a automovil
                    location.href = "{{ url('automovil') }}"
                },
                error: function(data) {
                    console.log(data)
                }
            })
        }
    </script>
@stop
