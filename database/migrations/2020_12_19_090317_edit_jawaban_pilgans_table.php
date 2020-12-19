<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditJawabanPilgansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jawabanpilgans', function (Blueprint $table) {
			$table->dropColumn('option1');
			$table->dropColumn('option2');
			$table->dropColumn('option3');
			$table->dropColumn('option4');
			$table->dropColumn('option5');
			$table->integer('nilai')->after('right_answer')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jawabanpilgans', function (Blueprint $table) {
			$table->dropColumn('option1');
			$table->dropColumn('option2');
			$table->dropColumn('option3');
			$table->dropColumn('option4');
			$table->dropColumn('option5');
			$table->dropColumn('nilai');
		});
	}
}
