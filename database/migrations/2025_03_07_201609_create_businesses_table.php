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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('enterpryse')->notnull();
            $table->string('branch');
            $table->string('name_bussiness');
            $table->string('solution');
            $table->string('price_ativation')->notnull();
            $table->string('price_month')->notnull();
            $table->string('comission_ativation')->notnull();
            $table->string('comission_month')->notnull();
            $table->string('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
