<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		if (!Schema::hasTable('users')) {
		//Check First before creating table
			Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('secret_pin')->nullable();
			$table->boolean('activated')->default(0);
			$table->string('email_token', 191)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->string('status')->nullable();
			$table->integer('mobile_verified')->nullable();
			$table->text('mobile_number', 65535)->nullable();
			$table->timestamps();
		});
	}
}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}