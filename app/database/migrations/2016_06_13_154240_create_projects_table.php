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
            $table->string('description', 200)->nullable();
            $table->longText('project_notes')->nullable();
            $table->date('due_date');
            $table->dateTime('project_submitted_date')->nullable();
            $table->dateTime('invoice_submitted_date')->nullable();
            $table->dateTime('invoice_approval_date')->nullable();
            $table->dateTime('pay_date')->nullable();
            $table->string('project_status')->nullable();
            $table->boolean('project_submitted')->nullable();
            $table->boolean('invoice_submitted')->nullable();
            $table->boolean('payment_received')->nullable();
            $table->string('project_poc_name', 200)->nullable();
            $table->string('project_poc_email')->nullable();
            $table->string('project_poc_phone')->nullable();
            $table->string('project_poc_address')->nullable();
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
		Schema::drop('projects');
	}

}
