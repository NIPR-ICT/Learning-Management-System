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
        Schema::create('ticket_reply_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_replies_id')->unsigned();
            $table->foreign('ticket_replies_id')->references('id')->on('ticket_replies')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_reply_attachments');
    }
};
