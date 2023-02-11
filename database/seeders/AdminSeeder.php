<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'system administrator',
            'email' => 'super@admin.com',
            'password' => bcrypt('password'),
            'type' => User::TYPE_ADMIN,
        ]);

        error_log('email: super@admin.com - password: password');
    }
}