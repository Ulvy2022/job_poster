<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('subscribsions', function (Blueprint $table) {
            $table->id();
            // $table->foreignId("user_id")->constrained()->onDelete("CASCADE")->nullable();
            $table
                ->foreignId('user_id')
                ->nullable() 
                ->references('id')
                ->on('users');
            $table->integer('price');
            $table->json('features');
            $table->string('plane_type');
            $table->string('description');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribsions');
    }
};
