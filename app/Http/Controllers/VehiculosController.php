<?php

namespace App\Http\Controllers;
use App\Models\Organizacione;
use App\Models\propietario;
use App\Models\Vehiculo;
use App\Models\User;
use PDF;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\Qrcode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VehiculosController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        abort_if(Gate::denies('vehiculo_index'), 403);

        $vehiculos = Vehiculo::all();
        //declaramos la vista
        return view('vehiculo.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('vehiculo_create'), 403);
        $organizaciones = Organizacione::orderBy('id', 'desc')->get();
        $propietarios = Propietario::orderBy('id', 'desc')->get();


        return view('vehiculo.create', compact('organizaciones', 'propietarios'));
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
        'anio' => 'required',
        'placa' => 'required',
        'color' => 'required',
        'chasis' => 'required',
        'motor' => 'required',
        'capacidad' => 'required',
        'asiento'=> 'required',
        'modelo' => 'required',
        'marca' => 'required',
        'tipoVehiculo' => 'required',
        'combustible' => 'required',
        'rutaAutorizada' => 'required',
        'fechaInicio' => 'required',
        'fechaFin' => 'required',

    ]);


    /*   DB::table('vehiculos')->select('n')->whereRaw('id = (SELECT max(n) FROM vehiculos)')->get(); */
    /*  DB::table('vehiculos')->select(DB::raw('FLOOR(5 + RAND(n)*(13-5))'))->get(); */

  /*  try{
    DB::beginTransaction(); */
        $propietario = new Propietario();
        $propietario->nombre = $request->nombre;
        $propietario->domicilio = $request->domicilio;
        $propietario->telefono = $request->telefono;
        $propietario->save();
        $vehiculo = new Vehiculo;
        $vehiculo->propietario_id = $propietario->id;
        $n = Helper::IDGenerator(new Vehiculo, 'n', 4, 'N°'); /** Generate id */
        $vehiculo->n = $n;
        $vehiculo->anio = $request->anio;
        $vehiculo->placa = $request->placa;
        $vehiculo->color = $request->color;
        $vehiculo->chasis = $request->chasis;
        $vehiculo->motor = $request->motor;
        $vehiculo->capacidad = $request->capacidad;
        $vehiculo->asiento = $request->asiento;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->marca = $request->marca;
        $vehiculo->tipoVehiculo = $request->tipoVehiculo;
        $vehiculo->combustible = $request->combustible;
        $vehiculo->rutaAutorizada = $request->rutaAutorizada;
        $vehiculo->fechaInicio = $request->fechaInicio;
        $vehiculo->fechaFin = $request->fechaFin;
        $vehiculo->organizacion_id = $request->organizacion;


        $vehiculo->save();
        return redirect()->route('vehiculo.index')->with('datos', 'Registrado Correctamente');
 /*       DB::cammit();
}catch (\Exception $e){
     DB::rollback();
    return response()->json(['message' => 'error']);
} */
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('vehiculo_show'), 403);

        $vehiculo = Vehiculo::find($id);
        $fechaini = Carbon::parse($vehiculo->fechaInicio);
        $f = $fechaini->format('d-m-Y');
        $fechafin = Carbon::parse($vehiculo->fechaFin);
        $ff = $fechafin->format('d-m-Y');
        return view('vehiculo.show', compact('vehiculo','f','ff'));

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
        abort_if(Gate::denies('vehiculo_edit'), 403);
        $vehiculo = Vehiculo::findOrFail($id);
        $organizaciones = Organizacione::orderBy('nombre', 'asc')->get();
        $propietario = Propietario::findOrFail($id);
        return view('vehiculo.edit', compact('vehiculo', 'organizaciones', 'propietario'));
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
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->propietario_id = $propietario->id;
        $vehiculo->n = $request->n;
        $vehiculo->anio = $request->anio;
        $vehiculo->placa = $request->placa;
        $vehiculo->color = $request->color;
        $vehiculo->chasis = $request->chasis;
        $vehiculo->motor = $request->motor;
        $vehiculo->capacidad = $request->capacidad;
        $vehiculo->asiento = $request->asiento;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->marca = $request->marca;
        $vehiculo->tipoVehiculo = $request->tipoVehiculo;
        $vehiculo->combustible = $request->combustible;
        $vehiculo->rutaAutorizada = $request->rutaAutorizada;
        $vehiculo->fechaInicio = $request->fechaInicio;
        $vehiculo->fechaFin = $request->fechaFin;




        $vehiculo->organizacion_id = $request->organizacion;

        $vehiculo->save();

        return redirect()->route('vehiculo.index')->with('datos', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculo.confirm', compact('vehiculo'));
    }
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('vehiculo_destroy'), 403);
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculo.index')->with('datos', 'Eliminado Correctamente');
    }
    public function downloadPdf($id)
    {

       $vehiculo = Vehiculo::where("id","=",$id)->firstOrFail();
       $fechaini = Carbon::parse($vehiculo->fechaInicio);
       $f = $fechaini->format('d-m-Y');
       $fechafin = Carbon::parse($vehiculo->fechaFin);
       $ff = $fechafin->format('d-m-Y');
       $dato_qr = $vehiculo->n .'|' . $vehiculo->organizacion->nombre . '|' . 'NOMBRE:'. $vehiculo->propietario->nombre .'|'. 'PLACA:' . $vehiculo->placa.'|'. 'MARCA:' . $vehiculo->marca.'|'. 'RUTA:' . $vehiculo->rutaAutorizada  ;
       $qrcode = QrCode::format('svg')->size(125)->errorCorrection('H')->generate($dato_qr,'../public/qrcodes/qrcode.svg');
        $pdf = PDF::loadView('vehiculo.pdf',compact('vehiculo','qrcode','f','ff'))->setPaper('A5', 'landscape');
        return $pdf->stream('permiso.pdf');

    }
    public function reportePDF()
    {
       $vehiculos = Vehiculo::all();
       $pdf = PDF::loadView('vehiculo.reportePDF', ['vehiculos' => $vehiculos]);
        return $pdf->stream('reporte registros.pdf');

    }
}
