<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                // 'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'staff',
                'email' => 'staff@staff.com',
                // 'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
