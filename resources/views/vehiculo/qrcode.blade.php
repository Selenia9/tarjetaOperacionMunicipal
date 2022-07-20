<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR | laravel</title>
</head>
<body>
 <div class="container-fluid">
    @foreach($vehiculos as $vehiculo)
    <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">PLACA N°:</label>
    <div class="col-sm-2">
<p> {{ $vehiculo->placa }}</p>
    </div>
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate(Request::url()); !!}
        <p>Scan me to return to the original page.</p>
    </div>
    @endforeach
 </div>
</body>
</html>

<div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url()); !!}
    <p>Scan me to return to the original page.</p>
</div>
