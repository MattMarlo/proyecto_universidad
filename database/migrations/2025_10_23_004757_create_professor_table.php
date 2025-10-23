<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('professor', function (Blueprint $table) {
            $table->increments('professor_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('academic_title', 100)->nullable();
            $table->string('institutional_email', 100)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->date('hire_date')->nullable();
            $table->integer('career_id')->unsigned()->nullable();

            $table->foreign('career_id')
                ->references('career_id')->on('career')
                ->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor');
    }
};