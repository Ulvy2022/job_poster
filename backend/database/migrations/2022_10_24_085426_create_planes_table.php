<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create(
            'planes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
                $table->foreignId('subscribes_id')->constrained()->onDelete('CASCADE');
                $table->integer('cost');
                $table->string('subscribed_at');
                $table->string('expired')->default('No');
                $table->string('expired_at');
            }
        );
    }


    public function down()
    {
        Schema::dropIfExists('user_planes');
    }
};
