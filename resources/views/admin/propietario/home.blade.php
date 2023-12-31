@extends('adminlte::page')

@section('title', 'Propietario')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-between align-items-center mt-5">
                        <a href="{{ url('/propietario') }}">
                            <h2>Propietario</h2>
                        </a>
                        <a href="{{ url('/propietario/add') }}" class="btn btn-success"
                            style="width: 50px;height: 50px;display: grid; place-content: center"><i
                                class="material-icons">&#xE147;</i></a>
                    </div>
                </div>
                <div class="row filter">
                    <div class="col-md-8 mt-4">
                        <div class="input-group">
                            <input type="search" id="search" class="form-control" class="form-control"
                                placeholder="Buscar por nombre ...." oninput="searchName()">
                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class="input-group">
                            <input type="number" id="searchid" class="form-control" class="form-control"
                                placeholder="Buscar por id ...." oninput="searchId()">
                        </div>
                    </div>
                </div>
            </div>
            @if (session('info'))
                <div class="alert alert-success mt-4" id="alert">
                    {{ session('info') }}
                </div>
            @endif
            <table class="table table-striped table-hover" id="table" style="margin: 50px 0">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if (count($propietario) > 0)
                        @foreach ($propietario->all() as $propietario)
                            <tr>
                                <td>{{ $propietario->id }}</td>
                                <td>{{ $propietario->nombre }}</td>
                                <td>{{ $propietario->documento }}</td>
                                <td>{{ $propietario->direccion }}</td>
                                <td>{{ $propietario->telefono }}</td>
                                <td>{{ $propietario->email }}</td>
                                <td class="d-flex justify-content-around">
                                    <a href='{{ url("/propietario/read/{$propietario->id}") }}' class="material-icons read"
                                        data-toggle="tooltip" data-placement="tooltip" title="Read">&#xE86D;</a>
                                    <a href='{{ url("/propietario/edit/{$propietario->id}") }}' class="material-icons edit"
                                        data-toggle="tooltip" data-placement="tooltip" title="Update">&#xE254;</a>
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
    <script>
        function searchName() {
            var input = document.getElementById("search").value.toLowerCase();
            var table = document.getElementById("table");
            var tr = table.getElementsByTagName("tr");
            for (var i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue = txtValue.toLowerCase();
                    if (txtValue.indexOf(input) > -1) {
                        //console.log(txtValue);
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        function searchId() {
            var input = document.getElementById("searchid").value.toLowerCase();
            var table = document.getElementById("table");
            var tr = table.getElementsByTagName("tr");
            for (var i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue = txtValue.toLowerCase();
                    if (txtValue.indexOf(input) > -1) {
                        //console.log(txtValue);
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
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
