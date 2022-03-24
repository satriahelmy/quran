<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupTable extends Migration {

	public function up()
	{
		Schema::create('group', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->integer('target');
		});
	}

	public function down()
	{
		Schema::drop('group');
	}
}