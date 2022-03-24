<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountTable extends Migration {

	public function up()
	{
		Schema::create('account', function(Blueprint $table) {
			$table->timestamps();
			$table->softDeletes();
			$table->string('number')->primary();
			$table->string('name');
			$table->string('value')->nullable();
			$table->integer('group_id');
		});
	}

	public function down()
	{
		Schema::drop('account');
	}
}