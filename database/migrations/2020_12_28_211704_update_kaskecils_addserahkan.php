<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKaskecilsAddserahkan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("kaskecils", function(Blueprint $table){
            $table->enum('jurnalkaskecil', ['Y', 'N'])->after('keteranganpengembalian')->default("N");
            $table->enum('bukukaskecil', ['Y', 'N'])->after('jurnalkaskecil')->default("N");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
