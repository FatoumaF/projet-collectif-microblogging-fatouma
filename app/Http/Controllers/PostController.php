<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\LikeController;

class PostController extends Controller
{

    public function index()
    {
        $posts = $this->getAllPosts();
        $postsById = $this->getPostsByUserId(auth()->user()->id);

        return view('post', ['posts' => $posts, 'postsById' => $postsById]);
    }

    public function feed()
    {
        $posts = $this->getAllPosts();

        return view('feed', ['posts' => $posts]);
    }

    public function savePost(Request $request)
    {
        $post = new Post;
        $post->image = $request->postImage;
        $post->content = $request->postContent;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect("/feed");
    }

    public function getAllPosts()
    {
        $posts = Post::all();
        $posts = $this->updateLikes($posts);

        return $posts;
    }

    public function getPostsByUserId($id)
    {
        $postsById = Post::where("user_id", $id)->get();
        $postsById = $this->updateLikes($postsById);

        return $postsById;
    }

    private function updateLikes($posts)
    {
        foreach ($posts as $post) {
            $post->likes = (new LikeController)->getLikes($post->id);
            $post->liked = (new LikeController)->checkLike($post->id)? 1:-1;
        }

        return $posts;
    }
}
