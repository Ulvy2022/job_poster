<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('name');
            $table->json('features');
            $table->string('subscribed_at')->nullable();
            $table->string('expired_at')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('features');
    }
};
