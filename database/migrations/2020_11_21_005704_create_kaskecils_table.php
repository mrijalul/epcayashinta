<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaskecilsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kaskecils', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->char('nama', 100)->nullable(true);
			$table->integer('userid')->nullable(true);
			$table->decimal('saldo', 20,2)->nullable(true);
			$table->date('tanggal')->after('saldo')->nullable(true);
			$table->decimal('pengembalianjumlah', 20,2)->nullable(true);
            $table->date('tanggalpengembalian')->nullable(true);
            $table->char('keteranganpengembalian', 255)->nullable(true);
			$table->integer('hapus')->nullable(true);
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
		Schema::dropIfExists('kaskecils');
	}
}
