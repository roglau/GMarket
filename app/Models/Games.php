<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'genreid',
        'title',
        'image',
        'description',
        'price',
        'rating',
    ];

    public function cart(){
        return $this->hasMany(Carts::class);
    }

    public function transactionDetail(){
        return $this->hasMany(Transactiondetail::class);
    }

    public function genre(){
        return $this->hasOne(Genre::class);
    }
}
