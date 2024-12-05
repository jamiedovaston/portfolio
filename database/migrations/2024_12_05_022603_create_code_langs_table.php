<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('code_langs', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('name');
            $table->string('slug')->unique(); // Unique slug for each language
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_langs');
    }
};
