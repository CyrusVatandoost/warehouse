<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_positions', function (Blueprint $table) {
            $table->increments('organization_position_id');
            $table->integer('organization_id')->nullable();
            $table->string('name');
            $table->timestamps();
        });

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
    public function down()
    {
        Schema::dropIfExists('organization_positions');
    }
}
