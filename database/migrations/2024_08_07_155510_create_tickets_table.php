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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('subject');
            $table->text('message'); 
            $table->unsignedBigInteger('sender')->unsigned();
            $table->foreign('sender')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->enum('priority',['high','low', 'Medium'])->default('opened');
            $table->enum('status',['opened','in progress', 'closed'])->default('opened');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
