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
			$table->integer('id')->primary();
			$table->string('label')->nullable();
			$table->string('address')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
			$table->integer('license_id')->unsigned();
			$table->foreign('license_id')->references('id')->on('users');
			$table->string('available_balance')->nullable();
			$table->string('pending_received_balance')->nullable();
			$table->string('status')->nullable();
			$table->timestamps();
			$table->integer('archived')->default(0);
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
