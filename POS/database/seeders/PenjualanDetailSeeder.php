<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['detail_id' => 1, 'penjualan_id' => 1, 'barang_id' => 1, 'harga' => 7000000, 'jumlah' => 2],
            ['detail_id' => 2, 'penjualan_id' => 1, 'barang_id' => 2, 'harga' => 4500000, 'jumlah' => 1],
            ['detail_id' => 3, 'penjualan_id' => 2, 'barang_id' => 3, 'harga' => 150000, 'jumlah' => 3],
            ['detail_id' => 4, 'penjualan_id' => 2, 'barang_id' => 4, 'harga' => 300000, 'jumlah' => 2],
            ['detail_id' => 5, 'penjualan_id' => 3, 'barang_id' => 6, 'harga' => 10000, 'jumlah' => 10],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
