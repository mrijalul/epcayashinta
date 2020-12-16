<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkunbukukaskecils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akunbukukaskecils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kaskecil');
            $table->string('namaakun1', 100)->nullable(true);
            $table->string('kodeakun1', 20)->nullable(true);
            $table->string('namaakun2', 100)->nullable(true);
            $table->string('kodeakun2', 20)->nullable(true);
            $table->string('namaakun3', 100)->nullable(true);
            $table->string('kodeakun3', 20)->nullable(true);
            $table->string('namaakun4', 100)->nullable(true);
            $table->string('kodeakun4', 20)->nullable(true);
            $table->string('namaakun5', 100)->nullable(true);
            $table->string('kodeakun5', 20)->nullable(true);
            $table->string('namaakun6', 100)->nullable(true);
            $table->string('kodeakun6', 20)->nullable(true);
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
        Schema::dropIfExists('akunbukukaskecils');
    }
}
