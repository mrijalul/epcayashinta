<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoallatihanpilgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soallatihanpilgans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matapelajaran_id')->nullable();
            $table->text('pertanyaan')->nullable();
            $table->text('pil_a')->nullable();
            $table->text('pil_b')->nullable();
            $table->text('pil_c')->nullable();
            $table->text('pil_d')->nullable();
            $table->text('pil_e')->nullable();
            $table->text('jawaban_benar')->nullable();
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
        Schema::dropIfExists('soallatihanpilgans');
    }
}
