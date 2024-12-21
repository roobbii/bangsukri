<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $now = date('Y-m-d H:i:s');
       Barang::insert([
        [
            'nama_barang' => 'Kursi Kantor',
            'merk' => 'Doodook',
            'tipe' => 'Kursi kantor air spring',
            'satuan' => 'Unit',
            'created_at' => $now, 'updated_at' => $now
        ],

        [
            'nama_barang' => 'Kipas Angin',
            'merk' => 'Semwing',
            'tipe' => 'Kipas angin dinding',
            'satuan' => 'Unit',
            'created_at' => $now, 'updated_at' => $now
        ]
        ]);
    }
}
