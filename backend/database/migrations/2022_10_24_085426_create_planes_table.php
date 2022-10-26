<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('subscribes_id')->constrained()->onDelete('CASCADE');
            $table->string('start_date');
            $table->string('end_date');
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_planes');
    }
};
