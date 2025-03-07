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
        Schema::create('bussiness_branch', function (Blueprint $table) {
        $table->id();
        $table->foreignId('bussiness_id')->constrained()->notnull();
        $table->foreignId('branch_id')->constrained()->notnull();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bussiness_branch');
    }
};
