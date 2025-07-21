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
    'cover_image',
];
}
