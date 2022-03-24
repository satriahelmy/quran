<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitTable extends Migration {

	public function up()
	{
		Schema::create('unit', function(Blueprint $table) {
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('business_area')->primary();
		});
	}

	public function down()
	{
		Schema::drop('unit');
	}
}