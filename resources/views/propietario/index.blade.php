
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
              <h3 class="card-title">LISTA DE PRPIETARIOS</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">
                <div style="margin-left: 50px; ">

                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        @can('propietarios_create')
                        <a href="{{ route('propietario.create') }}" class="btn btn-primary " data-toggle="modal" data-target="#showModal" data-whatever="@mdo"><i class="fas fa-plus"> </i> NUEVO</a>

                        @endcan

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


                <table class="table table-hover" id="propietario">
                    <thead class="text-primary">
                    <tr>
                        <th>#id</th>
                        <th>Nombre</th>
                        <th>Domicilio</th>
                        <th>Telefono</th>
                        <th>Acción</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach($propietarios as $propietario)
                      <tr>
                        <th scope="row">{{$propietario->id}}</th>
                        <td>{{$propietario->nombre}}</td>
                        <td>{{$propietario->domicilio}}</td>
                        <td>{{$propietario->telefono}}</td>


                        <td>
                            @can('propietarios_edit')
                            <a href="{{ route('propietario.edit',$propietario->id)}}" class="btn btn-warning">
                                <i class="fas fa-pen"></i> </a><!--editar-->
                                @endcan
                                @can('propietarios_destroy')
                          <a href="{{ route('propietario.confirm',$propietario->id)}}" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> </a><!--eliminar-->
                            @endcan
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
<!-- Modal de crear -->
<div class="modal fade" id="showModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header"  style="background-color: rgb(50, 50, 167)">
      <h5 class="card-category"  style="color: white">CREAR PROPIETARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
              <div class="col-md-12">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                        <form method='POST', action="{{ route('propietario.store')}}" class="form-horizontal">
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>NOMBRE COMPLETO</label>
                    <input type="text" class="form-control "  name="nombre"value="{{ old('nombre')}}">
                    @if ($errors->has('nombre'))
                    <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                  @endif
                </div>
                 </div>
              </div>
              <div class="row">
                <div class="col-sm-9">
                  <div class="form-group">
                    <label>DOMICILIO</label>
                    <input type="text" class="form-control" name="domicilio" value="{{ old('domicilio')}}">
                    @if ($errors->has('domicilio'))
                    <span class="error text-danger" for="input-domicilio">{{ $errors->first('domicilio') }}</span>
                  @endif
                </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>TELEFONO</label>
                       <input type="text" class="form-control "  name="telefono" value="{{ old('telefono')}}">
                       @if ($errors->has('telefono'))
                    <span class="error text-danger" for="input-telefono">{{ $errors->first('telefono') }}</span>
                  @endif
                    </div>
                </div>
              </div>



       <!-- /.card-body -->
       <div class="card-footer">
        <button type="submit" class="btn btn-info" style="background-color: rgb(50, 50, 167)">REGISTRAR</button>
        <a href="{{ route('cancelar', 'propietario.index') }}" class="btn btn-default float-right">CANCELAR</a>
         </div>
      <!-- /.card-footer -->

    </div>
            </form>
                        </div>
                     </p>
                    </div>
                  </div>
                </div>
            </div>
    </div>
  </div>
</div>
<!--
    //MODAL
<div class="modal fade" id="showModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
      <p class="card-category">CREAR PROPIETARIO</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
              <div class="col-md-12">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                             .....................................
                        </div>
                     </p>
                    </div>
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <a " class="btn btn-primary"> Editar </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> -->

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js
    "></script>
    <script>$(document).ready(function () {
        $('#propietario').DataTable();
    });</script>
@stop
















