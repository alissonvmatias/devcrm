<?php

use App\Models\Enterprise;
use App\Models\TypeEnterprise;
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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj');
            $table->string('social_reason');
            $table->string('name_fantasy');
            $table->foreignIdFor(TypeEnterprise::class);
            $table->string('name_manager');
            $table->string('telephone');
            $table->string('observationn')->nullable();
            $table->string('user_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
