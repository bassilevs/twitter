<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(static::class, 'followers', 'follower_id', 'user_id')->withTimestamps();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function orderedTweets()
    {
        return $this->tweets()->orderBy('updated_at', 'desc');
    }

    public function allTweets()
    {
        $tweets = $this->tweets();
        foreach ($this->followedUsers as $user)
        {
            $tweets = $user->tweets()->union($tweets);
        }
        return $tweets->orderBy('updated_at', 'desc');
    }

    public function addTweet(Tweet $tweet)
    {
        return $this->tweets()->save($tweet);
    }
}
