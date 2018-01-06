<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBtcUsersTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('btc_users_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id')->primary();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('type')->nullable();
			$table->string('recipient')->nullable();
			$table->string('sender')->nullable();
			$table->string('amount')->nullable();
			$table->integer('time')->nullable();
			$table->integer('confirmations')->nullable();
			$table->text('txid', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('btc_users_transactions');
	}

}
