<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Employee']);

        $seeder = new PermissionSeeder();
        foreach($seeder->employeePermissions() as $permission){
            $role2->givePermissionTo($permission);
        }
        foreach($seeder->adminPermissions() as $permission){
            $role1->givePermissionTo($permission);
        }
    }
}
