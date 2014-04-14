<?php

use Illuminate\Database\Migrations\Migration;

class AddImageNameColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoice_items', function($t)
		{
			$t->string('image');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoice_items', function($t)
		{
			$t->dropColumn('image');
		});
	}

}