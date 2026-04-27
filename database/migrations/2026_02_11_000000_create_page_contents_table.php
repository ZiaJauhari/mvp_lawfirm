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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable(); // e.g., 'home', 'about', 'services'
            $table->string('section')->nullable(); // e.g., 'hero', 'about', 'footer'
            $table->string('key')->unique(); // e.g., 'hero_title', 'hero_subtitle'
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, textarea, image, rich_text
            $table->string('label')->nullable(); // Display label
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
