<?php

namespace App\Http\Controllers;


use App\Cliente;
use App\Estudio;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        foreach ($clientes as $cliente) {
            $cliente->estudio = $cliente->estudio;
            $cliente->fechanac = date_format(date_create($cliente->fechanac), 'd/m/Y');;
        }

        return view('Clientes',compact('clientes'));
    }

    public function create()
    {
        $estudios = Estudio::all();
        return view('Clientes_create',compact('estudios'));
    }

    public function store(RequestCliente $request)
    {
        try {
            $fecha = date_format(date_create(str_replace('/','-',$request->input('fecha_nacimiento'))),'Y-m-d');

            $valida = Cliente::where('nombre', $request->input('nombre'))
            ->where('appaterno', $request->input('apellido_paterno'))
            ->where('apmaterno', $request->input('apellido_materno'))
            ->where('fechanac', $fecha)
            ->first();

            if ( is_null($valida)){
                $cliente = new Cliente;
                $cliente->nombre    = $request->input('nombre');
                $cliente->appaterno = $request->input('apellido_paterno');
                $cliente->apmaterno = $request->input('apellido_materno');
                $cliente->fechanac  = $fecha;
                $cliente->calle     = $request->input('calle');
                $cliente->colonia   = $request->input('colonia');
                $cliente->numext    = $request->input('num_ext');
                $cliente->cp        = $request->input('codigo_postal');
                $cliente->ciudad    = $request->input('ciudad');
                $cliente->estado    = $request->input('estado');
                $cliente->estudiorealizar = $request->input('estudio');

                $cliente->save();
                flash('Cliente guardado correctamente')->success();
            }else{
                flash('¡El cliente ya ha sido registrado!')->warning();
                return back()->withInput();
            }

        } catch (\Illuminate\Database\QueryException $e) {
            flash('¡Error al guardar cliente!')->error();
            return back()->withInput();
        }
        return redirect('clientes');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $cliente->fechanac = date_format(date_create($cliente->fechanac), 'd/m/Y') ;
        $estudios = Estudio::all();

        return view('Clientes_edit',compact('cliente','estudios'));
    }

    public function update(Request $request, $id)
    {
        try {
            $fecha = date_format(date_create(str_replace('/','-',$request->input('fecha_nacimiento'))),'Y-m-d');

            $valida = Cliente::where('nombre', $request->input('nombre'))
            ->where('appaterno', $request->input('apellido_paterno'))
            ->where('apmaterno', $request->input('apellido_materno'))
            ->where('fechanac', $fecha)
            ->first();

            if ( is_null($valida)){
                $cliente = Cliente::find($id);
                $cliente->nombre    = $request->input('nombre');
                $cliente->appaterno = $request->input('apellido_paterno');
                $cliente->apmaterno = $request->input('apellido_materno');
                $cliente->fechanac  = $fecha;
                $cliente->calle     = $request->input('calle');
                $cliente->colonia   = $request->input('colonia');
                $cliente->numext    = $request->input('num_ext');
                $cliente->cp        = $request->input('codigo_postal');
                $cliente->ciudad    = $request->input('ciudad');
                $cliente->estado    = $request->input('estado');
                $cliente->estudiorealizar = $request->input('estudio');
                
                $cliente->save();
                flash('Cliente actualizado correctamente')->success();
            }else{
                flash('¡El cliente ya ha sido registrado!')->warning();
                return back()->withInput();
            }     
        } catch (\Illuminate\Database\QueryException $e) {
            flash('¡Error al actualizar cliente!')->error();
            return back()->withInput();
        }
        return redirect('clientes');
    }

    public function destroy($id)
    {
        try {
            $cliente = Cliente::find($id);
            $cliente->delete();
            flash('Cliente eliminado correctamente')->success();
        } catch (\Illuminate\Database\QueryException $e) {
            flash('¡Error al eliminar cliente!')->warning();
        }
        
        return back()->withInput();
    }
}
