<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Userbooks;
use App\Models\Review;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /*
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',   
        'role',
    ];
    public $timestamps=false;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function isAdmin() {
        return ($this->role == 'admin');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function books()
    { // FKrelationship
    return $this->hasMany(Userbooks::class);
    }
    public function reviews()
    { // FKrelationship
    return $this->hasMany(Review::class);
    }

}
