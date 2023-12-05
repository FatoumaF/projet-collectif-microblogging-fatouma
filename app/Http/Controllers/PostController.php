<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::all();
        $posts = $this->getLikes($posts);
        
        return view('post', ['posts' => $posts]);
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

    public function getPostsByUserId($id){
        
        $posts = Post::where("user_id", $id)->get();
        $posts = $this->getLikes($posts);
        
    }

    private function getLikes($posts){
        foreach ($posts as $post) { 
            $post->likes = 5; // A définir
        }
        return $posts;
    }


}
