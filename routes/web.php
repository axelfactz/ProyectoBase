<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RosterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('roster.index');
});

// Rutas de Empleados
Route::get('/empleados', [RosterController::class, 'indexEmployees'])->name('employees.index');
Route::get('/empleados/{id}', [RosterController::class, 'showEmployee'])->name('employees.show');

// Rutas del Cuadrante (Roster)
Route::get('/cuadrante', [RosterController::class, 'indexRoster'])->name('roster.index');
Route::get('/cuadrante/resumen', [RosterController::class, 'summaryRoster'])->name('roster.summary');
Route::post('/cuadrante/asignar', [RosterController::class, 'assign'])->name('roster.assign');
Route::post('/cuadrante/eliminar', [RosterController::class, 'remove'])->name('roster.remove');

// Ruta para deshacer/reiniciar el cuadrante (soluciona el error de la vista)
Route::post('/cuadrante/undo', [RosterController::class, 'undo'])->name('roster.undo');
