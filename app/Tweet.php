<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class Tweet extends Model
{

    protected $fillable = ['body', 'retweet_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment(Comment $comment)
    {
        return $this->comments()->save($comment);
    }

    public function getRetweet()
    {
        $tweet = Tweet::where('id', $this->retweet_id)->first();
//        dd($tweet);
        return $tweet;
    }
}
