<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\LikeController;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::all();
        $posts = $this->updateLikes($posts);

        return view('post', ['posts' => $posts]);
    }

    public function savePost(Request $request){
        $post = new Post;
        $post->image = $request->postImage;
        $post->content = $request->postContent;
        // $post->user_id = 1;
        $post->user_id = auth()->user()->id; // A revérifier
        $post->save();

        return redirect("/post");
    }

    public function getPostsByUserId($id){
        
        $posts = Post::where("user_id", $id)->get();
        $posts = $this->updateLikes($posts);
        
        return view('post', ['posts' => $posts]);
    }

    private function updateLikes($posts){
        
        $likeControllerInstance = new LikeController();
        foreach ($posts as $post) { 
            $post->likes = $likeControllerInstance->getLikes($post->id);
        }
        return $posts;
    }


}
