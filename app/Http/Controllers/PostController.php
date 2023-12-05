<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {

        return view('post');
    }

    public function savePost(Request $request){
        // \Log::info(json_encode($request->all()));
        $post = new Post;
        $post->image = $request->postImage;
        $post->content = $request->postContent;
        $post->user_id = 1;
        // $post->user_id = auth()->user()->id; // A revérifier
        $post->save();

        return redirect("/post");
    }

}
