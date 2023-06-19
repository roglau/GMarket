<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function forum(){
        $forums = Forum::all();
        return view('user.forum',compact('forums'));
    }

}
