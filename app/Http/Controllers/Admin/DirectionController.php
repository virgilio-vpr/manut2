<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDirection;
use App\Models\Company;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    protected $repository, $company;

    public function __construct(Direction $directionCompany, Company $company)
    {
        $this->repository = $directionCompany;
        $this->company = $company;
    }

    public function index($urlCompany)
    {
        if (!$company = $this->company->where('url_company', $urlCompany)->first()) {
            return redirect()->back();
        }

        $directions = $company->directions()->paginate();


        return view('admin.pages.directions.index', [
            'company'    => $company,
            'directions' => $directions,
        ]);
    }

    public function create($urlCompany)
    {
        if (!$company = $this->company->where('url_company', $urlCompany)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.directions.create', [
            'company' => $company,
        ]);
    }

    public function store(StoreUpdateDirection $request, $urlCompany)
    {
        if (!$company = $this->company->where('url_company', $urlCompany)->first()) {
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['company_id'] = $company->id;
        // $this->repository->create($data);

        $company->directions()->create($request->all());

        return redirect()->route('directions.company.index', $company->url_company);
    }

    public function show($urlCompany, $idDirection)
    {
        $company = $this->company->where('url_company', $urlCompany)->first();
        $direction = $this->repository->find($idDirection);

        if (!$company || !$direction) {
            return redirect()->back();
        }

        return view('admin.pages.directions.show', [
            'company' => $company,
            'direction' => $direction,
        ]);
    }

    public function destroy($urlCompany, $idDirection)
    {
        $company = $this->company->where('url_company', $urlCompany)->first();
        $direction = $this->repository->find($idDirection);

        if (!$company || !$direction) {
            return redirect()->back();
        }

        $direction->delete();

        return redirect()
                    ->route('directions.company.index', $company->url_company)
                    ->with('message', 'Registro deletado com sucesso!');
    }

    public function search(Request $request, $urlCompany)
    {
        if (!$company = $this->company->where('url_company', $urlCompany)->first()) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $directions = $this->repository->search($request->filter, $company->id);

        return view('admin.pages.directions.index', [
            'company'    => $company,
            'directions' => $directions,
            'filters'   => $filters,
        ]);
    }

    public function edit($urlCompany, $idDirection)
    {
        $company = $this->company->where('url_company', $urlCompany)->first();
        $direction = $this->repository->find($idDirection);

        if (!$company || !$direction) {
            return redirect()->back();
        }

        return view('admin.pages.directions.edit', [
            'company' => $company,
            'direction' => $direction,
        ]);
    }

    public function update(StoreUpdateDirection $request, $urlCompany, $companyId, $idDirection)
    {

        $company = $this->company->where('url_company', $urlCompany)->first();
        $direction = $this->repository->find($idDirection);

        if (!$company || !$direction) {
            return redirect()->back();
        }

        $direction->update($request->all());

        return redirect()->route('directions.company.index', $company->url_company);
    }

    public function choose(){

        $companies = $this->company->all();
        $directions = $this->repository->all();

        return view('admin.pages.directions.choose', [
            'companies' => $companies,
            'directions' => $directions,
        ]);
    }
}
