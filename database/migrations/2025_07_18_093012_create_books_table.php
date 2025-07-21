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
        Schema::create('books', function (Blueprint $table) {

        $table->id();
        
        // Basic book information
        $table->string('book_title');
        $table->string('isbn')->nullable();
        $table->string('author');
        
        // Publication details
        $table->string('publication_year')->nullable();
        $table->string('genre')->nullable();
        $table->integer('pages')->nullable();
        $table->string('language')->nullable();
        
        //inventory
        $table->string('condition')->nullable();
        
        // Additional information
        $table->text('description')->nullable();

        
        // Timestamps
        $table->timestamps();
        
        // Indexes for better performance
        $table->index('book_title');
        $table->index('author');
        $table->index('genre');
        $table->index(['author', 'book_title']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
