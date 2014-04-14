<?php

use Illuminate\Database\Migrations\Migration;

class MakeInvoiceItemSizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_items_sizes', function($t)
		{
			$t->increments('id');
			$t->text('size');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('invoice_items_sizes');
	}

}