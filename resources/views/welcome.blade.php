@extends('layouts.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <div id="home-container">
        <div id="home-description">There is much to discover.</div>
        <div id="home-description2">
            <div>we make advertisements visible</div>
            <div>where you would never expect it.</div>
        </div>
        <div id="home-logo">
            <a href="https://twitter.com/advifyer"><i id="home-twitter-img" class="fa fa-twitter" aria-hidden="true"></i></a>
            <div class="loader" id="loader-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a id="home-logo-img" href="{{ route('login') }}"><img src="{{asset('images/logo.png')}}"></a>
            <div class="loader" id="loader-right">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="mailto:hello@advifyer.com"><i id="home-email-img" class="fa fa-envelope" aria-hidden="true"></i></a>
        </div>
        <div id="footer-container">
            <a href="{{ route('login') }}">
                <button>Join us now!</button>
            </a>
        </div>
    </div>
@endsection