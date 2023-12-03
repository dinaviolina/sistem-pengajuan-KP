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
        DB::table('admins')->insert([
            [
            'id' => '1001',
            'username_admin' => 'Cherly S M',
            'password' => Hash::make('123456'),
            ]
        ]);

        DB::table('fakultas')->insert([
            [
            'id' => '1',
            'password' => Hash::make('123456'),
            'nama_fakultas' => 'Teknik',
            'NIPdekan' => '198301182008121001',
            'namaDekan' => 'Faikul Umam',
            ]
        ]);

        DB::table('prodis')->insert([
            [
            'id' => '1',
            'password' => Hash::make('123456'),
            'namaProdi' => 'Teknik Informatika',
            'NIPkaprodi' => '196911182001121004',
            'namaKaprodi' => 'Fika Ayu',
            'kodeFakultas' => '1',
            ]
        ]);
        
        DB::table('dosen_walis')->insert([
            [
            'id' => '19740610200812',
            'password' => Hash::make('123456'),
            'namaDPA' => 'Abdullah Basuki Rahmat, S.Si, M.T.',
            'kodeProdi' => '1',
            ]
        ]);

        DB::table('mahasiswas')->insert([
            [
            'id' => '210411100050',
            'password' => Hash::make('123456'),
            'nama_mhs' => 'Indah Pratiwi',
            'jumlahSks' => '88',
            'nip_dpa' => '19740610200812',
            'kodeProdi' => '1',
            'tempat_lahir' => 'Bangkalan',
            'tanggal_lahir' => '2002-02-02',
            'jenis_kelamin' => 'perempuan',
            'angkatan' => '2021',
            'image' => 'indah_pratiwi.png',
            ]
        ]);

        DB::table('periode_kps')->insert([
            [
            'id' => '1',
            'semester' => 'Genap',
            'tahunMulai' => '2023',
            'tahunAkhir' => '2024',
            ]
        ]);
    }
}
