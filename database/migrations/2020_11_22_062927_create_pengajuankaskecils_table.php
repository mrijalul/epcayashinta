<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuankaskecilsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengajuankaskecils', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('kaskecil');
			$table->char('namakun', 100);
			$table->char('keterangan', 255);
			$table->date('tanggal')->nullable(true);
			$table->decimal('jumlah', 20,2);
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
		Schema::dropIfExists('pengajuankaskecils');
	}
}
