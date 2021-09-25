<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSelectManagement;
use App\Http\Requests\StoreUpdateManagement;
use App\Models\Company;
use App\Models\Direction;
use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    protected $repository, $direction, $company;

    public function __construct(Management $managementDirection, Direction $direction, Company $company)
    {
        $this->company = $company;
        $this->direction = $direction;
        $this->repository = $managementDirection;
    }

    public function index($urlDirection, $urlmanagement = null)
    {
        if (!$direction = $this->direction->where('url_direction', $urlDirection)->first()) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        if ($urlmanagement !== null) {
            $managements = $direction->managements()->where('url_management', $urlmanagement)->paginate();
        } else {
            $managements = $direction->managements()->paginate();
        }

        return view('admin.pages.managements.index', [
            'company'      => $company,
            'direction'    => $direction,
            'managements'  => $managements,
        ]);
    }

    public function create($urlDirection)
    {
        if (!$direction = $this->direction->where('url_direction', $urlDirection)->first()) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        return view('admin.pages.managements.create', [
            'company'   => $company,
            'direction' => $direction,
        ]);
    }

    public function store(StoreUpdateManagement $request, $urlDirection)
    {
        if (!$direction = $this->direction->where('url_direction', $urlDirection)->first()) {
            return redirect()->back();
        }

        $direction->managements()->create($request->all());

        return redirect()->route('managements.direction.index', $direction->url_direction);
    }

    public function show($urlDirection, $idManagement)
    {
        $direction = $this->direction->where('url_direction', $urlDirection)->first();
        $management = $this->repository->find($idManagement);

        if (!$direction || !$management) {
            return redirect()->back();
        }

        return view('admin.pages.managements.show', [
            'direction' => $direction,
            'management' => $management,
        ]);
    }

    public function destroy($urlDirection, $idManagement)
    {
        $direction = $this->direction->where('url_direction', $urlDirection)->first();
        $management = $this->repository->find($idManagement);

        if (!$direction || !$management) {
            return redirect()->back();
        }

        $management->delete();

        return redirect()
                    ->route('managements.direction.index', $direction->url_direction)
                    ->with('message', 'Registro deletado com sucesso!');
    }

    public function search(Request $request, $urlDirection)
    {
        if (!$direction = $this->direction->where('url_direction', $urlDirection)->first()) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $managements = $this->repository->search($request->filter, $direction->id);

        return view('admin.pages.managements.index', [
            'company'   => $company,
            'direction'    => $direction,
            'managements' => $managements,
            'filters'   => $filters,
        ]);
    }

    public function edit($urlDirection, $idManagement)
    {
        $direction = $this->direction->where('url_direction', $urlDirection)->first();
        $management = $this->repository->find($idManagement);

        if (!$direction || !$management) {
            return redirect()->back();
        }

        if (!$company = $direction->company()->first()) {
            return redirect()->back();
        }

        return view('admin.pages.managements.edit', [
            'company'   => $company,
            'direction' => $direction,
            'management' => $management,
        ]);
    }

    public function update(StoreUpdateManagement $request, $urlDirection, $directionId, $idManagement)
    {
        $direction = $this->direction->where('url_direction', $urlDirection)->first();
        $management = $this->repository->find($idManagement);

        if (!$direction || !$management) {
            return redirect()->back();
        }

        $management->update($request->all());

        return redirect()->route('managements.direction.index', $direction->url_direction);
    }
}
