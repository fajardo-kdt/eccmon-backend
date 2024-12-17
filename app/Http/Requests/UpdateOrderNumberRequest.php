<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderNumberRequest extends FormRequest
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
                'name' => ['required', 'regex:/^31[07][39M]\w{7}$/'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required', 'regex:/^31[07][39M]\w{7}$/'],
            ];
        }
    }
}
