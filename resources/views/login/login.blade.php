@extends('base')


@section('titulo')
    Inicio de sesion
@endsection

@section('login')
<div class="container">
    <div class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                <div class="text-center mt-0">
                    <h1 class="text-primary m-0"><i class="fa fa-solid fa-hospital-user me-2 pt-0 mt-xl-3"></i>Sura Eps</h1>
                </div>
            </div>
            <div class="card-body text-white">
                <form action="/login" method="POST" style="width: 21rem">
                    @csrf
                    <h3 class="mb-0 pb-3 text-white" style="letter-spacing: 1px">Iniciar sesion</h3>

                    <div class="form-outline mb-3">
                        <select class="form-select form-select-lg" name="opciones" >
                            <option value="paciente">Paciente</option>
                            <option value="medico">Medico</option>
                        </select>
                        <label class="form-label">Seleccione su rol</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="number" class="form-control form-control-lg" name="cedula" required />
                        <label class="form-label">Ingrese su documento</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="password" class="form-control form-control-lg" name="clave" required />
                        <label class="form-label" form="clave">Ingrese su contraseña</label>
                    </div>

                    <div class="d-grid gap-2 mb-4 ">
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection