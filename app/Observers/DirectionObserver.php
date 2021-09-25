<?php

namespace App\Observers;

use App\Models\Direction;
use Illuminate\Support\Str;

class DirectionObserver
{
    /**
     * Handle the Company "creating" event.
     *
     * @param  \App\Models\Direction  $direction
     * @return void
     */
    public function creating(Direction $direction)
    {
        $direction->url_direction = Str::kebab($direction->name_direction);
    }

    /**
     * Handle the Company "updating" event.
     *
     * @param  \App\Models\Direction  $direction
     * @return void
     */
    public function updating(Direction $direction)
    {
        $direction->url_direction = Str::kebab($direction->name_direction);
    }
}
