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
			if (!Schema::hasTable('btc_users_addresses')) {
		//Check First before creating table
		Schema::create('btc_users_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('label')->nullable();
			$table->string('address')->nullable();
            $table->unsignedInteger('user_id');
			$table->unsignedInteger('license_id');
			$table->string('available_balance')->nullable();
			$table->string('pending_received_balance')->nullable();
			$table->string('status')->nullable();
			$table->unsignedInteger('archived')->default(0);
			$table->timestamps();
			
            $table->foreign('user_id')->references('id')->on('users');
			$table->foreign('license_id')->references('id')->on('users');
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
		Schema::drop('btc_users_addresses');
	}

}
