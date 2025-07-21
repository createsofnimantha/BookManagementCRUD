<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'isbn',
        'author',
        'publication_year',
        'genre',
        'pages',
        'language',
        'condition',
        'description',
    ];

    // One-to-One relationship: Book => BookCoverImage
    public function coverImage()
    {
        return $this->hasOne(BookCoverImage::class);
    }
}

