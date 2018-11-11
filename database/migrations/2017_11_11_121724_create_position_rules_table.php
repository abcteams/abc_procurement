<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position_id');
            $table->integer('screen_id');
            $table->integer('can_show');
            $table->integer('can_edit');
            $table->integer('can_approve');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_rules');
    }
}
