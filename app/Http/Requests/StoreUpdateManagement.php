<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateManagement extends FormRequest
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
        $directionId = $this->segment(5);
        $id = $this->segment(6);

        return [
            'name_management' => [
                'required',
                'min:3',
                'max:30',
                Rule::unique('managements', 'name_management')->where('direction_id', $directionId)->ignore($id, 'id'),
            ],
            'cost_center' => 'required|numeric',
            'description'  => 'required|min:3|max:255',
        ];
    }
}
