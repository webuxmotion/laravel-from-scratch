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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // user_id
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // status, enum 0 or 1, default 0
            $table->enum('status', [0, 1])->default(0);
            // currency, varchar 10
            $table->string('currency', 10);
            // note, text
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
