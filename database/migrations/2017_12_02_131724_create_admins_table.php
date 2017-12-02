<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration {
    
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('admins', function (Blueprint $table) {
      $table->increments('admin_id');
      $table->integer('user_id');
      $table->timestamps();
    });

    DB::table('admins')->insert(
      array(
        'user_id' => '1'
      )
    );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('admins');
  }
    
}
