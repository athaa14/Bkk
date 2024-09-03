<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'username' => 'gultom@mail.com',
            'password' => Hash::make('gultom123'),
            'role' => 'Admin BKK',
        ]);
        Users::create([
            'username' => 'forit@mail.com',
            'password' => Hash::make('forit123'),
            'role' => 'Perusahaan',
        ]);
        Users::create([
            'username' => '3271045678901234',
            'password' => Hash::make('rasyad123'),
            'role' => 'Alumni',
        ]);
    }
}
