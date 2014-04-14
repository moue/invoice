<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('advertisers', function($table)
		{
			$table->increments('id'); 
			$table->string('advertiser');
			$table->string('contact');
			$table->string('position');
			$table->integer('telephone');
			$table->string('email');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->integer('zipcode');
			$table->string('sales_id');
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
		//
		Schema::drop('advertisers');
	}

}
