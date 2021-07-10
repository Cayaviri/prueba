<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtener lista de empresas
        $Empresas = Empresa::paginate(5);
        return view('adminEmpresas', 
            ['Empresas'=>$Empresas]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agregarEmpresa');
    }

    private function validarform(Request $request)
    {
        $request->validate(
            [
                'empNombre'=>'required|min:3|max:100',
                'empPais'=>'required|min:3|max:50',
                'empCiudad'=>'required|min:3|max:50',
                'empDireccion'=>'required|min:3|max:50',
                'empNit'=>'required|numeric|min:0',
                'empPeriodo'=>'required|numeric|min:2020',
                'empInicio'=>'required|date',
                'empCierre'=>'required|date',
                'empTelefono'=>'required'
            ],
            [
                'empNombre.required'=>'Complete el campo Nombre de la empresa',
                'empNombre.min'=>'Complete el campo Nombre con al menos 3 caractéres',
                'empNombre.max'=>'Complete el campo Nombre con 70 caractéres como máxino',
                'empPais.required'=>'Complete el campo Pais',
                'empPais.min'=>'Complete el campo Pais con al menos 3 caractéres',
                'empPais.max'=>'Complete el campo Pais con 50 caractéres como máximo',
                'empCiudad.required'=>'Complete el campo Ciudad',
                'empCiudad.min'=>'Complete el campo Ciudad con al menos 3 caractéres',
                'empCiudad.max'=>'Complete el campo Ciudad con 50 caractéres como máximo',
                'empDireccion.required'=>'Complete el campo Dirección',
                'empDireccion.min'=>'Complete el campo Dirección con al menos 3 caractéres',
                'empDireccion.max'=>'Complete el campo Dirección con 50 caractéres como máximo',
                'empNit.required'=>'Complete el campo Nit',
                'empNit.numeric'=>'Complete el campo Nit con solo números',
                'empPeriodo.required'=>'Complete el campo Gestión',
                'empPeriodo.numeric'=>'Complete el campo Gestión con solo números',
                'empPeriodo.min'=>'Complete el campo Gestión como mínimo 2020',
                'empInicio.required'=>'Complete el campo Fecha de inicio',
                'empInicio.date'=>'Complete el campo Fecha de inicio con fecha válida',
                'empCierre.required'=>'Complete el campo Fecha de cierre',
                'empCierre.date'=>'Complete el campo Fecha de cierre con fecha válida',
                'empTelefono.required'=>'Complete el campo teléfono'
            ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validación
        $this->validarForm($request);

        // captura datos del formulario
        $empNombre = $request->empNombre;
        $empNit = $request->empNit;
        $empCiudad = $request->empCiudad;
        $empPais = $request->empPais;
        $empDireccion = $request->empDireccion;
        $empTelefono = $request->empTelefono;
        $empPeriodo = $request->empPeriodo;
        $empInicio = $request->empInicio;
        $empCierre = $request->empCierre;
        $empFecha = date('y/m/d');
        $empUsuario = 'admin';

        //registramos en la base de datos
        $Empresa = new Empresa;
        $Empresa->empNombre = $empNombre;
        $Empresa->empNit = $empNit;
        $Empresa->empCiudad = $empCiudad;
        $Empresa->empPais = $empPais;
        $Empresa->empDireccion = $empDireccion;
        $Empresa->empTelefono = $empTelefono;
        $Empresa->empPeriodo = $empPeriodo;
        $Empresa->empInicio = $empInicio;
        $Empresa->empcierre = $empCierre;
        $Empresa->empFecha = $empFecha;
        $Empresa->empUsuario = $empUsuario;
        $Empresa->save();


        //redireccionamos a la vista adminEmpresas
        return redirect('/adminEmpresas')
        ->with([ 'mensaje' => 'Empresa: '.$empNombre. ' agregado correctamente' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($idEmpresa)
    {
        //obtenemos registro de la db
        $Empresa = Empresa::where('idEmpresa',$idEmpresa)->first();
        //dd($Empresa);
        //retornamos la vista para ediciion
        return view('modificarEmpresa',
            [
                'Empresa'=>$Empresa 
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validamos la información
        $this->validarform($request);
        //obtenemos datos del formulario
        $idEmpresa = $request->idEmpresa;
        $empNombre = $request->empNombre;
        $empNit = $request->empNit;
        $empCiudad = $request->empCiudad;
        $empPais = $request->empPais;
        $empDireccion = $request->empDireccion;
        $empTelefono = $request->empTelefono;
        $empPeriodo = $request->empPeriodo;
        $empInicio = $request->empInicio;
        $empCierre = $request->empCierre;
        //obtener registo db
        $Empresa = Empresa::where('idEmpresa',$idEmpresa)->first();
        //dd($Empresa);
        //actualizamos registro
        $Empresa->empNombre = $empNombre;
        $Empresa->empNit = $empNit;
        $Empresa->empCiudad = $empCiudad;
        $Empresa->empPais = $empPais;
        $Empresa->empDireccion = $empDireccion;
        $Empresa->empTelefono = $empTelefono;
        $Empresa->empPeriodo = $empPeriodo;
        $Empresa->empInicio = $empInicio;
        $Empresa->empcierre = $empCierre;
        $Empresa->save();

        //redireccionamos a la vista adminEmpresas
        return redirect('/adminEmpresas')
        ->with([ 'mensaje' => 'Empresa: '.$empNombre. ' modificado correctamente' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
