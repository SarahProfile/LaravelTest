<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title', 225);
			$table->string('describtion', 225);
			$table->decimal('price');
			$table->integer('categorie_id');
			$table->string('productCode');
			$table->string('product_image');
			$table->string('stock_id');
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}