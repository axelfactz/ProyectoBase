<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function indexRoster()
    {
        return view('roster.index');
    }

    public function summaryRoster()
    {
        return view('roster.summary'); 
    }

    public function indexEmployees()
    {
        return view('employees.index');     
    }

    public function showEmployee(int $id)
    {
        return view('employees.show', ['id' => $id]);
    }

    public function assign(Request $request)
    {
        return view('roster.assign', [
            'empleadoId' => $request->input('employee_id')
        ]);
    }

    public function remove(Request $request)
    {
        return view('roster.summary', [
            'empleadoId' => $request->input('employee_id')
        ]);
    }
}