<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListbukukaskecils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listbukukaskecils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kaskecil');
            $table->integer('tanggal')->nullable(true);
            $table->string('bulan', 20)->nullable(true);
            $table->string('nobukti', 100)->nullable(true);
            $table->string('keterangan', 100)->nullable(true);
            $table->decimal('penerimaan', 20,2)->nullable(true);
            $table->decimal('pengeluaran', 20,2)->nullable(true);
            $table->decimal('akun1', 20,2)->nullable(true);
            $table->decimal('akun2', 20,2)->nullable(true);
            $table->decimal('akun3', 20,2)->nullable(true);
            $table->decimal('akun4', 20,2)->nullable(true);
            $table->decimal('akun5', 20,2)->nullable(true);
            $table->decimal('akun6', 20,2)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listbukukaskecils');
    }
}
