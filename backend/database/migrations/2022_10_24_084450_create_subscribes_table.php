<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create(
            'subscribes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
                $table->foreignId('features_id')->constrained()->onDelete('CASCADE');
                $table->integer('leftCharge');
                $table->integer('charge');
                $table->string('name');
                $table->integer('used')->default(0);
                $table->json('feature');
                $table->string('description')->nullable();

            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('subscribsions');
    }
};
