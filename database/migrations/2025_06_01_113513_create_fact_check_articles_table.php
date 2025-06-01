<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fact_check_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('claim_excerpt');
            $table->longText('full_content');
            $table->string('verdict'); // Contoh: 'hoax', 'fact', 'misleading', 'clarification'
            $table->string('source_name')->nullable(); // Nama sumber
            $table->string('source_link')->nullable(); // Link ke sumber asli klaim
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fact_check_articles');
    }
};