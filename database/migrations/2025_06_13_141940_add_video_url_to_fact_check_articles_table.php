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
        Schema::table('fact_check_articles', function (Blueprint $table) {
        // Menambahkan kolom baru setelah kolom 'image'
            $table->string('video_url')->nullable()->after('image');
        });
    }

    public function down()
    {
        Schema::table('fact_check_articles', function (Blueprint $table) {
            $table->dropColumn('video_url');
        });
    }
};
