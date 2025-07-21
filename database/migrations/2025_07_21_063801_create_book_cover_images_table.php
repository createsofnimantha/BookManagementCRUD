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
Schema::create('book_cover_images', function (Blueprint $table) {
    $table->id();
    
    // Foreign key to books table
    $table->unsignedBigInteger('book_id')->unique(); // One-to-one
    $table->string('image_path'); // file path
    
    $table->timestamps();

    // Foreign key constraint
    $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_cover_images');
    }
};
