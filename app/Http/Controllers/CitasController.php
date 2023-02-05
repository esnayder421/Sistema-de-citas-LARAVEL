<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session_start();
        if($request->exists('cerrar')){
            unset($_SESSION['login']);
            return view('login.login');
        }

        if(isset($_SESSION['login'])){
            $hora = date("h:i:m");
            $datos = $_SESSION['login'];
            $medicos = Medicos::all();
            $citas = Citas::all();
            $paciente = Pacientes::all();
            return view('pacientes.index')->with(['datos_paciente'=>$datos,'hora'=>$hora,'medicos'=>$medicos,'citas'=>$citas,'paciente'=>$paciente]);
            //return $datos;
        }else{
            return view('login.login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //// INSERTAR CITAS //////
        $citas = request()->except('_token');
        Citas::insert($citas);
        return redirect("/citas");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion = request("validar");
        $cita = Citas::find($id);
        if ($validacion == "Aceptar"){
            $cita->accion = $request->get("validar");
            $cita->save();
        }else{
            $cita->accion = $request->get("validar");
            $cita->save();
        }

        return redirect('/medicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
