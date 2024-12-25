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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Project title
            $table->text('description'); // Small description of the project
            $table->json('images')->nullable(); // Array of images (stored as JSON)
            $table->string('video')->nullable(); // Video upload path
            $table->string('background_image')->nullable(); // Background image
            $table->longText('body')->nullable(); // Project details (markdown or HTML content for ex.)
            $table->json('links')->nullable(); // Links array with icons
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
