<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCoverImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'image_path',
    ];

    // Relationship: Cover Image => belongs to Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
