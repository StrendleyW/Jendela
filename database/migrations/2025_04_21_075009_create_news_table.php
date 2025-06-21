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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('writer');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->text('content_news');
            $table->string('image')->nullable(); // path gambar
            $table->string('video_url')->nullable();
            $table->boolean('is_top_pick')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
{
    Schema::table('news', function (Blueprint $table) {
        $table->dropColumn('is_top_pick');
        $table->dropForeign(['category_id']);
        $table->dropColumn('category_id');
    });
}

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('news');
    // }
};
