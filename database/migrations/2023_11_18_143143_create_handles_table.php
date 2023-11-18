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
        Schema::create('handles', function (Blueprint $table) {   
            $table->string('term');
            $table->foreign('term')->references('term')->on('courses')->cascadeOnDelete();
            $table->string('crn');
            $table->foreign('crn')->references('crn')->on('courses')->cascadeOnDelete(); // Foreign key referencing songs
            $table->string('username');
            $table->foreign('username')->references('username')->on('users')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['term', 'crn', 'username'], 'key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handles');
    }
};
