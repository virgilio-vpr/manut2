<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Department;
use App\Models\Direction;
use App\Models\Management;
use Livewire\Component;

class EquipmentChoose extends Component
{
    public $typeMenu;
    public $companyId;
    public $directionId;
    public $managementId;
    public $departmentId;
    public $companies;
    public $directions = [];
    public $managements = [];
    public $departments = [];
    public $equipments = [];

    public function mount($type_menu)
    {
        $this->typeMenu = $type_menu;
        $this->companies = Company::all();
    }

    protected function rules()
    {
        if ($this->typeMenu ==  'equipment') {
            return [
                'companyId' => 'required',
                'directionId' => 'required',
                'managementId' => 'required',
                'departmentId' => 'required',
            ];
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function equipmentSelect()
    {
        if ($this->typeMenu ==  'direction') {

            $validatedData = $this->validate();

            if (!$this->equipments = Direction::where('id', $validatedData['directionId'])->first()) {
                return redirect()->back();
            }

            return redirect()->route('directions.company.index', [$company->url_company, $direction->url_direction]);
        }




        if ($this->typeMenu ==  'department') {

            $validatedData = $this->validate();

            if (!$management = Management::where('id', $validatedData['managementId'])->first()) {
                return redirect()->back();
            }

            if (!$department = Department::where('id', $validatedData['departmentId'])->first()) {
                return redirect()->back();
            }

            return redirect()->route('departments.management.index', [$management->url_management, $department->url_department]);
        }

    }

    public function render()
    {
        if ($this->typeMenu == 'direction') {
            $this->directions = Direction::where('company_id', $this->companyId)->get();
        }

        if ($this->typeMenu == 'management') {
            if (!empty($this->companyId) && empty($this->directionId)) {
                $this->directions = Direction::where('company_id', $this->companyId)->get();
            }

            if (!empty($this->directionId && empty($this->managementId))) {
                $this->managements = Management::where('direction_id', $this->directionId)->get();
            }
        }

        if ($this->typeMenu == 'department') {
            if (!empty($this->companyId) && empty($this->directionId)) {
                $this->directions = Direction::where('company_id', $this->companyId)->get();
            }

            if (!empty($this->directionId && empty($this->managementId))) {
                $this->managements = Management::where('direction_id', $this->directionId)->get();
            }

            $this->departments = Department::where('management_id', $this->managementId)->get();
        }

        return view('livewire.form-choose');
    }
}
