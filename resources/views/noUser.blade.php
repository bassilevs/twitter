@extends('layouts.app')

@section('content')

    <div style="width: 100%; height: 120px; background-color: #2487b6">
        <div style="display: flex; color: #ffffff; font-size: 25px; padding-top: 50px; justify-content: center; align-items: center;height: 100%;}">{{ $name }}</div>
    </div>

    <div style="background-color: #f5f8fa; display: flex; justify-content: center; align-items: center; height: calc(100vh - 50px);">
        <img style="width: 25px; position: absolute; padding-bottom: 50px" src="../images/twitter-logo.png"><br>
        <p style="color: #8c8c8c">No results.</p>

    </div>

@endsection
