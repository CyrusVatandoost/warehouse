<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create('organizations', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email');
        $table->timestamps();
    });

    // by default, there must always be one user which is the admin
    DB::table('organizations')->insert(
        array(
            'name' => 'T3dHouse',
            'email' => 'contact@t3dhouse.com'
        )
    );
  } 

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('organizations');
  }
  
}
