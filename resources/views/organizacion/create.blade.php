@extends('adminlte::page')

@section('title', 'Organizacion')

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
              <h1 class="card-title">CREAR ORGANIZACION</h1>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method='POST', action="{{ route('organizacion.store')}}" class="form-horizontal">
                @csrf
                <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
              <label>NOMBRE DE ORGANIZACION</label>
              <input type="text" class="form-control"  name="nombre">
                </div>
              </div>
              @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
       <!-- /.card-body -->
       <div class="card-footer">
        <button type="submit" class="btn btn-info" style="background-color: rgb(50, 50, 167)">REGISTRAR</button>
        <a href="{{ route('cancelar', 'organizacion.index') }}" class="btn btn-default float-right">CANCELAR</a>
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

