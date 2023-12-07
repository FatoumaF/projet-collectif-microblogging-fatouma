<?php

namespace App\Http\Controllers;
use App\Models\Comment;


use Illuminate\Http\Request;    

class CommentController extends Controller
{
    //
    // public funtion index()
    // {
    //     return view('comment');
    // }
    public function fetchComments()
    {
        $comments = Comment ::all();
        return view('comment', ['comments' =>$comments]) ;
    }
    public function store(Request $request)
    {
        $ccomment = Comment :: create($request->all());
        event (new CommentEvent($comment));
        return $comment
    }
}
