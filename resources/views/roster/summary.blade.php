
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Asignación</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">  
</head>
<body>
    <main>
        <h1><b>Asignación de turnos</b></h1>

        @if(isset($empleadoId))
            <p>Empleado asignado: {{ $empleadoId }}</p>
        @endif

        {{-- Estado del cuadrante acumulado en sesión (F05) --}}
        @if(empty($roster))
            <p>Estado: en construcción o sin datos asignados.</p>
        @else
            <pre>{{ print_r($roster, true) }}</pre>
        @endif

        <br>
        <a href="{{ route('roster.index') }}">← Volver al cuadrante</a>
    </main>
</body>
</html>

