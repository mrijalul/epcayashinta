<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKaskecilsAddsaldoawalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("kaskecils", function(Blueprint $table){
            $table->decimal('saldo', 20,2)->after('userid');
            $table->date('tanggal')->after('saldo')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('saldo');
        $table->dropColumn('tanggal');
    }
}
