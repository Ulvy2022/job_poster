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
            $table->string('gender')->nullable();
            $table->string('verify_code')->nullable();
            $table->string('img')->nullable();
            $table->string('role')->default('user');
            $table->string('phoneNumber')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('subscription')->default('free');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
