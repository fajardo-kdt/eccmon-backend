<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateScanHistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'user_id' => ['required'],
                'serial_number' => ['required'],
                'status' => ['required', Rule::in([1, 2])],
            ];
        } else {
            return [
                'user_id' => ['sometimes', 'required'],
                'serial_number' => ['sometimes', 'required'],
                'status' => ['sometimes', 'required', Rule::in([1, 2])],
            ];
        }
        
    }
}
