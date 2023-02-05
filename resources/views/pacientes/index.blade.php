@extends('base')


@section('titulo')
    Pacientes
@endsection


@section('contenido')
    <!-- CONTENEDOR PRINCIPAL  -->
    <div class="d-flex" id="container">
        <!-- MENU  -->
        <div class="bg-white" id="sidebar-menu">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="fas fa-user me-2"></i> menu principal
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent  active fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i> inicio
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Citas
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold">
                    <i class="fas fa-chart-line me-2"></i> Reportes
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold">
                    <i class="fas fa-users me-2"></i> personas
                </a>

                <form action="/citas" method="GET">
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
                    <h2 class="fs-2 m-0">Citas</h2>
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
                                <i class="fas fa-user me-2"></i> {{ $datos_paciente->nombres }}
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
                                <h3 class="fs-2">Nueva cita</h3>
                                <button type="button" class="btn boton mx-lg-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Insertar cita
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Formulario de citas</h5><button
                                    type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/citas" method="POST">
                                    @csrf
                                    <input type="hidden" name="paciente" value="{{ $datos_paciente->id }}">
                                    <div class="form-outline mb-3 mt-3">
                                        <input type="text" class="form-control" name="servicio" />
                                        <label class="form-label">Ingrese el servicio</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="date" class="form-control" name="fecha_cita" />
                                        <label class="form-label">Ingrese la fecha</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="time" class="form-control" name="hora"
                                            value="{{ $hora }}" required />
                                        <label class="form-label">Hora cita</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="text" class="form-control" name="lugar" value="" />
                                        <label class="form-label">Ingrese el lugar</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <select class="form-select" name="medico">
                                            @foreach ($medicos as $c)
                                                <option value="{{ $c->id }}">{{ $c->nombres }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Seleccione el medico</label>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row my-5">
                    <h3>Historial de citas</h3>
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
                                @if($datos_paciente->id == $cita->paciente)
                                    <tr>
                                        <td>{{ $cita->id }}</td>
                                        <td>{{ $cita->servicio }}</td>
                                        <td>{{ $cita->fecha_cita }}</td>
                                        <td>{{ $cita->hora }}</td>
                                        <td>{{ $cita->lugar }}</td>

                                        <td>
                                            @foreach ($medicos as $c)
                                                @if ($c->id == $cita->medico )
                                                {{$c->nombres}}
                                                @endif
                                            @endforeach

                                        </td>
                                        <td>
                                            @if (empty($cita->accion))
                                                <button disabled class="btn btn-warning">Pendiente</button>
                                            @elseif($cita->accion == 'Aceptar')
                                                <button disabled class="btn btn-success">Aceptado</button>
                                            @elseif($cita->accion == 'Rechazar')
                                                <button disabled class="btn btn-danger">Rechazado</button>
                                            @endif
                                        </td>


                                    </tr>
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

    <script>
        let container = document.getElementById("container");
        let tButton = document.getElementById("menu-toggle");

        tButton.onclick = function() {
            container.classList.toggle("toggled");
        }
    </script>
@endsection
