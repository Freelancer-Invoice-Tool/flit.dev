<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('name', 200);
            $table->string('description', 200);
            $table->date('due_date');
            $table->date('project_submitted_date');
            $table->date('invoice_submitted_date');
            $table->date('invoice_approval_date');
            $table->date('pay_date');
            $table->boolean('payment_received');
            $table->string('project_poc_name', 200);
            $table->string('project_poc_email')->unique();
            $table->string('project_poc_phone');
            $table->string('project_poc_address');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{  
        $table->dropForeign('users_user_id_foreign');
		Schema::drop('projects');
	}

}
