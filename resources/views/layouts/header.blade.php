<html>
<head>
    <title>@yield('title')</title>

    {{-- CSS --}}
    <link rel='icon' type='image/x-icon' href='{{ asset('favicon.ico') }}'/>
    <link rel="stylesheet" href="{{asset('css/main.css')}}" media="screen" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}" media="screen" type="text/css">
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}" media="screen" type="text/css">
    <link rel="stylesheet" href="{{asset('jqueryui/jquery-ui.css')}}" media="screen" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" media="screen" type="text/css">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" media="screen" type="text/css">
    <link rel="stylesheet" href="{{asset('js/morris/morris-0.4.3.min.css')}}" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    {{-- JavaScript --}}
    <script src="https://code.jquery.com/jquery-3.2.0.min.js" type="text/javascript"></script>
    <script src="{{ asset('jqueryui/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</head>

<body>
@yield('content')