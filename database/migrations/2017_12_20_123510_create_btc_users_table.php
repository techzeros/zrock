<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBtcUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('btc_users', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('username')->nullable();
			$table->string('password')->nullable();
			$table->string('secret_pin')->nullable();
			$table->string('email')->nullable();
			$table->integer('email_verified')->nullable();
			$table->text('email_hash', 65535)->nullable();
			$table->string('status')->nullable();
			$table->string('ip')->nullable();
			$table->integer('time_signup')->nullable();
			$table->integer('time_signin')->nullable();
			$table->integer('time_activity')->nullable();
			$table->integer('document_verified')->nullable();
			$table->text('document_1', 65535)->nullable();
			$table->text('document_2', 65535)->nullable();
			$table->integer('mobile_verified')->nullable();
			$table->text('mobile_number', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('btc_users');
	}

}
