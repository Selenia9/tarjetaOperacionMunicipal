
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
              <h3 class="card-title">LISTA DE ORGANIZACION</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">

                <div class="row">
                    <div class="col-12 text-right">
                        @can('organizacione_create')
                        <a href="{{ route('organizacion.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> NUEVO</a>
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


                <table  class="table table-hover" id="organizacion">
                    <thead class="text-primary">
                    <tr>
                    <th>#id</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($organizaciones as $organizacion)
                    <tr>
                    <th>{{$organizacion->id}}</th>
                    <td>{{$organizacion->nombre}}</td>


                    <td>
                        @can('organizacione_edit')
                        <a href="{{ route('organizacion.edit',$organizacion->id)}}" class="btn btn-warning">
                            <i class="fas fa-pen"></i> </a><!--editar-->
                            @endcan
                            @can('organizacione_destroy')
                    <a href="{{ route('organizacion.confirm',$organizacion->id)}}" class="btn btn-danger">
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
        $('#organizacion').DataTable();
    });</script>
@stop








