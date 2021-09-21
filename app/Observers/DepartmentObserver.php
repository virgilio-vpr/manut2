<?php

namespace App\Observers;

use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentObserver
{
      /**
     * Handle the Company "creating" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function creating(Department $department)
    {
        $department->url_department = Str::kebab($department->name_department);
    }

    /**
     * Handle the Company "updating" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function updating(Department $department)
    {
        $department->url_department = Str::kebab($department->name_department);
    }
}
