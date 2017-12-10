<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up() {

      Schema::create('pending_users', function(Blueprint $table) {
        $table->increments('user_id');
        $table->string('first_name', 32);
        $table->string('middle_initial', 2);
        $table->string('last_name', 32);
        $table->enum('gender', ['Male', 'Female']);
        $table->integer('user_type_id')->unsigned()->nullable();
        $table->string('user_position', 32)->nullable();
        $table->string('email', 320);
        $table->string('password', 64);
        $table->text('bio')->nullable(true);
        $table->boolean('verified')->default(false);
        $table->string('verification_token')->nullable();

        // required for Laravel 4.1.26
        $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('pending_users');
    }
}
