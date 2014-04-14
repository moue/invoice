<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($t)
        {
            $t->increments('id');
            $t->string('first_name', 20);
            $t->string('last_name', 20);
            $t->string('email', 100)->unique();
            $t->string('password', 64);
            $t->string('confirmation_code');
            $t->boolean('confirmed')->default(false);
            $t->timestamps();
        });

		Schema::create('password_resets', function($t)
        {
            $t->string('email');
            $t->timestamps();
            
            $t->string('token');
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
		Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
	}

}
