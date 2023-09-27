<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

//helpers
use illuminate\support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:70',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'project_status' => 'required',
            'project_link' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id'
        ];
    }
}
