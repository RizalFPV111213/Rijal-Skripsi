<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title> @yield('title')Company Profile</title>

    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('ElaAdmin/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('ElaAdmin/css/style.css')}}">
    
    @yield('css')

</head>

<body>

    @php
        $url = request()->segment(2);
    @endphp

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{$url=='dashboard'?'active':''}}">
                    <a href="{{url('admin/dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li class="{{$url=='categories'?'active':''}}">
                        <a href="{{url('admin/categories')}}"><i class="menu-icon fa fa-list-ul"></i>Categories</a>
                    </li>
                    <li class="{{$url=='articles'?'active':''}}">
                        <a href="{{url('admin/articles')}}"> <i class="menu-icon fa fa-newspaper-o"></i>Articles</a>
                    </li>
                    <li class="{{$url=='articles'?'active':''}}">
                        <a href="{{url('admin/portfolios') }}"> <i class="menu-icon fa fa-newspaper-o"></i>Portfolios</a>
                    </li>
                    <li class="{{$url=='banks'?'active':''}}">
                        <a href="{{url('admin/banks')}}"> <i class="menu-icon fa fa-newspaper-o"></i>Bank</a>
                    </li>
                    <li class="{{$url=='packages'?'active':''}}">
                        <a href="{{url('admin/packages')}}"><i class="menu-icon fa fa-newspaper-o"></i>Package</a>
                    </li>
                    <li class="{{$url=='abouts'?'active':''}}">
                        <a href="{{url('admin/abouts')}}"><i class="menu-icon fa fa-newspaper-o"></i>About</a>
                    </li>
                    <li class="{{$url=='users'?'active':''}}">
                        <a href="{{url('admin/users')}}"><i class="menu-icon fa fa-user"></i>User</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
            <header id="header" class="header">
                <div class="top-left">
                    <div class="navbar-header">
                        {{-- <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('ElaAdmin/images/logo.png')}}" alt="Logo"></a> --}}
                        <a class="navbar-brand text-success" href="{{url('admin/dashboard')}}" > <i class="fa fa-user-circle-o" style="font-size:34px"></i>  <span class="font-weight-bold " style="font-size:26px">Administrator</span></a>
                        <a class="navbar-brand hidden " href="{{url('/')}}"><img src="{{asset('ElaAdmin/images/logo2.png')}}" alt="Logo"></a>
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
                <div class="top-right">
                    <div class="header-menu">
                        <div class="user-area d-flex align-items-center float-right">
                            <a href="{{url('/')}}" class="btn btn-success mr-4" target="_blank">
                                <i class="fa fa-home"></i> View
                            </a>
                            <a href="#" class="dropdown-toggle active d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="{{asset('ElaAdmin/images/admin.jpg')}}" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa-cog"></i>Ganti Password</a>
                                {{-- <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> 
                                    <i class="fa fa-power-off"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form> --}}

                                <div class="nav-link" style="cursor:pointer" onclick="logout()" data-target="#modalLogout" data-toggle="modal"> 
                                    <i class="fa fa-power-off"></i> Logout
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </header>
        <!-- /#header -->
        
        <div class="breadcrumbs mt-3">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1 class="text-success">@yield('breadcrumbs')</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('/'.Request::segment(1))}}">{{Request::segment(1)}}</a></li>
                                    @yield('second-breadcrumb')
                                    @yield('third-breadcrumb')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
            <div class="content">
                <!-- Animated -->
                <div class="animated fadeIn">
                    
                    @yield('content')
                    
                </div>
                <!-- .animated -->
            </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2024 Kieee.
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <strong>Digita.Id</strong></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->


    <!-- Modal Logout -->
        <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-inline">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to end this session?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="" id="url-logout" method="POST" class="d-inline">
                    @csrf 
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    <!-- End Modal Logout -->





    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        // Alert
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
            $(".alert").empty();
        });

        // Logout
        function logout(){ 
            var url = '{{ route("logout") }}';    
            document.getElementById("url-logout").setAttribute("action", url);
            $('#modalLogout').modal();
        }
    </script>
    
    <!--Local Stuff-->
    @yield('script')
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('ElaAdmin/js/main.js')}}"></script>




    
</body>
</html>
