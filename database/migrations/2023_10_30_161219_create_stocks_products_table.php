<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksProductsTable extends Migration {

	public function up()
	{
		Schema::create('stocks_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned();
			$table->integer('stock_id')->unsigned();
			$table->integer('supplier-id')->unsigned();
			$table->integer('quantity')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('stocks_products');
	}
}