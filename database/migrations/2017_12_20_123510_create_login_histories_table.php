<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginHistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login_histories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('ip_address', 191);
			$table->boolean('user_type')->nullable()->comment('0 for User; 1 for Admin');
			$table->text('user_agent');
			$table->text('geoip');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login_histories');
	}

}
