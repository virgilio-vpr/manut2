<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
        $idUser = $this->segment(5);

        //dd($idUser);

        $rule = [
            'name' => "required|min:3|max:20|unique:users,name,{$idUser},id",
            'email' => "required|email|unique:users,email,{$idUser},id",
            'role_id' => 'required',
            'section_name' => 'required',
        ];

        return $rule;
    }
}
