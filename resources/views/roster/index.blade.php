<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - CUADRANTE</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">  
</head>
<body>
    <main>
        <h1><b>Vista principal del cuadrante</b></h1>

        {{-- Mensaje de éxito al asignar o eliminar --}}
        @if (session('status'))
            <p style="color: green;"><strong>{{ session('status') }}</strong></p>
        @endif

        {{-- Errores de validación (F04) --}}
        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{-- Formulario para asignar turno (F03/F04) --}}
        <h2><b>Asignar turno</b></h2>
        <form method="POST" action="{{ route('roster.assign') }}">
            @csrf
            
            <label for="day">Día:</label>
            <select name="day" id="day" required>
                <option value="lunes">Lunes</option>
                <option value="martes">Martes</option>
                <option value="miercoles">Miércoles</option>
                <option value="jueves">Jueves</option>
                <option value="viernes">Viernes</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
            </select>

            <label for="shift">Turno:</label>
            <select name="shift" id="shift" required>
                <option value="manana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
            </select>

            <label for="employee_id">ID Empleado:</label>
            <input type="number" name="employee_id" id="employee_id" min="1" required>

            <button type="submit">Asignar</button>
        </form>

        <form action="{{ route('roster.undo') }}" method="POST" style="display:inline; margin-top: 10px;">
            @csrf
            <button type="submit" class="btn btn-warning">Deshacer última acción</button>
        </form>

        <hr>

        {{-- Estado actual del cuadrante guardado en sesión --}}
        <h2><b>Estado del cuadrante</b></h2>
        @if(empty($roster))
            <p>No hay asignaciones registradas todavía.</p>
        @else
            <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; margin-top: 15px; width: 100%; max-width: 600px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>Día</th>
                        <th>Turno</th>
                        <th>ID Empleado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roster as $day => $shifts)
                        @foreach($shifts as $shift => $employeeId)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($day) }}</td>
                                <td style="text-align: center;">{{ ucfirst($shift) }}</td>
                                <td style="text-align: center;"><strong>{{ $employeeId }}</strong></td>
                                <td style="text-align: center;">
                                    <form action="{{ route('roster.remove') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="day" value="{{ $day }}">
                                        <input type="hidden" name="shift" value="{{ $shift }}">
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endif

        <br><br>
        <a href="{{ route('roster.summary') }}">Ver resumen del cuadrante</a> | 
        <a href="{{ route('employees.index') }}">Ir a lista de empleados</a>
    </main>
</body>
</html>