<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('adminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminLTE/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminLTE/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script>
    {{-- My JS file --}}
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminLTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src=""></script>
    <script src="{{ asset('adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminLTE/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('adminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminLTE/dist/js/pages/dashboard.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('adminLTE/plugins/morris/morris.min.js') }}"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBJYdWm9OMWzf1bQSZy7JauN7hbsV3wM-8"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img id="dashboard-logo" src="{{ asset('images/logo.png') }}"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Advifyer</span>
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown tasks-menu flag-button">
                        <a href="{{ route('changeLanguage', 'en') }}">
                            <img id="flag-en" src="{{ asset('images/lang/uk.png') }}">
                        </a>
                    </li>
                    <li class="dropdown tasks-menu flag-button">
                        <a href="{{ route('changeLanguage', 'de') }}">
                            <img id="flag-de" src="{{ asset('images/lang/de.png') }}">
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{--<img src="{{ asset('images/avatar/default.jpg') }}" class="user-image" alt="User Image">--}}
                            @if($user->avatar == null)
                                <img src="{{ asset("images/avatar/default.jpg") }}" class="user-image"
                                     alt="User Image">
                            @else
                                <img src="{{ asset("images/avatar/$user->avatar") }}" class="user-image"
                                     alt="User Image">
                            @endif
                            <span class="hidden-xs">@if($user->first_name AND $user->last_name) {{ $user->first_name . ' ' . $user->last_name }} @else
                                    No Name @endif</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if($user->avatar == null)
                                    <img src="{{ asset('images/avatar/default.jpg') }}" class="img-circle"
                                         alt="User Image">
                                @else
                                    <img src="{{ asset("images/avatar/$user->avatar") }}" class="img-circle"
                                         alt="User Image">
                                @endif
                                <p>@if($user->first_name AND $user->last_name) {{ $user->first_name . ' ' . $user->last_name }}
                                    - {{ $company->name }} @else {{ $company->name }} @endif

                                    <small>@lang('index.memberSince') {{ $user->created_at->format('M Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('editProfile') }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image companyImage">
                    @if($company->avatar == null)
                        <img src="{{ asset('images/avatar/company_default.jpg') }}" class="img-circle"
                             alt="User Image">
                    @else
                        <img src="{{ asset("images/avatar/$company->avatar") }}" class="img-circle"
                             alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ $company->name }}</p>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i
                                class="fa fa-tachometer"></i> <span>@lang('index.dashboard')</span></a></li>
                <li class="{{ Request::is('codes/new') ? 'active' : '' }}"><a href="{{ route('newCode') }}"><i
                                class="fa fa-barcode"></i> <span>@lang('index.addCodes')</span></a></li>
                <li class="{{ Request::is('something') ? 'active' : '' }}"><a href="#"><i class="fa fa-th"></i>
                        <span>@lang('index.templateEditor')</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-advifyer">Soon</small>
                        </span></a></li>
                <li class="{{ Request::is('products') ? 'active' : '' }}"><a href="{{ route('viewProducts') }}"><i
                                class="fa fa-pencil"></i> <span>@if (Auth::check() && $user->role_id == 1)
                                @lang('index.products') @else @lang('index.productEditor') @endif</span></a></li>
                <li class="{{ Request::is('codes') ? 'active' : '' }}"><a href="{{ route('viewCodes') }}"><i
                                class="fa fa-database"></i> <span>@lang('index.viewCodes')</span></a></li>
                {{--<li class="{{ Request::is('licence') ? 'active' : '' }}"><a href="#"><i--}}
                                {{--class="fa fa-file-text-o"></i> <span>@lang('index.licenses')</span>--}}
                        {{--<span class="pull-right-container">--}}
                            {{--<small class="label pull-right bg-advifyer">Soon</small>--}}
                        {{--</span></a></li>--}}
                <li class="{{ Request::is('payments') ? 'active' : '' }}">
                    <a href="{{ route('viewPayments') }}">
                        <i class="fa fa-money"></i>
                        <span>@lang('index.payment')</span>
                    </a>
                </li>
                <li class="{{ Request::is('profile/edit') ? 'active' : '' }}"><a href="{{ route('editProfile') }}"><i
                                class="fa fa-university"></i>
                        <span>@if($user->role_id == 1) @lang('index.profile') @else @lang('index.companyProfile') @endif</span></a>
                </li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('viewContact') }}"><i
                                class="fa fa-phone"></i> <span>@lang('index.contact')</span></a></li>
                <li class="{{ Request::is('store') ? 'active' : '' }}"><a href="{{ route('viewStore') }}"><i
                                class="fa fa-shopping-cart"></i> <span>@lang('index.store')</span></a></li>
                <li><a href="{{ route('logout') }}"><i
                                class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

@yield('content')
<!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version </b>1.0.0
        </div>
        <strong>Copyright &copy; 2017 <a href="http://beta.advifyer.com">Advifyer </a></strong>
    </footer>
</body>
</html>