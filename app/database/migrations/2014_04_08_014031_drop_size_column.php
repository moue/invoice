<?php

use Illuminate\Database\Migrations\Migration;

class DropSizeColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoice_items', function($t){
			$t->unsignedInteger('size_id');
			$t->foreign('size_id')->references('id')->on('invoice_items_sizes');
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
			$t->dropForeign('invoice_items_size_id_foreign');
			$t->dropColumn('size_id');
		});
	}

}