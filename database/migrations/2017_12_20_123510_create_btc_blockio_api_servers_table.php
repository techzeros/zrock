<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBtcBlockioApiServersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('btc_blockio_api_servers', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('account')->nullable();
			$table->string('license')->nullable();
			$table->string('secret_pin')->nullable();
			$table->string('address')->nullable();
			$table->integer('addresses')->nullable();
			$table->integer('default_license')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('btc_blockio_api_servers');
	}

}
