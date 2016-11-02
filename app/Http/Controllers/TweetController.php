<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TweetController extends Controller
{
    public function get(Tweet $tweet) {
        return view('tweetModal', compact('tweet', $tweet));
    }

    public function add(Request $request)
    {
        $tweet = new Tweet();
        $tweet->body = $request->body;
        Auth::user()->addTweet($tweet);
        return back();
    }

    public function delete(Tweet $tweet)
    {
        DB::table('comments')->where('tweet_id', $tweet->id)->delete();
        DB::table('tweets')->delete($tweet->id);
        return back();
    }

    public function retweet(Request $request, Tweet $tweet)
    {
        $retweet = new Tweet();
        $retweet->body = $request->body;
        $retweet->retweet_id = $tweet->id;
        Auth::user()->addTweet($retweet );
        return back();
    }

    public function comment(Request $request, Tweet $tweet)
    {
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $tweet->addComment($comment);
        return back();
    }

    public function newTweets(Request $request)
    {
        $size = $request->size;
        $tweets = count(Auth::user()->allTweets);
        return response()->json(['response' => $tweets - $size]);
    }
}
