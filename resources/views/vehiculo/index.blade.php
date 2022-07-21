
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop
@section('content')
  <section class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LISTA TARJETA DE OPERACION</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        @can('vehiculo_create')
                        <a href="{{ route('vehiculo.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> NUEVO</a>
                        @endcan
                        <a href="{{ route('vehiculo.reportePDF')}}" class="btn btn-primary btn-sm"  >
                            <i class="fas fa-file-export"></i>EXPORTAR</a>
                    </div>
                  </div>
                  <br>
                  @if(session('datos'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('datos') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  @endif


                  @if(session('cancelar'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('cancelar') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  @endif


                  <table class="table table-striped table-bordered nowrap" id="vehiculo">
                    <thead class="text-primary">
                    <tr>

                    <th>N</th>
                    <th>PROPIETARIO</th>
                  {{--   <th>USUARIO</th> --}}
                    <th>ORGANIZACION</th>
                    <th>PLACA</th>
                    <th>MARCA</th>
                    <th>TIPO VEHICULO</th>
                    <th>ACCION</th>

                      </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
                    <tr>

                    <td>{{$vehiculo->n}}</td>
                    <td>{{$vehiculo->propietario->nombre}}</td>
              {{--       <td>{{$vehiculo->user->name}}</td> --}}
                    <td>{{$vehiculo->organizacion->nombre}}</td>
                    <td>{{$vehiculo->placa}}</td>
                    <td>{{$vehiculo->marca}}</td>
                    <td>{{$vehiculo->tipoVehiculo}}</td>

                    <td>
                        <!--informacion-->
                        @can('vehiculo_show')
                        <a href="{{ route('vehiculo.show',$vehiculo->id)}}" style='width: 29px; height: 20px;'class="btn btn-primary">
                            <i style="font-size:10px; float: left;" class="fas fa-eye"></i></a>

                         @endcan
                      {{--   @can('vehiculo_show')
                        <a href="" style='width: 29px; height: 20px;' class="btn btn-primary " data-toggle="modal" data-target="#showModal" data-whatever="@mdo">
                         <i style="font-size:10px; float: left;" class="fas fa-eye"></i></a>
                         @endcan --}}
                         <!--editar-->
                         @can('vehiculo_edit')
                            <a href="{{ route('vehiculo.edit',$vehiculo->id)}}" style='width: 29px; height: 20px;'class="btn btn-warning">
                                <i style="font-size:10px; float: left;" class="fas fa-pen"></i> </a>
                          @endcan
                          <!--eliminar-->
                          @can('vehiculo_destroy')
                          <a href="{{ route('vehiculo.confirm',$vehiculo->id)}}" style='width: 29px; height: 20px;' class="btn btn-danger">
                            <i style="font-size:10px; float: left;" class="fas fa-trash-alt"></i> </a>
                            @endcan

                         {{--   boton pdf --}}
                            <a href="{{ route('vehiculo.pdf',$vehiculo->id)}}" style='width: 29px; height: 20px;' class="btn btn-danger"  >
                                <i style="font-size:10px; float: left;" class="fas fa-file-download"></i></a>

                       </td>
                </tr>
                @endforeach
                </tbody>
                </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>


</div><!-- /.container-fluid -->
</section>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>$(document).ready(function () {
        $('#vehiculo').DataTable({
            responsive:true,
            autoWidth:false
        });
    });</script>
@stop
