<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengguna')->insert([
            [
                'nama_lengkap' => 'Super Admin',
                'username_email' => 'superadmin',
                'password' => Hash::make('password123'),
                'role' => 'superadmin',
                'bidang_id' => null,
                'status' => 'active',
            ],
            [
                'nama_lengkap' => 'Admin Banglola',
                'username_email' => 'adminbanglola',
                'password' => Hash::make('password123'),
                'role' => 'adminbidang',
                'bidang_id' => 1, // Pastikan bidang_id = 1 ada di tabel bidang
                'status' => 'active',
            ],
            [
                'nama_lengkap' => 'Admin Pamsis',
                'username_email' => 'adminpamsis',
                'password' => Hash::make('password123'),
                'role' => 'adminbidang',
                'bidang_id' => 2, // Pastikan bidang_id = 1 ada di tabel bidang
                'status' => 'active',
            ],
            [
                'nama_lengkap' => 'Admin Infratik',
                'username_email' => 'admininfratik',
                'password' => Hash::make('password123'),
                'role' => 'adminbidang',
                'bidang_id' => 3, // Pastikan bidang_id = 1 ada di tabel bidang
                'status' => 'active',
            ],
            [
                'nama_lengkap' => 'Admin TU',
                'username_email' => 'adminintu',
                'password' => Hash::make('password123'),
                'role' => 'adminbidang',
                'bidang_id' => 4, // Pastikan bidang_id = 1 ada di tabel bidang
                'status' => 'active',
            ],
            [
                'nama_lengkap' => 'Pimpinan',
                'username_email' => 'pimpinan',
                'password' => Hash::make('password123'),
                'role' => 'pimpinan',
                'bidang_id' => null,
                'status' => 'active',
            ],
        ]);
    }
}