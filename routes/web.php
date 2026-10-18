<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RosterController;

Route::redirect('/', '/cuadrante');

Route::get('/empleados', [RosterController::class, 'indexEmployees'])
    ->name('employees.index');

Route::get('/empleados/{id}', [RosterController::class, 'showEmployee'])
    ->whereNumber('id')
    ->name('employees.show');

Route::get('/cuadrante', [RosterController::class, 'indexRoster'])
    ->name('roster.index');

Route::get('/cuadrante/resumen', [RosterController::class, 'summaryRoster'])
    ->name('roster.summary');

Route::post('/cuadrante/asignar', [RosterController::class, 'assign'])
    ->name('roster.assign');

Route::post('/cuadrante/quitar', [RosterController::class, 'remove'])
    ->name('roster.remove');
