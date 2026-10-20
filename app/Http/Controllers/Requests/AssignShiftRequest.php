<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignShiftRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'day' => ['required', 'string', 'in:lunes,martes,miercoles,jueves,viernes,sabado,domingo'],
            'shift' => ['required', 'string', 'in:manana,tarde,noche'],
            'employee_id' => ['required', 'integer', 'min:1'],
        ];
    }
}