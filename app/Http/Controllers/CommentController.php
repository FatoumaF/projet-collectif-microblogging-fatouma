<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        $comment = new Comment;
        $comment->postId = $request->postId;
        $comment->content = $request->postContent;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        // Vous pouvez déclencher un événement ici si nécessaire
        event(new CommentEvent($comment));

        return redirect('/post');
    }

    public function fetchComments()
    {
        // Récupérez tous les articles avec leurs commentaires associés
        $posts = Post::with('comments')->get();

        return view('post-comments', compact('posts'));
    }
}

