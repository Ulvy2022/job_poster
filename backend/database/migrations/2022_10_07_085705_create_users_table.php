<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->string('verify_code')->nullable();
            $table->string('google_id')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            // $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
};
