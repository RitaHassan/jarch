<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_team', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            // $table->string('SYSTEM_NAME',255);
            // $table->integer('TEAM_ID');
            // $table->integer('ID_NUM');
            // $table->integer('SYSTEM_NUM');
            // $table->integer('ACTIVE');
            // $table->integer('created_by')->unsigned()->nullable();
            // $table->integer('updated_by')->unsigned()->nullable();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_team');
    }
};
