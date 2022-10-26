<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('features_id')->constrained()->onDelete('CASCADE');
            $table->integer('charge');
            $table->string('name');
            $table->json('feature');
            $table->string('description')->nullable();
            $table->string('subscribed_at')->nullable();
            $table->string('expired_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribsions');
    }
};
