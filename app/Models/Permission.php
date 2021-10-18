<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = ['name', 'description', 'controller', 'method'];

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function search($filter = null, $roleId = null)
    {
        $results = $this->where('role_id', $roleId)
                        ->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
