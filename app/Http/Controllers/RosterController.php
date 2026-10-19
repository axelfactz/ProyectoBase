<?php

namespace App\Http\Controllers;

use App\Contracts\RosterStore;
use App\Exceptions\EmployeeNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\AssignShiftRequest;

class RosterController extends Controller
{
    protected RosterStore $rosterStore;

    // 1. El constructor recibe e inyecta el almacén de datos (F06)
    public function __construct(RosterStore $rosterStore)
    {
        $this->rosterStore = $rosterStore;
    }

    // 2. Muestra la tabla del cuadrante (F03)
    public function indexRoster()
    {
        $roster = $this->rosterStore->get();
        return view('roster.index', compact('roster'));
    }

    // 3. Resumen del cuadrante (F05)
    public function summaryRoster()
    {
        $roster = $this->rosterStore->get();
        return view('roster.summary', compact('roster'));
    }

    // 4. Listado de empleados con filtros (F01)
    public function indexEmployees(Request $request)
    {
        $role = $request->input('role');
        $sort = $request->input('sort');

        return view('employees.index', compact('role', 'sort'));
    }

    // 5. Ficha del empleado (F02)
    public function showEmployee(int $id)
    {
        return view('employees.show', ['id' => $id]);
    }

    // 6. Procesa la asignación del turno y redirige (F03)
    // 6. Procesar la asignación del turno con validación (F03/F04)
public function assign(AssignShiftRequest $request)
{
    $validated = $request->validated();

    $this->rosterStore->assign(
        $validated['day'],
        $validated['shift'],
        (int) $validated['employee_id']
    );

    return redirect()->route('roster.index')
        ->with('status', 'Empleado asignado correctamente.');
}

    // 7. Procesa la eliminación del turno y redirige (F03)
    public function remove(Request $request)
    {
        $day = $request->input('day');
        $shift = $request->input('shift');

        $this->rosterStore->remove($day, $shift);

        return redirect()->route('roster.index')
            ->with('status', 'Asignación eliminada correctamente.');
    }
}