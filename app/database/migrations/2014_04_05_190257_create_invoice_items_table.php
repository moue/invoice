<?php

use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_items', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('advertiser_id');
            $t->unsignedInteger('user_id');
            $t->unsignedInteger('invoice_id')->index();
            $t->timestamps();
            $t->softDeletes();

			$t->text('desciption');
			$t->boolean('issue_1');
			$t->boolean('issue_2');
			$t->boolean('issue_3');
			$t->boolean('issue_4');
			$t->boolean('issue_5');
			$t->unsignedInteger('year');
			$t->float('subcost');
			$t->float('discount');
			$t->float('cost');

            $t->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $t->foreign('advertiser_id')->references('id')->on('advertisers');
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('invoice_items');
	}

}