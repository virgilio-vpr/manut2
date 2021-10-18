<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::first();

        $role->users()->create([
            'company_id' => 1,
            'role_id' => 1,
            'name' => 'Virgilio Rosa',
            'email' => 'virgilio.vpr@gmail.com',
            'password' => bcrypt('123456'),
            'section_name' => 'Manutenção',
        ]);
    }
}
