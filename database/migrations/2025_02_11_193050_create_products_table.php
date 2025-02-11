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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // category_id
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            // brand_id
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            // title
            $table->string('title');
            // alias
            $table->string('alias')->unique();
            // content
            $table->text('content');
            // price, default 0
            $table->decimal('price', 10, 2)->default(0);
            // old_price
            $table->decimal('old_price', 10, 2)->default(0);
            // status, enum 0 or 1; default 1
            $table->enum('status', [0, 1])->default(1);
            // keywords
            $table->string('keywords')->nullable();
            // description
            $table->string('description')->nullable();
            // img, default no_image.jpg
            $table->string('img')->default('no_image.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
