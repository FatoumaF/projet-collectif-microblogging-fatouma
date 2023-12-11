<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    public function getFollowers($userId){
        $followers = Follower::where("followed_user_id", $userId)->count();
        return $followers;
    }
    public function followOrUnfollow($userId)
    {
        if ($this->checkFollow($userId)) {
            $this->unfollow($userId);
            return response()->json($data = -1);
        } else {
            $this->follow($userId);
            return response()->json($data = 1);
        }
    }
    public function checkFollow($userId)
    {
        if (Follower::where("followed_user_id", $userId)->where("following_user_id", auth()->user()->id)->count() > 0) {
            return true;
        } else {
            return false;
        }
    }
    private function follow($userId)
    {
        $follow = new Follower;
        $follow->following_user_id = auth()->user()->id;
        $follow->followed_user_id = $userId;
        $follow->save();
    }

    private function unfollow($userId)
    {
        Follower::where('followed_user_id', $userId)->where('following_user_id', auth()->user()->id)->first()->delete();
    }
}
