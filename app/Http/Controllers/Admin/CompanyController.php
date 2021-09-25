<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCompany;
use App\Models\Company;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    private $repository, $directions;

    public function __construct(Company $company, Direction $directionCompany)
    {
        $this->repository = $company;
        $this->directions = $directionCompany;
    }

    public function index()
    {
        $companies = $this->repository->latest()->paginate();

        return view('admin.pages.companies.index', [
            'companies' => $companies,
        ]);
    }

    public function create()
    {
        return view('admin.pages.companies.create');
    }

    public function store(StoreUpdateCompany $request)
    {
        $data = $request->all();

        if ($request->hasFile('logo_company') && $request->file('logo_company')->isValid()) {
            $data['logo_company'] = $request->logo_company->store("company/logo_company", 'public');
        }

        $this->repository->create($data);

        return redirect()->route('companies.index');
    }

    public function show($url_company)
    {
        $company = $this->repository->where('url_company', $url_company)->first();

        if (!$company) {
            return redirect()->back();
        }

        return view('admin.pages.companies.show', [
            'company' => $company
        ]);
    }

    public function destroy($url_company)
    {
        $company = $this->repository
                            ->where('url_company', $url_company)
                            ->first();

        $directions = $this->directions
                                ->where('company_id', $company->id)
                                ->first();

        if (!$company) {
            return redirect()->back();
        }

        if ($directions) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem diretorias cadastradas nesta empresa, portando não é possível deletar!');
        }

        if (Storage::exists($company->logo_company)) {
            Storage::delete($company->logo_company);
        }

        $company->delete();

        return redirect()->route('companies.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $companies = $this->repository->search($request->filter);

        return view('admin.pages.companies.index', [
            'companies' => $companies,
            'filters'   => $filters,
        ]);
    }

    public function edit($url_company)
    {
        $company = $this->repository->where('url_company', $url_company)->first();

        if (!$company) {
            return redirect()->back();
        }

        return view('admin.pages.companies.edit', [
            'company' => $company
        ]);
    }

    public function update(StoreUpdateCompany $request, $url_company)
    {

        if (!$company = $this->repository->where('url_company', $url_company)->first()) {
            return redirect()->back();
        }

        $data = $request->all();;

        if ($request->hasFile('logo_company') && $request->logo_company->isValid()) {

            // dd(Storage::exists($company->logo_company));

            if (Storage::exists('public/'.$company->logo_company)) {
                Storage::delete('public/'.$company->logo_company);
            }

            $data['logo_company'] = $request->logo_company->store("company/logo_company", 'public');
        }

        $company->update($data);

        return redirect()->route('companies.index');
    }

}
