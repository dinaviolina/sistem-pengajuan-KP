<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        DB::table('dosen_walis')->insert([
            [
            'id' => '200411100083',
            'password' => Hash::make('123456'),
            ]
        ]);

        DB::table('mahasiswas')->insert([
            [
            'id' => '210411100050',
            'dosen_wali' => '200411100083',
            'nama_mhs' => 'Indah Pratiwi',
            'tempat_lahir' => 'Bangkalan',
            'tanggal_lahir' => '2002-02-02',
            'jenis_kelamin' => 'perempuan',
            'angkatan' => '2021',
            'jumlah_sks' => '88',
            'image' => '',
            'password' => Hash::make('123456'),
            ]
        ]);

        DB::table('kaprodis')->insert([
            [
            'id' => '210411100024',
            'password' => Hash::make('123456'),
            ]
        ]);

        DB::table('fakultas')->insert([
            [
            'id' => '210411100004',
            'password' => Hash::make('123456'),
            ]
        ]);

        DB::table('admins')->insert([
            [
            'id' => '210411100009',
            'username' => 'Cherlu Sintia M',
            'password' => Hash::make('123456'),
            ]
        ]);

    }
}
