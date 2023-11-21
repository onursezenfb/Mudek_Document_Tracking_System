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
        Schema::create('submit', function (Blueprint $table) {
            $table->id();
            $table->string('term');
            $table->foreign('term')->references('term')->on('courses')->cascadeOnDelete();
            $table->string('crn');
            $table->foreign('crn')->references('crn')->on('courses')->cascadeOnDelete(); // Foreign key referencing songs
            $table->string('type');
            $table->foreign('type')->references('name')->on('documents')->cascadeOnDelete();
            $table->boolean('submitted');
            $table->binary('pdf_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit');
    }
};
