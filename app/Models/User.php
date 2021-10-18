<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function search($filter = null, $roleId = null)
    {
        $results = $this->where('role_id', $roleId)
                        ->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('email', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'company_id',
        'name',
        'email',
        'password',
        'section_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
