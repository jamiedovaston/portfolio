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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->boolean('featured')->default(false);
            $table->string('name');
            $table->text('description');
            $table->longText('body_text');
            $table->string('slug')->unique();
            $table->foreignId('code_lang_id')->constrained('code_langs')->onDelete('cascade'); // Links to code_langs table
            $table->string('repo')->nullable();
            $table->string('itch_page')->nullable();
            $table->json('tags')->nullable();
            $table->integer('order')->default(0)->after('id');
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
