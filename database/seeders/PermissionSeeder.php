<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            'users.index',
            'users.show',
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
            Permission::create(['name' => $permission]);
        }



    }
}
