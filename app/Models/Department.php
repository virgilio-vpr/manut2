<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = ['name_department', 'url_department', 'cost_center', 'description'];


    public function management()
    {
        return $this->belongsTo(Management::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function search($filter = null, $managementId = null)
    {
        $results = $this->where('management_id', $managementId)
                        ->where('name_department', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
