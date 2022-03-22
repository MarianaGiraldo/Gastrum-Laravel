<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{


    public static function adminPermissions(): array
    {
        return [
            'index',
            'users.index',
            'users.show',
            'users.edit',
            'users.drop',
            'payroll.index',
            'payroll.show',
            'payroll.edit',
            'payroll.drop'
        ];
    }
    public static function employeePermissions(): array
    {
        return [
            'index',
            'usuarios.index',
            'usuarios.show',
            'payroll.show'
        ];
    }

    /**
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->adminPermissions() as $permission) {
            if(in_array($permission, $this->employeePermissions())){
                Permission::create(['name' => $permission])->syncRoles(['Admin', 'Employee']);
            }
            else{
                Permission::create(['name' => $permission])->assignRole('Admin');
            }

        }

    }
}
