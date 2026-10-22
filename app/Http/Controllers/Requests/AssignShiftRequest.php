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
        'day' => 'required|string',
        'shift' => 'required|string',
        'employee_id' => 'required|integer|min:1',
    ]; 
    }
}