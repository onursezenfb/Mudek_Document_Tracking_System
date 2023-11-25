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
        Schema::create('handles', function (Blueprint $table) {   
            $table->string('term');
            $table->string('crn');
            $table->string('username');
            $table->timestamps();
    
            $table->unique(['term', 'crn', 'username'], 'handles_term_crn_username_unique');
        });
        DB::statement('ALTER TABLE handles ADD CONSTRAINT handles_courses_foreign_unique FOREIGN KEY (term, crn) REFERENCES courses(term, crn) ON DELETE CASCADE');
        DB::statement('ALTER TABLE handles ADD CONSTRAINT handles_users_foreign FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handles');
    }
};
