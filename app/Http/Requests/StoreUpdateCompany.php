<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompany extends FormRequest
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
        $url_company = $this->segment(3);

        if (!$url_company) {
            $rule = [
                'name_company' => "required|min:3|max:30|unique:companies,name_company,{$url_company},url_company",
                'description'  => 'required|min:3|max:255',
                'logo_company' => 'required|image',
            ];

        } else {
            $rule = [
                'name_company' => "required|min:3|max:30|unique:companies,name_company,{$url_company},url_company",
                'description'  => 'required|min:3|max:255',
                'logo_company' => ['nullable', 'image'],
            ];
        }

        return $rule;
    }
}
