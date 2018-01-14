<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBtcPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('btc_prices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('source')->nullable();
			$table->integer('price')->nullable();
			$table->string('currency')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('btc_prices');
	}

}
