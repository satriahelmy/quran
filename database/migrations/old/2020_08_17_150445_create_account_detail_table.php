<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountDetailTable extends Migration {

	public function up()
	{
		Schema::create('account_detail', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('account_number');
			$table->string('name');
			$table->string('value');
			$table->string('business_area');
			$table->string('username')->nullable();
			$table->string('cost_center')->nullable();
			$table->string('order')->nullable();
			$table->string('document_number')->nullable();
			$table->string('document_type')->nullable();
			$table->date('document_date')->nullable();
			$table->date('posting_date')->nullable();
			$table->string('name_offsetting_account')->nullable();
			$table->string('no_offsetting_account')->nullable();
			$table->string('description')->nullable();
			$table->string('wbs_element')->nullable();
			$table->string('vendor')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('account_detail');
	}
}