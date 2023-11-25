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
        Schema::create('courserequirements', function (Blueprint $table) {
            $table->id();
            $table->string('term');
            $table->string('crn');
            $table->string('type');
            $table->timestamps();
            $table->unique(['term', 'crn', 'type'], 'courserequirements_term_crn_type_unique');
        });
        DB::statement('ALTER TABLE courserequirements ADD CONSTRAINT courserequirements_courses_foreign FOREIGN KEY (term, crn) REFERENCES courses(term, crn) ON DELETE CASCADE');
        DB::statement('ALTER TABLE courserequirements ADD CONSTRAINT courserequirements_requirements_foreign FOREIGN KEY (type) REFERENCES requirements(type) ON DELETE CASCADE');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courserequirements');
    }
};
