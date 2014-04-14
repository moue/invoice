<?php

use Illuminate\Database\Migrations\Migration;

class DropUserIdColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoice_items', function($t)
		{
			$t->dropForeign('invoice_items_user_id_foreign');
			$t->dropColumn('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}