<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Apotek;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ApotekSeeder extends Seeder
{
    public function run(): void
    {
        // Create the Pharmacy
        $pharmacy = Apotek::firstOrCreate(
            ['nomor_lisensi' => 'S0B-2025-TEST'],
            [
                'nama' => 'Global Pharma Care',
                'terverifikasi' => true,
            ]
        );

        // Create the Admin for this Pharmacy
        User::firstOrCreate(
            ['email' => 'admin@globalpharmacare.com'],
            [
                'name' => 'Sarah Jenkins',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'id_apotek' => $pharmacy->id,
            ]
        );
    }
}