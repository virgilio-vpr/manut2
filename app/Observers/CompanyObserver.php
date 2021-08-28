<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Str;

class CompanyObserver
{
    /**
     * Handle the Company "creating" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function creating(Company $company)
    {
        $company->url_company = Str::kebab($company->name_company);
    }

    /**
     * Handle the Company "updating" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function updating(Company $company)
    {
        $company->url_company = Str::kebab($company->name_company);
    }
}
