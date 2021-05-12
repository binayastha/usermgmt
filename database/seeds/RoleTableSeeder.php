<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'administrator', 'guard_name' =>'web'],
            ['name' => 'registered', 'guard_name' =>'web'],
        ];
        Role::insert($roles);
        Role::whereName('administrator')->first()->givePermissionTo('users_manage');

    }
}
