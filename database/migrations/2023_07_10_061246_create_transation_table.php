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
        Schema::create('transation', function (Blueprint $table) {
            $table->id();
            $table->integer('user_by');
            $table->integer('table_id');
            $table->integer('record_id');
            $table->integer('action_id');
            $table->integer('screen_id');
            $table->integer('description');
            $table->string('ip');
            $table->string('device');
            $table->timestamp('trans_date');
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
        Schema::dropIfExists('transation');
    }
};
