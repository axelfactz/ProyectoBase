<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Detalle Empleado</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">  
</head>
<body>
    <main>
        <h1><b>Detalle del empleado con ID: {{ $id }}</b></h1>
        <p>Información detallada del empleado seleccionando el identificador <strong>{{ $id }}</strong>.</p>

        <br>
        <a href="{{ route('employees.index') }}">← Volver a la lista de empleados</a>
    </main>
</body>
</html>