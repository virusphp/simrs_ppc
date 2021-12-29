<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $id = $this->role ?? '';
        return
            [
                'name' => 'required|unique:roles,name,' . $id,
                'permissions' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Role harus di isi!',
            'permissions.required' => 'Permission harus di isi!',
            'nama.unique' => 'Nama Role sudah ada!',
            'permissions' => 'Permission harus di isi!'
        ];
    }
}
