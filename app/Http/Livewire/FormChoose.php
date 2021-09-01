<?php

namespace App\Http\Livewire;

use App\Models\Direction;
use Livewire\Component;

class FormChoose extends Component
{
    public $companyId;
    public $companies;
    public $directions = [];
    public $directionId;

    public function mount($companies)
    {
        $this->companies = $companies;
    }

    public function render()
    {

        //dd($this->companyId);

        if (!empty($this->companyId)) {
            $this->directions= Direction::where('company_id', $this->companyId)->get();
        }

        return view('livewire.form-choose');
    }
}
