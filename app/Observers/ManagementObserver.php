<?php

namespace App\Observers;

use App\Models\Management;
use Illuminate\Support\Str;

class ManagementObserver
{
    /**
     * Handle the Company "creating" event.
     *
     * @param  \App\Models\Management  $management
     * @return void
     */
    public function creating(Management $management)
    {
        $management->url_management = Str::kebab($management->name_management);
    }

    /**
     * Handle the Company "updating" event.
     *
     * @param  \App\Models\Management  $management
     * @return void
     */
    public function updating(Management $management)
    {
        $management->url_management = Str::kebab($management->name_management);
    }
}
