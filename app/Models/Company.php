<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name_company', 'url_company', 'logo_company', 'description'];

    public function directions()
    {
        return $this->hasMany(Direction::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name_company', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
