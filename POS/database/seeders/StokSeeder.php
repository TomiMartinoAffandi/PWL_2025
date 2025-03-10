<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['stok_id' => 1, 'supplier_id' => 1, 'barang_id' => 1, 'user_id' => 1, 'stok_jumlah' => 50],
            ['stok_id' => 2, 'supplier_id' => 1, 'barang_id' => 2, 'user_id' => 1, 'stok_jumlah' => 40],
            ['stok_id' => 3, 'supplier_id' => 2, 'barang_id' => 6, 'user_id' => 2, 'stok_jumlah' => 80],
        ];

        DB::table('t_stok')->insert($data);
    }
}
