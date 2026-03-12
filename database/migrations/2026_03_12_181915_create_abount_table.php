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
        Schema::create('abount', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->text('decision')->nullable();
            $table->text('decision_en')->nullable();
            $table->string('avatar')->default('avatar_default.png');
            $table->string('status',5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abount');
    }
};
