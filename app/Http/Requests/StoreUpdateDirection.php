<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateDirection extends FormRequest
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
        $companyId = $this->segment(5);
        $id = $this->segment(6);

        return [
            'name_direction' => [
                'required',
                'min:3',
                'max:30',
                Rule::unique('directions', 'name_direction')->where('company_id', $companyId)->ignore($id, 'id'),
            ],
            'cost_center' => 'required|numeric',
            'description'  => 'required|min:3|max:255',
        ];
    }
}
