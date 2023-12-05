<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function savePost(Request $request){
        $post = new Post;
        $post->image = $request->imagePost;
        $post->content = $request->contentPost;
        $post->user_id = auth()->user()->id; // A revérifier
    }
    //
}
