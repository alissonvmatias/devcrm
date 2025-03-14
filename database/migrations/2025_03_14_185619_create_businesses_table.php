Migration Business

<?php

use App\Models\Branch;
use App\Models\Enterprise;
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
            $table->foreignIdFor(Enterprise::class);
            $table->foreignIdFor(Branch::class);
            $table->string('name_bussiness');
            $table->string('solution');
            $table->string('price_ativation');
            $table->string('price_month');
            $table->string('comission_ativation');
            $table->string('comission_month');
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
