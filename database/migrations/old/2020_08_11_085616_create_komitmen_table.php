<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKomitmenTable extends Migration {

	public function up()
	{
		Schema::create('komitmen', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('date');
			$table->string('name');
			$table->integer('group_id');
		});
	}

	public function down()
	{
		Schema::drop('komitmen');
	}
}