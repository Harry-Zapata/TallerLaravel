@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienbenido a la página de administración.</p>
    <div class="row d-flex justify-content-around gap-3">
        <x-adminlte-info-box class="col-md-5" title="{{ count($propietario) }}" text="Propietarios"
            icon="fas fa-lg fa-user-plus text-info" theme="gradient-info" icon-theme="white" />
        <x-adminlte-info-box class="col-md-5" title="{{ count($auto) }}" text="Autos" icon="fas fa-lg fa-car text-danger"
            theme="gradient-danger" icon-theme="white" />
    </div>
    {{-- Graficas de autos y propietarios --}}
    <div class="row">
        <div class="col-md-12">
            <x-adminlte-card title="Autos" theme="success" icon="fas fa-lg fa-car text-white">
                <canvas id="Auto"></canvas>
            </x-adminlte-card>
        </div>
    </div>
@stop
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Array de Propietarios
            var propietarioData = @json($propietario);
            var autoData = @json($auto);
            //array de cantidad de autos por propietario
            var autoPorPropietario = [];
            //Funcion asincrona
            for (var i = 0; i < propietarioData.length; i++) {
                autoPorPropietario.push({
                    nombre: propietarioData[i].nombre,
                    cantidad: autoData.filter(auto => auto.idpropietario == propietarioData[i].id).length
                })
            }
            //Separar los datos en arrays de nombres y cantidad
            let nombres = [];
            let cantidades = [];

            // Itera sobre los datos originales y separa los nombres y las cantidades
            autoPorPropietario.forEach((dato) => {
                nombres.push(dato.nombre);
                cantidades.push(dato.cantidad);
            });

            const ctx = document.getElementById('Auto').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombres,
                    datasets: [{
                        label: 'Cantidad de Autos por Propietario',
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        data: cantidades,
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@stop
