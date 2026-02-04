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
        Schema::table('blogs_details', function (Blueprint $table) {
            if (Schema::hasColumn('blogs_details', 'title')) {
                $table->string('year')->nullable()->after('title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs_details', function (Blueprint $table) {
            if (Schema::hasColumn('blogs_details', 'year')) {
                $table->dropColumn('year');
            }
        });
    }
};
