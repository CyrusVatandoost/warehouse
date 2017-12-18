<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration {

  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
    Schema::create('issues', function (Blueprint $table) {
      $table->increments('issue_id');
      $table->integer('project_id');
      $table->integer('created_by');
      $table->integer('assigned_to')->nullable(true);
      $table->text('name');
      $table->boolean('completed')->default(false);
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down() {
    Schema::dropIfExists('issues');
  }

}
