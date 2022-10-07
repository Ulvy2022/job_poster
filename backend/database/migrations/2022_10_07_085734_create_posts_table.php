<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("CASCADE");
            $table->string('position');
            $table->string('location');
            $table->string('duties');
            $table->string('requirements');
            $table->string('expiered')->default('No');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
