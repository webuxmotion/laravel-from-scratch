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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            // title
            $table->string('title');
            // code, varchar 3
            $table->string('code', 3);
            // symbol_left, varchar 10
            $table->string('symbol_left', 10);
            // symbol_right, varchar 10
            $table->string('symbol_right', 10);
            // value, decimal 15,2
            $table->decimal('value', 15, 2);
            // base, enum 0, 1
            $table->enum('base', [0, 1]);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
