<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateDepartment extends FormRequest
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
        $managementId = $this->segment(5);
        $id = $this->segment(6);

        return [
            'name_department' => [
                'required',
                'min:3',
                'max:30',
                Rule::unique('departments', 'name_department')->where('management_id', $managementId)->ignore($id, 'id'),
            ],
            'cost_center' => 'required|numeric',
            'description'  => 'required|min:3|max:255',
        ];
    }
}
