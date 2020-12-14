<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoallatihanessaysTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('soallatihanessays', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('matapelajaran_id')->nullable();
			$table->text('pertanyaan')->nullable();
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
		Schema::dropIfExists('soallatihanessays');
	}
}
