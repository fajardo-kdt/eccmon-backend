<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required'],
                'is_admin' => ['required', Rule::in([1,2])]
            ];
        } else {
            return [
                'user_id' => ['sometimes', 'required'],
                'first_name' => ['sometimes', 'required'],
                'last_name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required'],
                'is_admin' => ['sometimes', 'required', Rule::in([1,2])]
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'is_admin' => $this->isAdmin
        ]);
    }
}
