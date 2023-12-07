<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function getLikes($postId)
    {
        $likes = Like::where("post_id", $postId)->count();
        return $likes;
    }
    public function likeOrDislike($postId)
    {
        if ($this->checkLike($postId)) {
            $this->disLikeIt($postId);
            return response()->json($data = -1);
        } else {
            $this->likeIt($postId);
            return response()->json($data = 1);
        }
    }
    public function checkLike($postId)
    {
        if (Like::where("post_id", $postId)->where("user_id", auth()->user()->id)->count() > 0) {
            return true;
        } else {
            return false;
        }
    }
    private function likeIt($postId)
    {
        $like = new Like;
        $like->user_id = auth()->user()->id;
        $like->post_id = $postId;
        $like->save();
    }

    private function dislikeIt($postId)
    {
        Like::where('post_id', $postId)->where('user_id', auth()->user()->id)->first()->delete();
    }
}
