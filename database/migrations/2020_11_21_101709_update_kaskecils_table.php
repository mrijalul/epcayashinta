<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKaskecilsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("kaskecils", function(Blueprint $table){
			$table->char('nama', 100)->after('id');
			$table->integer('userid')->after('nama');
			$table->integer('hapus')->after('userid');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("kaskecils", function(Blueprint $table){
			$table->dropColumn('nama');
			$table->dropColumn('userid');
			$table->dropColumn('hapus');
		});
	}
}
