<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactionheader extends Model
{
    use HasFactory;
    public function transactiondetail(){
        return $this->hasMany(Transactiondetail::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
