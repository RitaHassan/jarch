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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('TEAM_ID');
            $table->integer('SYSTEM_ID');
            $table->string('DESCRIPTION',255); 
            $table->integer('priority');
            $table->integer('TASK_TYPE');
            $table->DATE('PLANNED_START_DT');
            $table->DATE('PLANNED_FINISH_DT');
            $table->DATE('ACTUAL_START_DT');
            $table->DATE('ACTUAL_FINISH_DT');
            $table->integer('COMPLETION_PERIOD');
            $table->integer('COMPLETION_STATUS');
            $table->string('NOTES',255);
            $table->integer('IN_PLAN');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
