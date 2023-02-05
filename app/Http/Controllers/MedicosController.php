<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use App\Models\Pacientes;

class MedicosController extends Controller
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
            unset($_SESSION['medico']);
            return view('login.login');
        }

        if(isset($_SESSION['medico'])){
            $datos = $_SESSION['medico'];
            $aceptados = Citas::where("accion","aceptar")->where("medico",$datos->id)->get()->count();
            $rechazados = Citas::where("accion","rechazar")->where("medico",$datos->id)->get()->count();
            $citas = Citas::all();
            return view('medicos.index')->with(['datos_medico'=>$datos,'citas'=>$citas,'aceptados'=>$aceptados,'rechazados'=>$rechazados]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
