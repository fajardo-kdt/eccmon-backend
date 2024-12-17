<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCylinderCoverRequest extends FormRequest
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
                'serial_number' => ['required'],
                'is_disposed' => ['required', Rule::in([1, 2])],
                'status' => ['required'],
                'location' => ['required'],
                'case' => ['required'],
                'cycle' => ['required']
            ];
        } else {
            return [
                'serial_number' => ['sometimes', 'required'],
                'is_disposed' => ['sometimes', 'required', Rule::in([1, 2])],
                'status' => ['sometimes', 'required'],
                'location' => ['sometimes','required'],
                'case' => ['sometimes', 'required'],
                'cycle' => ['sometimes', 'required']
            ];
        }
        
    }
}
