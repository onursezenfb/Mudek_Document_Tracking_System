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
        Schema::create('teaches', function (Blueprint $table) {
            $table->string('term');
            $table->string('crn');
            $table->string('username');
            $table->timestamps();
            $table->unique(['term', 'crn', 'username'], 'teaches_term_crn_username_unique');
        });
        Schema::table('teaches', function (Blueprint $table) {
            $table->foreign('username', 'teaches_username_foreign')
                  ->references('username')
                  ->on('users')
                  ->cascadeOnDelete();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaches');
    }
};
