<?php

use Illuminate\Database\Migrations\Migration;

class DropInvoiceItemsColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoice_items', function($t)
		{
			$t->dropForeign('invoice_items_advertiser_id_foreign');
			$t->dropColumn('advertiser_id');
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