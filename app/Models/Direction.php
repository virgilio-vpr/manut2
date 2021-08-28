<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $table = 'directions';

    protected $fillable = ['logo_direction', 'name_direction', 'url_direction', 'cost_center', 'description'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function search($filter = null, $companyId = null)
    {
        $results = $this->where('company_id', $companyId)
                        ->where('name_direction', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
