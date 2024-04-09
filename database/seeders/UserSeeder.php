<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name' => 'super_admin',
                'email' => 'super_admin@mail.com',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'operator_wilayah',
                'email' => 'operator_wilayah@mail.com',
                'password' => Hash::make('password'),
                'role' => 'operator_wilayah',
            ],
            [
                'name' => 'mentor_penggerak',
                'email' => 'mentor_penggerak@mail.com',
                'password' => Hash::make('password'),
                'role' => 'mentor_penggerak',
            ],
            [
                'name' => 'mentor_kecamatan',
                'email' => 'mentor_kecamatan@mail.com',
                'password' => Hash::make('password'),
                'role' => 'mentor_kecamatan',
            ],
            [
                'name' => 'one_desa',
                'email' => 'one_desa@mail.com',
                'password' => Hash::make('password'),
                'role' => 'one_desa',
            ],
        ];

        User::insert($users);
    }
}
