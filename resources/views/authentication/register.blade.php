@extends('layouts.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <div id="content">
        <div class="avatar avatar-register">
            <img src="{{ asset('images/logo.png') }}">
            <div class="logo-title1">
                advifyer
            </div>
            <div class="logo-title2">®
            </div>
            <div class="logo-title3">enterprise editor</div>
        </div>
        <main class="wrap">
            <form class="flp flp-register" action="{{ route('register') }}" method="POST">
                <a class="link-home" href="{{ route('welcome' ) }}"><i id="home-button" class="fa fa-home"
                                                                       aria-hidden="true"></i></a>
                <a class="link-register" href="{{ route('login') }}"><i id="register-button" class="fa fa-sign-in"
                                                                        aria-hidden="true"></i></a>
                <div class="login-title">Registieren</div>
                @if(count($errors)> 0)
                    <div class="error-container">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div>
                    <input type="text" id="username" name="username" required/>
                    <label for="username">User</label>
                </div>
                <div>
                    <input type="email" id="email" name="email" required/>
                    <label for="email">E-Mail</label>
                </div>
                <div>
                    <input type="password" id="password" name="password" required/>
                    <label for="password">Password</label>
                </div>
                <div>
                    <input type="password" id="password_confirmation" name="password_confirmation" required/>
                    <label for="password_confirmation">Retype Password</label>
                </div>
                <div>
                    <button id="login-button" type="submit">Registieren</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </main>
    </div>
@endsection