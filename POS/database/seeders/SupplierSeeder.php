<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['supplier_id' => 1, 'supplier_kode' => 'SUP001', 'supplier_nama' => 'PT. Sumber Elektronik', 'supplier_alamat' => 'Jl. Sudirman No. 10'],
            ['supplier_id' => 2, 'supplier_kode' => 'SUP002', 'supplier_nama' => 'CV. Pakaian Indah', 'supplier_alamat' => 'Jl. Melati No. 5'],
            ['supplier_id' => 3, 'supplier_kode' => 'SUP003', 'supplier_nama' => 'UD. Alat Tulis Jaya', 'supplier_alamat' => 'Jl. Kenanga No. 7'],
        ];

        DB::table('m_supplier')->insert($data);
    }
}
