@extends('adminlte::page')

@section('title', 'Vehiculo')

@section('content_header')
<br>
@stop

@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">


          <!-- Horizontal Form -->
          <div class="card card-info">
            <div class="card-header" style="background-color: rgb(50, 50, 167)">
              <h1 class="card-title">EDITAR REGISTRO</h1>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method='POST', action="{{ route('vehiculo.update',$vehiculo->id)}}" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="card-body">
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label>GESTIÓN</label>
                    <input type="text" class="form-control" id="colFormLabelSm" name="anio" value="{{ $vehiculo->anio }}">
                  </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>N°</label>
                       <input type="text" class="form-control "  name="n" value="{{ $vehiculo->n }}">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>ORGANIZACIÓN</label>
                         <select class="form-control" name="organizacion">
                        @foreach($organizaciones as $organizacion)
                        @if($organizacion->id == $vehiculo->organizacion_id)
                        <option value="{{ $organizacion->id }}">{{$organizacion->nombre}}</option>
                        @endif
                        @endforeach
                        </select>
                        </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>PROPIETARIO</label>
                    <select  class="form-control" name="propietario">
                    @foreach($propietarios as $propietario)
                    @if($propietario->id == $vehiculo->propietario_id)
                    <option value="{{ $propietario->id }}">{{$propietario->nombre}}</option>
                    @endif
                    @endforeach
                    </select>
                    </div>
                    </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                    <label>PLACA N°</label>
                    <input type="text" class="form-control "  name="placa" value="{{ $vehiculo->placa }}">
                </div>
                <div class="col-sm-4">
                    <label>MARCA</label>
                    <input type="text" class="form-control "  name="marca" value="{{ $vehiculo->marca }}">
                </div>
                <div class="col-sm-4">
                    <label>MODELO</label>
                    <input type="text" class="form-control "  name="modelo" value="{{ $vehiculo->modelo }}">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <label>COLOR</label>
                    <input type="text" class="form-control " name="color" value="{{ $vehiculo->color }}">
                </div>
                <div class="col-sm-4">
                    <label>TIPO</label>
                    <input type="text" class="form-control " name="tipoVehiculo" value="{{ $vehiculo->tipoVehiculo }}">
                </div>
                <div class="col-sm-4">
                    <label>COMBUSTIBLE</label>
                    <input type="text" class="form-control " name="combustible" value="{{ $vehiculo->combustible }}">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <label>CHASIS N°</label>
                    <input type="text" class="form-control" name="chasis" value="{{ $vehiculo->chasis }}">
                </div>
                <div class="col-sm-6">
                    <label>CAPACIDAD</label>
                <input type="text" class="form-control" name="capacidad" value="{{ $vehiculo->capacidad }}">
                </div>

              </div>
              <div class="row">
                <div class="col-sm-6">
                    <label>MOTOR N°</label>
                    <input type="text" class="form-control" name="motor" value="{{ $vehiculo->motor }}">
                </div>
                <div class="col-sm-6">
                    <label>NUMERO DE ASIENTOS</label>
                    <input type="number" class="form-control" name="asiento" value="{{ $vehiculo->asiento }}">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
              <label>RUTA AUTORIZADA</label>
              <input type="text" class="form-control" name="rutaAutorizada" value="{{ $vehiculo->rutaAutorizada }}">
                </div>
              </div>

    <br>
                <div class="col-sm-12  mb-3">
                    <div class="form-group row ">
                        <label class="col-sm-3 offset-sm-1  col-form-label" style="text-align: right">LICENCIA VALIDAD DESDE:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="fechaInicio" value="{{ $vehiculo->fechaInicio }}">
                        </div>

                        <label class="col-sm-1 col-form-label" style="text-align: right">AL:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="fechaFin" value="{{ $vehiculo->fechaFin }}">
                        </div>

                </div>
              </div>
       <!-- /.card-body -->
       <div class="card-footer">
        <button type="submit" class="btn btn-info" style="background-color: rgb(50, 50, 167)">ACTUALIZAR</button>
        <a href="{{ route('cancelar_vehiculo') }}" class="btn btn-default float-right">CANCELAR</a>
      </div>
      <!-- /.card-footer -->

    </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop





















































