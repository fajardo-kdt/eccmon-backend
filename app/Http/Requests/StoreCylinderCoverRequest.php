<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCylinderCoverRequest extends FormRequest
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
        return [
            'serial_number' => ['required'],
            'is_disposed' => [Rule::in([1, 2])],
            'status' => ['required'],
            'location' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'serial_number' => $this->serialNumber,
            'is_disposed' => $this->isDisposed
        ]);
    }
}