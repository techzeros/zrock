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
			$table->integer('id')->primary();
			$table->integer('uid')->nullable();
			$table->string('label')->nullable();
			$table->string('address')->nullable();
			$table->integer('lid')->nullable();
			$table->string('available_balance')->nullable();
			$table->string('pending_received_balance')->nullable();
			$table->string('status')->nullable();
			$table->integer('created')->nullable();
			$table->integer('updated')->nullable();
			$table->integer('archived')->default(0);
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
