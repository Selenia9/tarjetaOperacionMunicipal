<!doctype html>
<html lang="en">
  <head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   </head>
   <style>
    .titulo{
        text-align: center;
    }
    thead th{
   background-color: rgb(18, 18, 159);
   color:white;
   font-size: 6px;

    }

    tbody,td {
   font-size: 5px;
    }

    table{
        border-collapse: collapse;
        border: 1px solid;

    }
   </style>
  <body>
      <div>


          <div>
            <div>
                <img src="vendor/adminlte/dist/img/logoRepor.jpg" alt="" width="115px">
          </div>
              <div class="titulo">
                    <h5>REGISTRO TARJETA DE OPERACIÓN MUNICIPAL </h4>
              </div>

              <div>
                    <table >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>PROPIETARIO</th>
                                <th>DOMICILIO</th>
                                <th>TELEFONO</th>
                                <th>ORGANIZACIÓN </th>
                                <th>N°</th>
                                <th>GESTION</th>
                                <th>PLACA</th>
                                <th>COLOR</th>
                                <th>CHASIS</th>
                                <th>MOTOR</th>
                                <th>CAPASIDAD</th>
                                <th>ASIENTOS</th>
                                <th>MODELO</th>
                                <th>MARCA</th>
                                <th>TIPO VEHICULO</th>
                                <th>COMBUSTIBLE</th>
                                <th>RUTA AUTORIZADA</th>
                                <th>LICENCIA VALIDA DESDE</th>
                                <th>HASTA</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse($vehiculos as $vehiculo)
                                <tr>
                                 <td>{{ $vehiculo->id}}</td>
                                  <td>{{$vehiculo->propietario->nombre}}</td>
                                  <td>{{$vehiculo->propietario->domicilio}}</td>
                                  <td>{{$vehiculo->propietario->telefono}}</td>
                                  <td>{{$vehiculo->organizacion->nombre}}</td>
                                  <td>{{$vehiculo->n}}</td>
                                  <td>{{$vehiculo->anio}}</td>
                                  <td>{{$vehiculo->placa}}</td>
                                  <td>{{$vehiculo->color}}</td>
                                  <td>{{$vehiculo->chasis}}</td>
                                  <td>{{$vehiculo->motor}}</td>
                                  <td>{{$vehiculo->capacidad}}</td>
                                  <td>{{$vehiculo->asiento}}</td>
                                  <td>{{$vehiculo->modelo}}</td>
                                  <td>{{$vehiculo->marca}}</td>
                                  <td>{{$vehiculo->tipoVehiculo}}</td>
                                  <td>{{$vehiculo->combustible}}</td>
                                  <td>{{$vehiculo->rutaAutorizada}}</td>
                                  <td>{{$vehiculo->fechaInicio}}</td>
                                  <td>{{$vehiculo->fechaFin}}</td>



                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
  </body>
</html>
