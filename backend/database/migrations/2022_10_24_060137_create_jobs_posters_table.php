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
<<<<<<< HEAD
        Schema::create('jobs_posters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->string('job_title');
            $table->string('company_location');
            $table->string('job_type');
            $table->string('job_closedate')->nullable();
            $table->string('company_name');
            $table->boolean('status')->default(0);
            $table->integer('salary')->nullable();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('job_description');
            $table->string('job_address');
            $table->string('job_requirement');
            $table->string('expired_at')->nullable();
            $table->string('post_at')->nullable();
            $table->string('active')->default('No');
        });
=======
        Schema::create(
            'jobs_posters', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
                $table->string('job_title');
                $table->string('company_location');
                $table->string('job_type');
                $table->string('job_closedate')->nullable();
                $table->string('company_name');
                $table->integer('salary')->nullable();
                $table->string('contact_name');
                $table->string('contact_email');
                $table->string('job_description');
                $table->string('job_requirement');
                $table->string('expired_at')->nullable();
                $table->string('post_at')->nullable();
                $table->string('active')->default('No');
            }
        );
>>>>>>> 47020d8cb43e99daf1cb4dcf9ade02d4b972092a
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_posters');
    }
};
