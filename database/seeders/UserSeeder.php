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
        User::create([
            'NIM_NIDN' => '00000000002',
            'name' => 'dosen 1',
            'email' => 'dosen1@gmail.com',
            'level' => 'dosen',
            'alamat' => 'Jl.Pertama Blok F7 No.18',
            'tahun_masuk' => '2020',
            'kontak' => '0812345678',
            'password' => bcrypt('12345678')
        ]);

        //create mahasiswa
        User::create([
            'NIM_NIDN' => '00000000003',
            'name' => 'mahasiswa 1',
            'email' => 'mahasiswa1@gmail.com',
            'level' => 'mahasiswa',
            'alamat' => 'Jl.Pertama Blok F7 No.18',
            'tahun_masuk' => '2020',
            'kontak' => '0812345678',
            'password' => bcrypt('12345678')
        ]);

        //create dosen 
        User::create([
            'NIM_NIDN' => '00000000012',
            'name' => 'dosen 2',
            'email' => 'dosen2@gmail.com',
            'level' => 'dosen',
            'alamat' => 'Jl.Pertama Blok F7 No.18',
            'tahun_masuk' => '2020',
            'kontak' => '0812345678',
            'password' => bcrypt('12345678')
        ]);
    }
}
