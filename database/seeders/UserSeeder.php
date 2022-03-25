<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();
        foreach ($users as $user){
            if ($user->is_admin) {
                $user->assignRole('Admin');
            }else {
                $user->assignRole('Employee');
            };
        };

        User::Create([
            'name' => 'Mariana Giraldo',
            'email' => 'mgiraldo594@misena.edu.co',
            'email_verified_at' => now(),
            'password' => bcrypt('change_me'), // password
            'remember_token' => Str::random(10),
            'is_admin' => true,
            'hours_worked' => random_int(10, 120)
        ])->assignRole('Admin');
    }
}
