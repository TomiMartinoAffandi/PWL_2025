<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTPenjualanTable extends Migration
{
    public function up()
    {
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('penjualan_kode');
            $table->string('pembeli', 50);
            $table->timestamp('penjualan_tanggal')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            
            $table->foreign('user_id')->references('user_id')->on('m_user');
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_penjualan');
        Schema::table('t_penjualan', function (Blueprint $table) {
            $table->dropColumn('penjualan_kode');
        });
    }
}
