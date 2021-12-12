<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now()->setTimezone('Asia/Manila');
        $dateNow = $dt->toDateTimeString();

        for ($i = 0; $i < 5; $i++) {
            Jadwal::create([
                'mahasiswa_id' => '3',
                'dosen_id' => '2',
                'judul' => 'Bimbingan Skripsi ' . $i,
                'Deskripsi' => 'Banyak Yang Ingin Dibahas Bapak :)))',
                'Awal' => $dateNow,
                'Akhir' => $dateNow,
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]);
        }
    }
}
