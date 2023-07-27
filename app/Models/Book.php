<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Review;
class Book extends Model
{
    use HasFactory;

    //protected $fillable = ['name', 'author_name', 'description', 'price'];
    public $timestamps = false;
    public function genres()
    { // FK relationship
    return $this->belongsTo(Genre::class);
    }
    public function reviews()
    { // FK relationship
    return $this->hasMany(Review::class);
    }
}
