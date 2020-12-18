<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanpilgansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jawabanpilgans', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('matapelajaran_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('soallatihanpilgan_id')->nullable();
			$table->integer('user_answer')->nullable();
			$table->text('question')->nullable();
			$table->text('option1')->nullable();
			$table->text('option2')->nullable();
			$table->text('option3')->nullable();
			$table->text('option4')->nullable();
			$table->text('option5')->nullable();
			$table->integer('right_answer')->nullable();
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
		Schema::dropIfExists('jawabanpilgans');
	}
}
