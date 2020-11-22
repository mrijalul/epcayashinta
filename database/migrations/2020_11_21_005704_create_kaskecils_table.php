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
			$table->char('nama', 100)->after('id');
			$table->integer('userid')->after('nama');
			$table->integer('hapus')->after('userid');
			
			$table->decimal('saldo', 20,2)->after('userid');
			$table->date('tanggal')->after('saldo')->nullable(true);

			$table->decimal('pengembalianjumlah', 20,2)->after('tanggal')->nullable(true);
            $table->date('tanggalpengembalian')->after('pengembalianjumlah')->nullable(true);
            $table->char('keteranganpengembalian', 255)->after('tanggalpengembalian')->nullable(true);
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
