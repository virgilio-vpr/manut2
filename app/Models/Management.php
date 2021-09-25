<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'managements';

    protected $fillable = ['name_management', 'url_management', 'cost_center', 'description'];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function search($filter = null, $directionId = null)
    {
        $results = $this->where('direction_id', $directionId)
                        ->where('name_management', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
