<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name',
        'author_contact_number',
        'author_country',
        'created_at',
        'updated_at'
    ];

    public function book() {
        return $this->hasMany(Book::class);
    }

}
