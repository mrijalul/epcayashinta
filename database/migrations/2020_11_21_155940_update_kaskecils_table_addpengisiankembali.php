<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKaskecilsTableAddpengisiankembali extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("kaskecils", function(Blueprint $table){
			$table->decimal('pengembalianjumlah', 20,2)->after('tanggal')->nullable(true);
			$table->date('tanggalpengembalian')->after('pengembalianjumlah')->nullable(true);
			$table->char('keteranganpengembalian', 255)->after('tanggalpengembalian')->nullable(true);
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
			$table->dropColumn('pengembalianjumlah');
			$table->dropColumn('tanggalpengembalian');
			$table->dropColumn('keteranganpengembalian');
		});
	}
}
