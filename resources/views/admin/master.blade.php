<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- Bootstrap Styles-->
    <link href="{!! asset('admrlinh/css/bootstrap.css') !!}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{!! asset('admrlinh/css/font-awesome.css') !!}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{!! asset('admrlinh/css/custom-styles.css') !!}" rel="stylesheet" />
    <link href="{!! asset('admrlinh/css/style.css') !!}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="{!! asset('admrlinh/js/dataTables/dataTables.bootstrap.css') !!}" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-comments"></i> <strong>MASTER </strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>{!! Auth::user()->username !!}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!! url('logout') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
        <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    

                    <li>
                        <a href="#"><i class="fa fa-user"></i> User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('getAdd') !!}">Add User</a>
                            </li>
                            <li>
                                <a href="{!! route('getListUser') !!}">List User</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-list"></i> Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('getCateAdd') !!}">Add Category</a>
                            </li>
                            <li>
                                <a href="{!! route('getCateList') !!}">List Category</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i> News<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('getNewsAdd') !!}">Add News</a>
                            </li>
                            <li>
                                <a href="{!! route('getNewsList') !!}">List News</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="fa fa-fw fa-file"></i> Send Mail</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                @include('admin.blocks.flash')
                @yield('content')

                <!-- /. ROW  -->
                
            </div>
            <footer><p>copyright</p></footer>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{!! asset('admrlinh/js/jquery-1.10.2.js') !!}"></script>
    <!-- Bootstrap Js -->
    <script src="{!! asset('admrlinh/js/bootstrap.min.js') !!}"></script>
     
    <!-- Metis Menu Js -->
    <script src="{!! asset('admrlinh/js/jquery.metisMenu.js') !!}"></script>
    
     <!-- DATA TABLE SCRIPTS -->
    <script src="{!! asset('admrlinh/js/dataTables/jquery.dataTables.js') !!}"></script>
    <script src="{!! asset('admrlinh/js/dataTables/dataTables.bootstrap.js') !!}"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

    <!-- Custom Js -->
    <script src="{!! asset('admrlinh/js/custom-scripts.js') !!}"></script>
    <script src="{!! asset('admrlinh/js/custom.js') !!}"></script>

</body>

</html>