<?php

use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function($t)
		{
			$t->increments('id');
            $t->unsignedInteger('advertiser_id')->index();
            $t->unsignedInteger('user_id');
            $t->timestamps();
            $t->softDeletes();

            $t->string('invoice_number')->nullable();
            $t->text('notes');
            $t->boolean('is_deleted');            

            $t->decimal('cost', 13, 4);
            $t->boolean('trade');
            $t->boolean('paid')->default(false);
        
            $t->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('cascade'); 
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');; 
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('invoices');
	}

}