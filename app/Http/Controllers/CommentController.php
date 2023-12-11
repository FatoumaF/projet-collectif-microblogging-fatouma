<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        $comment = new Comment;
        $comment->post_id = $request->postId;
        $comment->content = $request->postContent;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return redirect()->back();
    }

    public function fetchComments($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        $comments = $this->updateComment($comments);

        return $comments;
    }
    private function updateComment($comments){
        foreach($comments as $comment){
            $comment->userName = User::find($comment->user_id)->name;
        }
        return $comments;
    }
}

