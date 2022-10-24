<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('user_planes', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('user_id')
                ->nullable()
                ->references('id')
                ->on('users');
            $table
                ->foreignId('subscriobsion_id')
                ->nullable()
                ->references('id')
                ->on('subscribsions');
            $table->date('start_date');
            $table->date('end_date');
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_planes');
    }
};
