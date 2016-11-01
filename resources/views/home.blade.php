@extends('layouts.app')

@section('content')

    <div class="container-fluid homepage">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <img id="profile-img" src="images/default_profile.png">
                    <div id="panel-profile" class="panel-heading"></div>
                    <div class="panel-body profile-info-panel">
                        <div id="profile-info-name" class="col-md-12">
                            <a href="users/{{ Auth::user()->id}}" class="name-surname">
                                {{ Auth::user()->first_name}}
                                {{ Auth::user()->last_name}}
                            </a><br>
                            <a href="users/{{Auth::user()->id}}" class="email">{{ Auth::user()->email }}</a>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info-headings">TWEETS</div>
                                <div class="counts">{{ count(Auth::user()->tweets) }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-headings">FOLLOWING</div>
                                <div class="counts">{{ count(Auth::user()->followedUsers) }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-headings">FOLLOWERS</div>
                                <div class="counts">{{ count(Auth::user()->followers) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div id="mid-panel-heading" class="panel-heading container-fluid">

                        <div class="tweet-box">
                            <div class="profile-img-small">
                                <img src="images/default_profile.png">
                            </div>
                            <div class="tweet-textbox">
                                <form method="post" action="tweets">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input id="status" name="body" class="form-control" title="status">
                                    </div>
                                    <div id="tweet-buttons">
                                        <div class="optionals">
                                            <button disabled class="glyphicon glyphicon-camera"> </button>
                                            <button disabled class="glyphicon glyphicon-align-left"> </button>
                                            <button disabled class="glyphicon glyphicon-map-marker"> </button>
                                            <button disabled class="glyphicon glyphicon-facetime-video"> </button>
                                        </div>
                                        <div class="form-group">
                                            <button disabled type="submit" >
                                                <img style="width: 40px; height: auto;" src="/images/tweet-button.png">
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body tweets-panel" style="padding: 0">

                        <ul id="all-tweets" class="list-group">
                            <li id="new-tweets-list-item" class="list-group-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="/" id="new-tweets" class="new-tweets">0</a>
                                    </div>
                                </div>
                            </li>
                            <div id="size" style="display: none" >{{count($tweets)}}</div>

                            @yield('tweets')

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
@endsection
