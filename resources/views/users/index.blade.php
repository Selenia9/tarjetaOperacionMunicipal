@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop
@section('content')

    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LISTA DE USUARIOS</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">

                <div class="row">
                    <div class="col-12 text-right">
                        @can('user_create')
                       <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> NUEVO</a>
                        @endcan
                    </div>
                  </div>
                  <br>
                  <table  class="table table-hover" id="users">
                     <thead class="text-primary">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Full Name</th>
                        <th>Roles</th>
                        <th class="text-right">Acciones</th>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>
                                @forelse ($user->roles as $role)
                                  <span class="badge badge-info">{{ $role->name }}</span>
                                @empty
                                  <span class="badge badge-danger">No roles</span>
                                @endforelse
                              </td>
                            <td class="td-actions text-right">
                                @can('user_show')
                              <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">  <i class="fas fa-eye"></i></a>
                              @endcan
                                @can('user_edit')
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">   <i class="fas fa-pen"></i></a>
                              @endcan
                              @can('user_destroy')
                              <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                                  <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                              </form>
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
        $('#users').DataTable();
    });</script>
@stop





