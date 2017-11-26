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
        Schema::create('users', function(Blueprint $table)
      {
            $table->increments('user_id');
            $table->string('first_name', 32);
            $table->string('middle_initial', 2);
            $table->string('last_name', 32);
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('user_type_id')->unsigned()->nullable();
            $table->string('user_position', 32)->nullable();
            $table->string('email', 320);
            $table->string('password', 64);

                      // required for Laravel 4.1.26
                        $table->string('remember_token', 100)->nullable();
            $table->timestamps();
      });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
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
