<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRole extends FormRequest
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
        $roleId = $this->segment(3);

        if (!$roleId) {
            $rule = [
                'name' => "required|min:3|max:20|unique:roles,name,{$roleId},id",
                'description'  => 'required|min:3|max:255',
            ];

        } else {
            $rule = [
                'name' => "required|min:3|max:20|unique:roles,name,{$roleId},id",
                'description'  => 'required|min:3|max:255',
            ];
        }

        return $rule;
    }
}
