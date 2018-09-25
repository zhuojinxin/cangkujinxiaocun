<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRuchukusTable.
 */
class CreateRuchukusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ruchukus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('操作类型，receive入库，send出库');
            $table->unsignedInteger('good_id')->index()->comment('商品ID');
            $table->unsignedInteger('warehouse_id')->index()->comment('出入库仓库ID');
            $table->unsignedInteger('user_id')->index()->comment('创建用户ID');
            $table->integer('amount')->comment('出入库数量');
            $table->string('remarks')->comment('备注');
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
		Schema::drop('ruchukus');
	}
}
