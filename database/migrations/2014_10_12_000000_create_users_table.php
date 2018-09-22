<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name')->unique()->comment('姓名');
            $table->integer('duty')->nullable()->comment('职务(null客户，1老板，2经理，3员工)');
            $table->string('identitycard')->nullable()->unique()->comment('身份证号');
            $table->string('phone')->nullable()->unique()->comment('电话');
            $table->string('email')->nullable()->unique()->comment('email');
            $table->unsignedTinyInteger('gender')->default(0)->comment('性别');
            $table->string('password');
            $table->dateTime('birthdata')->nullable()->comment('生日');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
