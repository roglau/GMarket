<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $primaryKey = ['user_id','book_id'];

    public function user(){
        return $this->belongsToMany(User::class,);
    }

    public function game(){
        return $this->belongsToMany(Games::class);
    }
}
