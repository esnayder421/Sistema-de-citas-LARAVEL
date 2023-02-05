<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');

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
        session_start();
        /////////// LOGIN /////////////////
        $accion= request('opciones');
        if($accion == 'paciente'){
            $cedula = $request->get("cedula");
            $clave = $request->get('clave');
            $consulta = Pacientes::where("cedula",$cedula)->where("clave",$clave)->first();
            $_SESSION['login'] = $consulta;
            return redirect("/citas");
        }elseif ($accion == "medico") {
            $cedula = $request->get("cedula");
            $clave = $request->get('clave');
            $consulta2 = Medicos::where("cedula",$cedula)->where("clave",$clave)->first();
            $_SESSION['medico'] = $consulta2;
            return redirect("/medicos");
        }
        ///// FIN LOGIN /////
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
