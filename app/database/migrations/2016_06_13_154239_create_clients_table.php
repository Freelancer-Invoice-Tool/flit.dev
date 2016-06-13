<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
          	$table->integer('payment_terms');
          	$table->string('submission_or_approval');
            $table->string('client_name', 200);
            $table->string('main_poc_name', 200);
            $table->string('main_poc_email');
            $table->string('main_poc_phone');
            $table->string('main_poc_address');
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
		Schema::drop('clients');
	}

}
