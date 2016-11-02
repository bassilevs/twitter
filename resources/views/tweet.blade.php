@extends('home', ['tweets' => $tweets])

@section('tweets')
    @foreach($tweets as $tweet)
        <li id="tweet{{$tweet->id}}" class="tweet-list list-group-item">
            <div class="profile-img-small">
                <img src="images/default_profile.png">
            </div>
            <div class="tweet-main">
                <div class="tweet-header">
                    <a href="users/{{$tweet->user->id}}" class="name-surname">
                        {{ $tweet->user->first_name}}
                        {{ $tweet->user->last_name}}
                    </a>
                    <a href="users/{{$tweet->user->id}}" class="email">{{ $tweet->user->email }}</a>
                </div>
                <div class="tweet-content">
                    <div>{{ $tweet->body }}</div>
                    @if($tweet->retweet_id != null)
                        {{-- */$retweet = $tweet->getRetweet()/* --}}
                        <?php $retweet = $tweet->getRetweet();?>
                        <div class="retweet-panel panel panel-default">
                            <div class="retweet-panel-body panel-body">
                                <div id="profile-img-retweet" class="profile-img-small">
                                    <img src="images/default_profile.png">
                                </div>
                                <div class="tweet-main retweet-main">
                                    <div class="tweet-header">
                                        <a href="users/{{$tweet->user->id}}" class="name-surname">
                                            {{ $tweet->user->first_name }}
                                            {{ $tweet->user->last_name }}
                                        </a>
                                        <a href="users/{{$tweet->user->id}}" class="email">{{ $tweet->user->email }}</a>
                                    </div>
                                    <div class="tweet-content">
                                        <div>{{ $retweet->body }}</div>
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

                                                        <form method="post" action="/tweets/{{$retweet->id}}/comment" class="form-horizontal" role="form">
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
                                                            Retweet
                                                        </h4>
                                                    </div>
                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <form method="post" action="/tweets/{{$retweet->id}}/retweet" class="form-horizontal" role="form">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input name="body" type="text" class="form-control" id="retweet"/>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                                        Retweet
                                    </h4>
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form method="post" action="/tweets/{{$tweet->id}}/retweet" class="form-horizontal" role="form">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input name="body" type="text" class="form-control" id="retweet"/>
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
            <li class="comment tweet-list list-group-item">
                <div class="connect-line" ></div>
                <div class="profile-img-small">
                    <img src="images/default_profile.png">
                </div>
                <div class="tweet-main">
                    <div class="tweet-header">
                        <a href="users/{{$comment->user->id}}" class="name-surname">
                            {{ $comment->user->first_name}}
                            {{ $comment->user->last_name}}
                        </a>
                        <a href="users/{{$comment->user->id}}" class="email">{{ $comment->user->email }}</a>
                    </div>
                    <div class="tweet-content">
                        {{ $comment->body }}
                    </div>
                </div>
            </li>
        @endforeach
    @endforeach
@endsection