<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

    private function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->postImage->extension();
        $request->postImage->move(public_path('images'), $imageName);

        return $imageName;
    }

    public function savePost(Request $request)
    {
        
        $imageName = $this->store($request);

        $post = new Post;
        $post->image = "./public/images/$imageName";
        $post->content = $request->postContent;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect("/feed");
    }

    public function getAllPosts()
    {
        $posts = Post::all();
        $posts = $this->updateCommentsLikes($posts);

        return $posts;
    }

    public function getPostsByUserId($id)
    {
        $postsById = Post::where("user_id", $id)->get();
        $postsById = $this->updateCommentsLikes($postsById);

        return $postsById;
    }

    private function updateCommentsLikes($posts)
    {
        foreach ($posts as $post) {
            $post->likes = (new LikeController)->getLikes($post->id);
            $post->liked = (new LikeController)->checkLike($post->id)? 1:-1;
            $post->comments = (new CommentController)->fetchComments($post->id);
        }

        return $posts;
    }
}
