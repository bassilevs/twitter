@extends('layouts.app')

@section('content')

    <div class="top">
        <div class="profile">
            <div align="left" class="image-lg">
                <img class="cover-img" src="../images/background.png"/>
                <div class="profile-nav-bar">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="info-headings">TWEETS</div>
                            <div class="counts">{{ count($user->tweets) }}</div>
                        </div>
                        <div class="col-md-2">
                            <div class="info-headings">FOLLOWING</div>
                            <div class="counts">{{ count($user->followedUsers) }}</div>
                        </div>
                        <div class="col-md-2">
                            <div class="info-headings">FOLLOWERS</div>
                            <div class="counts">{{ count($user->followers) }}</div>
                        </div>
                        <div class="col-md-2">
                            <div class="info-headings">LIKES</div>
                            <div class="counts">0</div>
                        </div>
                        <div class="col-md-2">
                            <div class="info-headings">MOMENTS</div>
                            <div class="counts">0</div>
                        </div>

                        @if(Auth::user()->id != $user->id)
                            @if(Auth::user()->followedUsers->contains($user))
                                <form method="get" action="{{url('/users/unfollow', $user->id)}}" role="form">
                                    <button type="submit" class="follow-btn btn btn-default">
                                        <span class="glyphicon glyphicon-user"></span> Unfollow</button>
                                </form>
                            @else
                                <form method="get" action="{{url('/users/follow', $user->id)}}" role="form">
                                    <button type="submit" class="follow-btn btn btn-default">
                                        <span class="glyphicon glyphicon-user"></span> Follow</button>
                                </form>
                            @endif
                        @endif

                    </div>
                </div>
                <div class="container-fluid profile-page">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding: 0">
                                    <ul id="all-tweets" class="list-group">
                                        @foreach($user->orderedTweets as $tweet)
                                            <li id="tweet" class="tweet-list list-group-item">

                                                <div class="profile-img-small">
                                                    <img src="../images/default_profile.png">
                                                </div>
                                                <div class="tweet-main">
                                                    <div class="tweet-header">
                                                        <a href="{{$tweet->user->id}}" class="name-surname">
                                                            {{ $tweet->user->first_name}}
                                                            {{ $tweet->user->last_name}}
                                                        </a>
                                                        <a href="{{$tweet->user->id}}" class="email">{{ $tweet->user->email }}</a>
                                                    </div>
                                                    <div class="tweet-content">
                                                        {{ $tweet->body }}
                                                    </div>
                                                    <div class="tweet-footer">
                                                        <button class="glyphicon glyphicon-share-alt" data-toggle="modal" data-target="#commentModal"> </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Body -->
                                                                    <div class="modal-body">

                                                                        <form method="post" action="/tweets/{{$tweet->id}}/comment" class="form-horizontal" role="form">
                                                                            {{ csrf_field() }}
                                                                            <div class="form-group">
                                                                                <div class="col-sm-12">
                                                                                    <input name="body" type="text" class="form-control" id="comment"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer form-group">
                                                                                <button type="button" class="btn btn-default"
                                                                                        data-dismiss="modal">
                                                                                    Close
                                                                                </button>
                                                                                <button type="submit" class="btn btn-primary">
                                                                                    Comment
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button class="glyphicon glyphicon-retweet" data-toggle="modal" data-target="#retweetModal"> </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="retweetModal" tabindex="-1" role="dialog"
                                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            <span class="sr-only">Close</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel">
                                                                            Comment
                                                                        </h4>
                                                                    </div>

                                                                    <!-- Modal Body -->
                                                                    <div class="modal-body">

                                                                        <form method="post" action="/tweets/{{$tweet->id}}/retweet" class="form-horizontal" role="form">
                                                                            {{ csrf_field() }}
                                                                            <div class="form-group">
                                                                                <div class="col-sm-12">
                                                                                    <input name="body" type="text" class="form-control" id="comment"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer form-group">
                                                                                <button type="button" class="btn btn-default"
                                                                                        data-dismiss="modal">
                                                                                    Close
                                                                                </button>
                                                                                <button type="submit" class="btn btn-primary">
                                                                                    Retweet
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button disabled class="glyphicon glyphicon-heart"> </button>
                                                        <button disabled class="glyphicon glyphicon-option-horizontal"> </button>

                                                        @if(Auth::user()->id == $tweet->user_id)
                                                            <button class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal"> </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <!-- Modal Body -->
                                                                        <div class="modal-body">
                                                                            <form method="post" action="/tweets/{{$tweet->id}}/delete" class="form-horizontal" role="form">
                                                                                {{ csrf_field() }}
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <div>Are you sure you want to delete this tweet?</div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="modal-footer form-group">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif
                                                    </div>
                                                </div>
                                            </li>

                                            @foreach($tweet->comments as $comment)
                                                <li class="tweet-list list-group-item comment">
                                                    <div class="connect-line" ></div>
                                                    <div class="profile-img-small">
                                                        <img src="../images/default_profile.png">

                                                    </div>
                                                    <div class="tweet-main">
                                                        <div class="tweet-header">
                                                            <a href="{{$comment->user->id}}" class="name-surname">
                                                                {{ $comment->user->first_name}}
                                                                {{ $comment->user->last_name}}
                                                            </a>
                                                            <a href="{{$comment->user->id}}" class="email">{{ $comment->user->email }}</a>
                                                        </div>
                                                        <div class="tweet-content">
                                                            {{ $comment->body }}
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    Who to follow
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body panel-body-right">
                                    © 2016 Twitter About Help Terms Privacy CookiesAds info Brand Blog Status Apps Jobs Businesses Media Developers
                                </div>
                                <div class="panel-footer panel-footer-right">
                                    Advertise with Twitter
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <img align="left" class="image-profile thumbnail" src="../images/default_profile.png"/>
                <div>kuu</div>
            </div>
        </div>
    </div>

@endsection