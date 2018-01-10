<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBtcUsersAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('btc_users_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('label')->nullable();
			$table->string('address')->nullable();
			$table->unsignedInteger('user_id')->nullable();
			$table->unsignedInteger('license_id')->nullable();
			$table->string('available_balance')->nullable();
			$table->string('pending_received_balance')->nullable();
			$table->string('status')->nullable();
			$table->unsignedTinyInteger('archived')->default(0);
			$table->timestamps();
			
			// Defining Integrity Constraints
			$table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('btc_users_addresses');
	}

}
