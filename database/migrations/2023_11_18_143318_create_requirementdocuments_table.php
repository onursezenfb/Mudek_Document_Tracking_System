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
        Schema::create('requirementdocuments', function (Blueprint $table) {
            $table->string('req_type');
            $table->foreign('req_type')->references('type')->on('requirements')->cascadeOnDelete();
            $table->string('doc_type');
            $table->foreign('doc_type')->references('type')->on('documents')->cascadeOnDelete();
            $table->unique(['req_type', 'doc_type'], 'key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementdocuments');
    }
};
