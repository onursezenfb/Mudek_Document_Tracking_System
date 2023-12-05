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
        Schema::create('courses', function (Blueprint $table) {
            $table->string('course_name');
            $table->string('program_code');
            $table->unsignedInteger('exam_count');
            $table->string('term')->index();
            $table->string("crn")->index();
            $table->string('section_code');

            $table->unique(['term', 'crn'], 'key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
