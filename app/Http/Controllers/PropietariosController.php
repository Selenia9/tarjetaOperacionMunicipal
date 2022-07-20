<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use App\Models\Propietario;

class PropietariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        abort_if(Gate::denies('propietarios_index'), 403);

        $nombre = $request->get('buscarpornombre');
        $propietarios = Propietario::orderBy('id', 'desc')->get();

        return view('propietario.index', compact('propietarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('propietarios_create'), 403);

        return view('propietario.create');
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
         $request->validate([
            'nombre' => 'required|min:10',
            'domicilio' => 'required',
            'telefono' => 'required',

        ]);
        $propietario = new Propietario();
        $propietario->nombre = $request->nombre;
        $propietario->domicilio = $request->domicilio;
        $propietario->telefono = $request->telefono;
        $propietario->save();
        return redirect()->route('propietario.index')->with('datos','Registrado Correctamente');

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
        abort_if(Gate::denies('propietarios_show'), 403);
        $propietario = Propietario::find($id);
        return view('propietario.show', compact('propietario'));

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
        abort_if(Gate::denies('propietarios_edit'), 403);
        $propietario = Propietario::findOrFail($id);
        return view('propietario.edit', compact('propietario'));


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
        $propietario = Propietario::findOrFail($id);
        $propietario->nombre = $request->nombre;
        $propietario->domicilio = $request->domicilio;
        $propietario->telefono = $request->telefono;
        $propietario->save();

        return redirect()->route('propietario.index')->with('datos','Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
      $propietario = Propietario::findOrFail($id);
        return view('propietario.confirm', compact('propietario'));
    }
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('propietarios_destroy'), 403);

        $propietario = Propietario::findOrFail($id);
        $propietario->delete();
        return redirect()->route('propietario.index')->with('datos','Eliminado Correctamente');


    }

}
