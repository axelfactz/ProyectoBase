<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function indexRoster()
    {
        return "vista principal del cuadrante ( En construcción)";
    }

    public function summaryRoster()
    {
        return "resumen del Cuadrante ( En construcción)";
    }

    public function indexEmployees()
    {
        return "vista principal de empleados ( En construcción)";
    }

    public function showEmployee(int $id)
    {
        return "Detalle del empleado con ID: " . $id . " ( En construcción)";
    }

    public function assign(Request $request)
    {
        return "Procesando asignación de turno ( En construcción)";
    }

    public function remove(Request $request)
    {
        return "Procesando eliminación de turno ( En construcción)";
    }
}