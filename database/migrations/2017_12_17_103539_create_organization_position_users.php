<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationPositionUsers extends Migration 
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('organization_position_users', function (Blueprint $table) {
      $table->increments('organization_position_user_id');
      $table->integer('user_id');
      $table->integer('organization_position_id');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
      //
  }

}
