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
        Schema::create('charges_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charge_id')->constrained('extra_charges')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->foreignId('part_id')->constrained('parts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charges_payments');
    }
};
