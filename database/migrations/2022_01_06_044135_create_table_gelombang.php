<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGelombang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gelombang', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('wp_1');
            $table->string('issued');
            $table->string('today');
            $table->string('tomorrow');
            $table->string('h2');
            $table->string('h3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gelombang');
    }
}
