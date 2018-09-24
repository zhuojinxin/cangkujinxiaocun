<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGoodsTable.
 */
class CreateGoodsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->comment('创建用户ID');
            $table->string('name')->unique()->comment('商品名称');
            $table->string('spec')->unique()->comment('商品规格');
            $table->string('remarks')->unique()->comment('备注');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods');
	}
}
