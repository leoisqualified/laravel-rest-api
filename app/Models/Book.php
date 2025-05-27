<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'book_isbn',
        'book_price',
        'book_publish_year',
        'created_year',
        'updated_at'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }
}
