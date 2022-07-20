@extends('adminlte::page')

@section('title', 'Propietario')

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
            <form method='POST', action="{{ route('propietario.update',$propietario->id)}}" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>NOMBRE COMPLETO</label>
                    <input type="text" class="form-control "  name="nombre" value="{{ $propietario->nombre }}">
                    </div>
                    </div>
              </div>
              <div class="row">
                <div class="col-sm-9">
                  <div class="form-group">
                    <label>DOMICILIO</label>
                    <input type="text" class="form-control" name="domicilio" value="{{ $propietario->domicilio }}">
                  </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>TELEFONO</label>
                       <input type="text" class="form-control "  name="telefono" value="{{ $propietario->telefono }}">
                      </div>
                </div>
              </div>



       <!-- /.card-body -->
       <div class="card-footer">
        <button type="submit" class="btn btn-info" style="background-color: rgb(50, 50, 167)">ACTUALIZAR</button>
        <a href="{{ route('cancelar_propietario') }}" class="btn btn-default float-right">CANCELAR</a>
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





































