<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkytbToVideopembelajaranTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('videopembelajarans', function (Blueprint $table) {
			$table->text('link_ytb')->after('file_video')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('videopembelajarans', function (Blueprint $table) {
			$table->dropColumn('link_ytb');
		});
	}
}
