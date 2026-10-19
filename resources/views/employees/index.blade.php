<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Vista de lista de empleados</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <main>
        <h1>Vista de lista de empleados</h1>

        {{-- Formulario para Filtros por Rol y Ordenación (F01) --}}
        <form method="GET" action="{{ route('employees.index') }}">
            <label for="role">Filtrar por Rol:</label>
            <select name="role" id="role">
                <option value="">Todos los roles</option>
                <option value="cocina" {{ $role === 'cocina' ? 'selected' : '' }}>Cocina</option>
                <option value="sala" {{ $role === 'sala' ? 'selected' : '' }}>Sala</option>
                <option value="barra" {{ $role === 'barra' ? 'selected' : '' }}>Barra</option>
            </select>

            <label for="sort">Ordenar por:</label>
            <select name="sort" id="sort">
                <option value="nombre" {{ $sort === 'nombre' ? 'selected' : '' }}>Nombre</option>
                <option value="horas" {{ $sort === 'horas' ? 'selected' : '' }}>Horas contratadas</option>
            </select>

            <button type="submit">Aplicar filtros</button>
        </form>

        <hr>

        {{-- Información del filtro activo --}}
        <p>Rol seleccionado: <strong>{{ $role ? ucfirst($role) : 'Todos' }}</strong></p>
        <p>Orden aplicado: <strong>{{ $sort ? ucfirst($sort) : 'Por defecto' }}</strong></p>

        <br>
        <a href="{{ route('roster.index') }}">Volver al Cuadrante</a>
    </main>
</body>
</html>