<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Mahasiswa::create([
            "nama"  => "Sri suhartini",
            "alamat"  => "Jl sumur tengah Rt 004/ Rw 006 Ds sukasono Kec.Sukawening Kab.Garut Jawa Barat",
        ]);

        Mahasiswa::create([
            "nama"  => "Sandhika Galih",
            "alamat"  => "Web Programming Unpas",
        ]);
    }
}
