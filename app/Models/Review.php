<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class Review extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function user()
    { // FK relationship
    return $this->belongsTo(User::class);
    }
    public function book()
    { // FK relationship
    return $this->belongsTo(Book::class);
    }
}
