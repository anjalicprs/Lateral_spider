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
         if (Schema::hasTable('users')) //check if table exists
        {
        }else{
          Schema::create('users', function (Blueprint $table) {
              $table->increments('id');
              $table->string('username', 32);
              $table->date('dob');
              $table->string('name');
              $table->string('email')->unique();
              $table->string('password');
              $table->rememberToken();
              $table->timestamps();
              $table->string('Picture')->default('default.png');
              $table->int('status');
          });
        }
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
