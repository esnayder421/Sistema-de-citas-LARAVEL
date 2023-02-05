@extends('baseMedicos')


@section('titulo')
    Medicos
@endsection


@section('contenido')
    <!-- CONTENEDOR PRINCIPAL  -->
    <div class="d-flex" id="container">
        <!-- MENU  -->
        <div class="bg-white" id="sidebar-menu">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="fas fa-chalkboard-user me-2"></i> menu principal
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent  active fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i> inicio
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> proyectos
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold">
                    <i class="fas fa-chart-line me-2"></i> Reportes
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold">
                    <i class="fas fa-users me-2"></i> personas
                </a>
                <form action="/medicos" method="GET">
                    @csrf
                    <input type="hidden" name="cerrar" id="">

                    <button type="submit"
                        class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                            class="fas fa-power-off me-2"></i>Cerrar sesion</button>

                </form>
            </div>
        </div>
        <!-- FIN MENU  -->


        <!-- CONTENIDO  -->
        <div id="contenido-principal">
            <nav class="navbar navbar-expand-lg navbar-ligth bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Citas programadas</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="navbar-item">
                            <a href="#" class="navbar-link primary-text fw-bold mx-2" role="button">
                                <i class="fas fa-chalkboard-user me-2"></i> {{ $datos_medico->nombres }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4 ">
                <div class="row g-3 my-2 justify-content-center">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{ number_format($aceptados,0,',','.')}}</h3>
                                <p class="fs-5">Citas aceptadas</p>
                            </div>
                            <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{ number_format($rechazados,0,',','.')}}</h3>
                                <p class="fs-5">Citas rechazadas</p>
                            </div>
                            <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3>Lista de estudiantes</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Fecha_cita</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Lugar</th>
                                    <th scope="col">Medico</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    @if ($cita->medico == $datos_medico->id)
                                        @if (empty($cita->accion))
                                            <tr>
                                                <td>{{ $cita->id }}</td>
                                                <td>{{ $cita->servicio }}</td>
                                                <td>{{ $cita->fecha_cita }}</td>
                                                <td>{{ $cita->hora }}</td>
                                                <td>{{ $cita->lugar }}</td>
                                                <td>{{ $datos_medico->nombres }}</td>
                                                <td>

                                                    <form action="/citas/{{ $cita->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-outline-success"
                                                            name="validar" value="Aceptar">Aceptar</button>
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            name="validar" value="Rechazar">Rechazar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @else
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN CONTENIDO  -->

    </div>
    <!-- FIN CONTENEDOR PRINCIPAL  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script>
        let container = document.getElementById("container");
        let tButton = document.getElementById("menu-toggle");

        tButton.onclick = function() {
            container.classList.toggle("toggled");
        }
    </script>
@endsection
