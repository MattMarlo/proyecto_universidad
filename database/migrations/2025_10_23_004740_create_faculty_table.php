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
        Schema::create('faculty', function (Blueprint $table) {
            $table->increments('faculty_id');
            $table->string('faculty_name', 100);
            $table->string('location', 150)->nullable();
            $table->string('dean_name', 200)->nullable();
            $table->string('acronym_name', 15)->nullable();
            $table->string('phone_fac', 20)->nullable();
            $table->string('email_fac', 100)->nullable();
            $table->string('logo_fac', 500)->nullable();
            $table->integer('year_fac')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty');
    }
};

