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
        Schema::create('career', function (Blueprint $table) {
            $table->increments('career_id');
            $table->string('career_name', 100);
            $table->integer('duration_years')->nullable();
            $table->string('modality', 50)->nullable();
            $table->integer('faculty_id')->unsigned()->nullable();
            $table->integer('carrer_number')->nullable();

            $table->foreign('faculty_id')
                ->references('faculty_id')->on('faculty')
                ->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career');
    }
};