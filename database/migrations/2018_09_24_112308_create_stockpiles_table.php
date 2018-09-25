<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStockpilesTable.
 */
class CreateStockpilesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stockpiles', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('good_id')->index()->comment('商品ID');
            $table->unsignedInteger('user_id')->index()->comment('创建用户ID');
            $table->unsignedInteger('warehouse_id')->index()->comment('仓库ID');
            $table->integer('amount')->comment('库存数量');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('good_id')->references('id')->on('goods')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stockpiles');
	}
}
