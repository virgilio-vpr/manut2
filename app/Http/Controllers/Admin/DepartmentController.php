<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDepartment;
use App\Models\Company;
use App\Models\Department;
use App\Models\Direction;
use App\Models\Management;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $repository, $direction, $company;

    public function __construct(Department $departmentManagement ,Management $management, Direction $direction, Company $company)
    {
        $this->company = $company;
        $this->direction = $direction;
        $this->management = $management;
        $this->repository = $departmentManagement;
    }

    public function index($urlManagement, $urlDepartment = null)
    {
        if (!$management = $this->management->where('url_management', $urlManagement)->first()) {
            return redirect()->back();
        }

        if (!$direction = $management->direction()->first()) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        if ($urlDepartment !== null) {
            $departments = $management->departments()->where('url_department', $urlDepartment)->paginate();
        } else {
            $departments = $management->departments()->paginate();
        }

        return view('admin.pages.departments.index', [
            'company'      => $company,
            'direction'    => $direction,
            'management'   => $management,
            'departments'  => $departments,
        ]);
    }

    public function create($urlManagement)
    {
        if (!$management= $this->management->where('url_management', $urlManagement)->first()) {
            return redirect()->back();
        }

        if (!$direction = $management->direction()->first()) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        return view('admin.pages.departments.create', [
            'company'    => $company,
            'direction'  => $direction,
            'management' => $management,
        ]);
    }

    public function store(StoreUpdateDepartment $request, $urlManagement)
    {
        if (!$management = $this->management->where('url_management', $urlManagement)->first()) {
            return redirect()->back();
        }

        $management->departments()->create($request->all());

        return redirect()->route('departments.management.index', $management->url_management);
    }

    public function show($urlManagement, $idDepartment)
    {
        $management = $this->management->where('url_management', $urlManagement)->first();
        $department = $this->repository->find($idDepartment);

        if (!$management || !$department) {
            return redirect()->back();
        }

        return view('admin.pages.departments.show', [
            'management' => $management,
            'department' => $department,
        ]);
    }

    public function destroy($urlManagement, $idDepartment)
    {
        $management = $this->management->where('url_management', $urlManagement)->first();
        $department = $this->repository->find($idDepartment);

        if (!$management || !$department) {
            return redirect()->back();
        }

        $department->delete();

        return redirect()
                    ->route('departments.management.index', $management->url_management)
                    ->with('message', 'Registro deletado com sucesso!');
    }

    public function search(Request $request, $urlManagement)
    {
        if (!$management = $this->management->where('url_management', $urlManagement)->first()) {
            return redirect()->back();
        }

        if (!$direction = $management->direction()->first()) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $departments = $this->repository->search($request->filter, $management->id);

        return view('admin.pages.departments.index', [
            'company'     => $company,
            'direction'   => $direction,
            'management'  => $management,
            'departments' => $departments,
            'filters'     => $filters,
        ]);
    }

    public function edit($urlManagement, $idDepartment)
    {
        $management = $this->management->where('url_management', $urlManagement)->first();
        $department = $this->repository->find($idDepartment);

        if (!$management || !$department) {
            return redirect()->back();
        }

        if (!$direction = $management->direction()->first()) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        return view('admin.pages.departments.edit', [
            'company'    => $company,
            'direction'  => $direction,
            'management' => $management,
            'department' => $department,
        ]);
    }

    public function update(StoreUpdateDepartment $request, $urlManagement, $managementId, $idDepartment)
    {
        $management = $this->management->where('url_management', $urlManagement)->first();
        $department = $this->repository->find($idDepartment);

        if (!$management || !$department) {
            return redirect()->back();
        }

        $department->update($request->all());

        return redirect()->route('departments.management.index', $management->url_management);
    }

}
