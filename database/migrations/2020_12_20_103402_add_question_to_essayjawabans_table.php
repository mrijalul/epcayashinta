<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionToEssayjawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soallatihanessayjawabans', function (Blueprint $table) {
            $table->text('pertanyaan')->after('matapelajaran_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soallatihanessayjawabans', function (Blueprint $table) {
            $table->dropColumn('pertanyaan');
        });
    }
}
