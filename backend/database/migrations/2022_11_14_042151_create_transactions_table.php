<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('transaction_id');
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('plane_id')->constrained()->onDelete('CASCADE');
            $table->string('cvc');
            $table->string('currency')->default('usd');
            $table->string('card_brand');
            $table->string('amount');
            $table->string('card_number');
            $table->string('purchased_at');
            $table->string('status');
            $table->string('zip_code');
            $table->string('nameOnCard');
            $table->string('mm_yy');
            $table->longText('allInfo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
