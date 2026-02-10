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
        Schema::table('blogs_image', function (Blueprint $table) {
            $table->string('name',2000)->nullable();
            $table->string('name_image',2000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs_image', function (Blueprint $table) {
            $table->dropIfExists('name');
            $table->dropIfExists('name_image');
        });
    }
};
