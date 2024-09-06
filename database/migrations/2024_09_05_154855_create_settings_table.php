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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->string('key');
            // $table->string('value');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('display_suggestion_term')->default(true);
            $table->boolean('display_collection')->default(true);
            $table->boolean('display_product')->default(true);
            $table->unsignedInteger('max_results')->default(10);
            $table->unsignedInteger('min_characters')->default(2);
            $table->unsignedInteger('search_delay')->default(300);
            $table->boolean('enable_fuzzy_search')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
