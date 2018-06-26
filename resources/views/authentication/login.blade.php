@extends('layouts.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <div id="content">
        <div class="avatar">
            <img src="{{ asset('images/logo.png') }}">
            <div class="logo-title1">
                advifyer
            </div>
            <div class="logo-title2">®
            </div>
            <div class="logo-title3">enterprise editor</div>
        </div>
        <main class="wrap">
            <form class="flp" action="{{ route('login') }}" method="POST">
                <a class="link-home" href="{{ route('welcome' ) }}"><i id="home-button" class="fa fa-home"
                                                                       aria-hidden="true"></i></a>
                <a class="link-register" href="{{ route('register') }}"><i id="register-button" class="fa fa-user-plus"
                                                                           aria-hidden="true"></i></a>
                <div class="login-title">Anmelden</div>
                @if(count($errors)> 0)
                    <div class="error-container">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div>
                    <input required type="text" id="username" name="username"/>
                    <label for="username">User</label>
                </div>
                <div>
                    <input required type="password" id="password" name="password"/>
                    <label for="password">Password</label>
                </div>
                <div>
                    <div class="forgot-password"><a href="#">Passwort vergessen?</a></div>
                    <button id="login-button" type="submit">Anmelden</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </main>
    </div>
@endsection