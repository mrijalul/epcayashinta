<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoallatihanpilgansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('soallatihanpilgans', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('matapelajaran_id')->nullable();
			$table->text('question')->nullable();
			$table->text('option1')->nullable();
			$table->text('option2')->nullable();
			$table->text('option3')->nullable();
			$table->text('option4')->nullable();
			$table->text('option5')->nullable();
			$table->integer('answer')->nullable();
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
		Schema::dropIfExists('soallatihanpilgans');
	}
}
