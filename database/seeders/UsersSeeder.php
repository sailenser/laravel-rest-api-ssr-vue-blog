<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
                'name' => 'max',
                'email' => 'max@gmail.com',
                'roles' => 'admin',
                'password' => '123456789',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ]
        );

        User::create([
                'name' => 'user',
                'email' => 'max1@gmail.com',
                'roles' => 'user',
                'password' => '123456789',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ]
        );
    }
}
