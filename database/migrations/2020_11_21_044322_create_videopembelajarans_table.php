<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideopembelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videopembelajarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matapelajaran_id')->nullable();
            $table->string('nama_video')->nullable();
            $table->string('file_video')->nullable();
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
        Schema::dropIfExists('videopembelajarans');
    }
}
