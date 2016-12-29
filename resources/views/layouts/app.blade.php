<!DOCTYPE html>
<html data-ng-app="dpcApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DPC</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/skin-blue.min.css">
    @yield('css')


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">


<div class="wrapper">
    <header class="main-header">
        <a href="/" class="logo">
            <span class="logo-mini"><b>DPC</b></span>
            <span class="logo-lg"><b>DPC</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/avatar.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">  {{ Auth::user()->name }} </span>
                        </a>

                        <ul class="dropdown-menu">



                              <li class="user-header">
                                <img src="img/avatar.jpg" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>{{Auth::user()->type}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>

                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/avatar.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    @if (Auth::guest())
                        Guest
                    @else
                    {{ Auth::user()->name }}


                    <a href=""><i class="fa fa-circle text-success"></i> {{Auth::user()->type}}</a>
                        @endif
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li><a data-ui-sref="home.dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a data-ui-sref="home.works"><i class="fa fa-file-text"></i> <span>Reports</span></a></li>
                <li><a data-ui-sref="home.works.suggest"><i class="fa fa-lightbulb-o"></i> <span>Suggest Works</span></a></li>

                <li class="treeview active">
                    <a href=""><i class="fa fa-link"></i> <span>Works (DPC)</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a data-ui-sref="home.works.create">Create Work</a></li>
                        <li><a data-ui-sref="home.works">Release Funds</a></li>
                        <li><a data-ui-sref="home.works.suggestions">View Citizen Suggestions</a></li>
                    </ul>
                </li>

                <li class="treeview active">
                    <a href=""><i class="fa fa-link"></i> <span>Works (Agency)</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a data-ui-sref="home.works">Assigned Work</a></li>
                        <li><a data-ui-sref="home.works">Work in Progress</a></li>
                        <li><a data-ui-sref="home.works">Completed Work</a></li>
                    </ul>
                </li>

                <li class="treeview active">
                    <a href=""><i class="fa fa-link"></i> <span>Main Category</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a data-ui-sref="home.talukas">Talukas</a></li>
                        <li><a data-ui-sref="home.sectors">Sectors</a></li>
                        <li><a data-ui-sref="home.subsectors"> Subsectors</a></li>
                        <li><a data-ui-sref="home.village"> Villages</a></li>
                    </ul>
                </li>


            </ul>
            <!-- /.sidebar-menu -->
        </section>
    </aside>


    <div class="content-wrapper" style="min-height:95vh; !important">
        @yield('content')
        </div>
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{date('Y')}} <a href="#">DPC</a>.</strong> All rights reserved.
    </footer>

</div><!-- ./wrapper -->

<script src="js/vendor/jQuery-2.1.4.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js" charset="utf-8"></script>

<script src="//cdn.jsdelivr.net/satellizer/0.13.0/satellizer.min.js"></script>
<script src="js/vendor/jquery.slimscroll.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/charts.min.js"></script>
<script src="js/vendor/charts.stackedbarchart.js"></script>

@yield('js')
</body>
</html>



