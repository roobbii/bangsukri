<?php

namespace Database\Seeders;

use App\Models\Pemasok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemasokSeeder extends Seeder
{  
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $now = date('Y-m-d H:i:s');
       Pemasok::insert([
        [
            'nama_pemasok' => 'CV Alading',
            'nama_kontak' => 'Mas elon',
            'nomor_hp' => '085768709876',
            'alamat' => 'Banjarbaru',
            'created_at' => $now, 'updated_at' => $now
        ],
            
        [
             'nama_pemasok' => 'CV Benalu',
            'nama_kontak' => 'Mba piya',
            'nomor_hp' => '085768705643',
            'alamat' => 'Banjarmasin',
            'created_at' => $now, 'updated_at' => $now
        ],
    ]);
    }
}
