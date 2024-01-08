<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PieceFilterRequest extends FormRequest
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
            'name' => ['required', 'min:8'],
            /* 'slug' => ['required', 'min:8', 'regex:/^[0-9a-z\-]+$/', Rule::unique('pieces')->ignore($this->route()->parameter('piece'))], */
            'quantity' => ['nullable'],
            'material' => ['nullable'],
            'width' => ['nullable'],
            'height' => ['nullable'],
            'thickness' => ['nullable'],
            'description' => ['nullable'],
            'project_id' => ['required', 'exists:projects,id']
        ];
    }
}
