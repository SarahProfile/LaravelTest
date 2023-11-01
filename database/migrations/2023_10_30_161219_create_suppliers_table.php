<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 225);
		});
	}

	public function down()
	{
		Schema::drop('suppliers');
	}
}