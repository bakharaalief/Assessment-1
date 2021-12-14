<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin
        User::create([
            'NIM_NIDN' => '00000000001',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'alamat' => 'Jl.Pertama Blok F7 No.18',
            'tahun_masuk' => '2020',
            'kontak' => '0812345678',
            'password' => bcrypt('12345678')
        ]);

        //create dosen
        for ($i = 1; $i < 6; $i++) {
            User::create([
                'NIM_NIDN' => rand(10000000, 99999999),
                'name' => 'dosen ' . $i,
                'email' => 'dosen' . $i . '@gmail.com',
                'level' => 'dosen',
                'alamat' => 'Jl.Pertama Blok F7 No.18',
                'tahun_masuk' => '2020',
                'kontak' => '08123456788',
                'password' => bcrypt('12345678')
            ]);
        }

        //create mahasiswa
        for ($i = 1; $i < 6; $i++) {
            User::create([
                'NIM_NIDN' => rand(10000000, 99999999),
                'name' => 'mahasiswa ' . $i,
                'email' => 'mahasiswa' . $i . '@gmail.com',
                'level' => 'mahasiswa',
                'alamat' => 'Jl.Pertama Blok F7 No.18',
                'tahun_masuk' => '2020',
                'kontak' => '0812345678',
                'password' => bcrypt('12345678')
            ]);
        }
    }
}
