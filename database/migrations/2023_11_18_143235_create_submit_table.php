<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('crn');
            $table->string('name');
            $table->boolean('submitted');
            $table->binary('pdf_data');
            $table->timestamps();
        });
    
        DB::statement('ALTER TABLE submit ADD CONSTRAINT submit_courses_foreign FOREIGN KEY (term, crn) REFERENCES courses(term, crn) ON DELETE CASCADE');
        DB::statement('ALTER TABLE submit ADD CONSTRAINT submit_documents_foreign FOREIGN KEY (name) REFERENCES documents(name) ON DELETE CASCADE');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit');
    }
};
