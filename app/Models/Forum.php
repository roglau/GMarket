<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class,'userid');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'forumid');
    }
}
