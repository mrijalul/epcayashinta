<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKaskecilAddperusahaanperiode extends Migration
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
            $table->char('namaperusahaan', 255)->after('nama');
            $table->char('periode', 100)->after('namaperusahaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kaskecils', function (Blueprint $table) {
            $table->dropColumn('namaperusahaan');
            $table->dropColumn('periode');
        });
    }
}
