<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNilaiInt extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('soallatihanessayjawabans', function (Blueprint $table) {
			$table->integer('nilai')->after('jawaban_essay')->nullable();
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
			$table->dropColumn('nilai');
		});
	}
}
