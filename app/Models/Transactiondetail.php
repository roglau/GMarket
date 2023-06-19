<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactiondetail extends Model
{
    use HasFactory;
    public function transactionHeader(){
        return $this->belongsToMany(Transactionheader::class);
    }

    public function game(){
        return $this->belongsToMany(Games::class);
    }
}
