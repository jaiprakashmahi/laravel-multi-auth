
<header class="main-header">
    <a href="" class="logo">
        <span class="logo-mini"><b>DPC</b></span>
        <span class="logo-lg"><b>DPC</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(!Auth::guard('admin')->check() && !Auth::guard('users')->check())
                    <li><a href="{{ url('admin/login') }}">Login</a></li>
                    <li><a href="{{ url('admin/register') }}">Register</a></li>
                @else
                    <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('/img/avatar.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">  {{ Auth::guard('admin')->user()->name }} </span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-header">
                                <img src="{{asset('/img/avatar.jpg')}}" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::guard('admin')->user()->name }}
                                    <small>Admin</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">Sign out</a>
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
                <img src="{{asset('/img/avatar.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              {{  Auth::guard('admin')->user()->name}}


                <a href=""><i class="fa fa-circle text-success"></i></a>
            </div>
        </div>
        <!-- Sidebar Menu -->

        <!-- /.sidebar-menu -->

        <div id="accordian">
            <ul>
                <li>
                    <h3><span class="icon-dashboard"><i class="fa fa-dashboard"></i></span>Dashboard</h3>
                    <ul>

                    </ul>
                </li>
                <!-- we will keep this LI open by default -->
                <li class="active">
                    <h3><span class="icon-tasks"></span>Main Category</h3>
                    <ul>
                        <li><a href="{{route('admin.plane.index')}}">Create Plan</a></li>
                        <li><a href="{{route('admin.sector.index')}}">Create Sector</a></li>
                        <li><a href="{{route('admin.sub-sector.index')}}">Create Subsector</a></li>
                        <li><a href="{{route('admin.schemes.index')}}">Create Scheme</a></li>
                        <li><a href="{{route('admin.talukas.index')}}">Create Taluka</a></li>
                        <li><a href="{{route('admin.village.index')}}">Create Village</a></li>
                        <li><a href="{{route('admin.officers.create')}}">Create Technical <br>Approval Officer</a></li>
                        <li><a href="{{route('admin.officers.index')}}">View Technical <br>Approval Officer</a></li>
                        <li><a href="{{route('admin.administrators.create')}}">Create Administrative <br> Approval Officer </a></li>
                        <li><a href="{{ URL::route('admin.administrators.index')}}">View Administrative <br> Approval Officer</a></li>
                        <li><a href="{{ URL::route('admin.final-officer.create')}}">Create Final Technical<br> Sanction Officer</a></li>
                        <li><a href="{{ URL::route('admin.final-officer.index')}}">View Final Technical<br> Sanction Officer</a></li>
                        <li><a href="{{ URL::route('admin.financial-years.index')}}">Create Financial</a></li>
                    </ul>
                </li>
                <li>
                    <h3><span class="icon-calendar"></span>Works (DPC)</h3>
                    <ul>
                        <li><a href="{{route('admin.work-type.index')}}">Create Work Type</a></li>

                    </ul>
                </li>
                <li>
                    <h3><span class="icon-calendar"></span>Create DPC/Agency</h3>
                    <ul>
                        <li><a href="{{ URL::route('admin.alluser.create')}}">Create DPC/Agency</a></li>
                        <li><a href="{{ URL::route('admin.alluser.index')}}">View DPC/Agency</a></li>
                    </ul>
                </li>




<!--                <li>-->
<!--                    <h3><span class="icon-calendar"></span>Calendar</h3>-->
<!--                    <ul>-->
<!--                        <li><a href="#">Current Month</a></li>-->
<!--                        <li><a href="#">Current Week</a></li>-->
<!--                        <li><a href="#">Previous Month</a></li>-->
<!--                        <li><a href="#">Previous Week</a></li>-->
<!--                        <li><a href="#">Next Month</a></li>-->
<!--                        <li><a href="#">Next Week</a></li>-->
<!--                        <li><a href="#">Team Calendar</a></li>-->
<!--                        <li><a href="#">Private Calendar</a></li>-->
<!--                        <li><a href="#">Settings</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <h3><span class="icon-heart"></span>Favourites</h3>-->
<!--                    <ul>-->
<!--                        <li><a href="#">Global favs</a></li>-->
<!--                        <li><a href="#">My favs</a></li>-->
<!--                        <li><a href="#">Team favs</a></li>-->
<!--                        <li><a href="#">Settings</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
        </div>

        <!-- prefix free to deal with vendor prefixes -->
        <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript" type="text/javascript"></script>

        <!-- jQuery -->
        <script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>


    </section>
</aside>

