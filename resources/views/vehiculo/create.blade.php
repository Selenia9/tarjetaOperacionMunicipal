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
            <div class="card-header" style="background-color: rgb(73, 104, 165)">
              <h1 class="card-title">CREAR REGISTRO</h1>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method='POST', action="{{ route('vehiculo.store')}}" class="form-horizontal">
                @csrf
                <div class="card-body">
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label>GESTIÓN</label>
                    <input type="text" class="form-control" id="colFormLabelSm" name="anio" value="{{old('anio')}}">
                    @if ($errors->has('anio'))
                    <span class="error text-danger" for="input-anio">{{ $errors->first('anio') }}</span>
                  @endif
                  </div>
                </div>
              <!--   <div class="col-sm-2">
                    <div class="form-group">
                        <label>N°</label>
                       <input type="text" class="form-control "  name="n">
                      </div>
                </div> -->
            {{--     <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>PROPIETARIO</label>
                    <select  class="form-control" name="user">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{$user->name}}</option>
                    @endforeach
                    </select>
                    </div>
                    </div>
              </div> --}}
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>ORGANIZACIÓN</label>
                         <select class="form-control" name="organizacion">
                       <option value="">selccione una opcion</option>
                        @foreach($organizaciones as $organizacion)
                        <option value="{{ $organizacion->id }}">{{$organizacion->nombre}}</option>
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
                        <option value="">selccione el propietaario</option>
                    @foreach($propietarios as $propietario)
                    <option value="{{ $propietario->id }}">{{$propietario->nombre}}</option>
                    @endforeach
                    </select>
                    </div>
                    </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                    <label>PLACA N°</label>
                    <input type="text" class="form-control "  name="placa" value="{{ old('placa')}}" autofocus>
                    @if ($errors->has('placa'))
                    <span class="error text-danger" for="input-placa">{{ $errors->first('placa') }}</span>
                  @endif
                </div>
                <div class="col-sm-4">
                    <label>MARCA</label>
                    <input type="text" class="form-control "  name="marca" value="{{old('marca')}}">
                    @if ($errors->has('marca'))
                    <span class="error text-danger" for="input-marca">{{ $errors->first('marca') }}</span>
                  @endif
                </div>
                <div class="col-sm-4">
                    <label>MODELO</label>
                    <input type="text" class="form-control "  name="modelo" value="{{old('modelo')}}">
                    @if ($errors->has('modelo'))
                    <span class="error text-danger" for="input-modelo">{{ $errors->first('modelo') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <label>COLOR</label>
                    <input type="text" class="form-control " name="color" value="{{old('color')}}">
                    @if ($errors->has('color'))
                    <span class="error text-danger" for="input-color">{{ $errors->first('color') }}</span>
                  @endif
                </div>
                <div class="col-sm-4">
                    <label>TIPO</label>
                    <input type="text" class="form-control " name="tipoVehiculo" value="{{old('tipoVehiculo')}}">
                    @if ($errors->has('tipoVehiculo'))
                    <span class="error text-danger" for="input-tipoVehiculo">{{ $errors->first('tipoVehiculo') }}</span>
                  @endif
                </div>
                <div class="col-sm-4">
                    <label>COMBUSTIBLE</label>
                    <input type="text" class="form-control " name="combustible" value="{{old('combustible')}}">
                    @if ($errors->has('combustible'))
                    <span class="error text-danger" for="input-combustible">{{ $errors->first('combustible') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <label>CHASIS N°</label>
                    <input type="text" class="form-control" name="chasis" value="{{old('chasis')}}">
                    @if ($errors->has('chasis'))
                    <span class="error text-danger" for="input-chasis">{{ $errors->first('chasis') }}</span>
                  @endif
                </div>
                <div class="col-sm-6">
                    <label>CAPACIDAD</label>
                <input type="text" class="form-control" name="capacidad" value="{{old('capacidad')}}">
                @if ($errors->has('capacidad'))
                    <span class="error text-danger" for="input-capacidad">{{ $errors->first('capacidad') }}</span>
                  @endif
                </div>

              </div>
              <div class="row">
                <div class="col-sm-6">
                    <label>MOTOR N°</label>
                    <input type="text" class="form-control" name="motor" value="{{old('motor')}}">
                    @if ($errors->has('motor'))
                    <span class="error text-danger" for="input-motor">{{ $errors->first('motor') }}</span>
                  @endif
                </div>
                <div class="col-sm-6">
                    <label>NUMERO DE ASIENTOS</label>
                    <input type="number" class="form-control" name="asiento" value="{{old('asiento')}}">
                    @if ($errors->has('asiento'))
                    <span class="error text-danger" for="input-asiento">{{ $errors->first('asiento') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
              <label>RUTA AUTORIZADA</label>
              <input type="text" class="form-control" name="rutaAutorizada" value="{{old('rutaAutorizada')}}">
              @if ($errors->has('rutaAutorizada'))
                    <span class="error text-danger" for="input-rutaAutorizada">{{ $errors->first('rutaAutorizada') }}</span>
                  @endif
                </div>
              </div>

    <br>
                <div class="col-sm-12  mb-3">
                    <div class="form-group row ">
                        <label class="col-sm-3 offset-sm-1  col-form-label" style="text-align: right">LICENCIA VALIDAD DESDE:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="fechaInicio" value="{{old('fechaInicio')}}">
                            @if ($errors->has('fechaInicio'))
                    <span class="error text-danger" for="input-fechaInicio">{{ $errors->first('fechaInicio') }}</span>
                  @endif
                        </div>

                        <label class="col-sm-1 col-form-label" style="text-align: right">AL:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="fechaFin" value="{{old('fechaFin')}}">
                            @if ($errors->has('fechaFin'))
                    <span class="error text-danger" for="input-fechaFin">{{ $errors->first('fechaFin') }}</span>
                  @endif
                        </div>

                </div>
              </div>
       <!-- /.card-body -->
       <div class="card-footer">
        <button type="submit" class="btn btn-info" style="background-color: rgb(50, 50, 167)">REGISTRAR</button>
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





































