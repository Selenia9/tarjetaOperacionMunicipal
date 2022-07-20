
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<hr>
<h5>¿Realmente desea eliminar la categoria?</h5>
<form method='POST', action="{{ route('propietario.destroy', $propietario->id)}}">
@method('DELETE')
@csrf
    <div class="form-group">
       <p>Nombre:</p>
       <input type="text" class="form-control" name="nombre" value="{{ $propietario->nombre }}" disabled="true">
    </div>
    <div class="form-group">
        <p>Domicilio:</p>
        <input type="text" class="form-control" name="domicilio" value="{{ $propietario->domicilio }}" disabled="true">
     </div>
     <div class="form-group">
        <p>Telefono:</p>
        <input type="text" class="form-control" name="telefono" value="{{ $propietario->telefono }}" disabled="true">
     </div>

     <button type="submit" class="btn btn-info"><i class="fas fa-trash-alt"></i> Eliminar</button>
     <a href="{{ route('cancelar_propietario') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>


    </form>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
