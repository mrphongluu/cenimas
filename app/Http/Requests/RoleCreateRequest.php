<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permissions' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'display_name.required' => 'A display_name is required',
            'name.unique' => 'A name is unique',
            'description.required'  => 'A description is required',
            'permissions.required'  => 'A permissions is required',
        ];
    }
}
