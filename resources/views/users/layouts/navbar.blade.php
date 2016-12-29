
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

<!--                @if (Auth::guest())-->
<!--                    <li><a href="{{ url('user/login') }}">Login</a></li>-->
<!--                    <li><a href="{{ url('user/register') }}">Register</a></li>-->
<!--                @else-->
                    <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('/img/avatar.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">  {{ Auth::user()->name }} </span>
                        </a>

                        <ul class="dropdown-menu">

                            <li class="user-header">
                                <img src="{{asset('/img/avatar.jpg')}}" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>{{Auth::user()->usertype}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('user/logout') }}" class="btn btn-default btn-flat">Sign out</a>
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
                {{ Auth::user()->name }}


                <a href=""><i class="fa fa-circle text-success"></i> {{Auth::user()->usertype}}</a>
            </div>
        </div>
        @if(Auth::user()->usertype=="DPC")

        <!-- Sidebar Menu -->
        <div id="accordian">
            <ul>
                <li>
                    <h3><span class="icon-dashboard"><i class="fa fa-dashboard"></i></span>Dashboard</h3>
                    <ul>

                    </ul>
                </li>


                <!-- we will keep this LI open by default -->
                <li class="active">
                    <h3><i class="fa fa-link"></i><span class="icon-tasks"></span>Works (DPC)</h3>


                    <ul>
                        <li><a href="{{URL::route('user.work.create')}}">Create Work/Assign</a></li>

<!--                        <li><a href="{{URL::route('user.work_assign.create')}}">Work Release</a></li>-->
<!--                        <li><a href="{{URL::route('user.work_assign.index')}}">View Work Release</a></li>-->
                    </ul>
                </li>

                <li class="active">
                    <h3><i class="fa fa-link"></i><span class="icon-tasks"></span>Release (Funds)</h3>
                    <ul>
                        <li><a href="{{URL::route('user.work.index')}}">Allocated</a></li>
                        <li><a href="{{URL::route('user.work.partial',2)}}">Partial</a></li>
                        <li><a href="{{URL::route('user.work.full',3)}}">Full</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-menu -->

        @else
        <div id="accordian">
            <ul>
                <li>
                    <h3><span class="icon-dashboard"><i class="fa fa-dashboard"></i></span>Dashboard</h3>
                    <ul>

                    </ul>
                </li>


                <!-- we will keep this LI open by default -->
                <li class="active">
                    <h3><i class="fa fa-link"></i><span class="icon-tasks"></span>Works (Agency)</h3>
                    <ul>
                        <li><a href="{{URL::Route('user.work_agency.index')}}">Assigned Works</a></li>
                        <li><a href="{{URL::Route('user.work_agency.AgencyProgress',1)}}">Work In Progress</a></li>
                        <li><a href ="{{URL::Route('user.work_agency.WorkComplete',2)}}">Work Completed</a></li>

                    </ul>
                </li>
                <li class="active">
                    <h3><i class="fa fa-link"></i><span class="icon-tasks"></span>Funds</h3>
                    <ul>
                        <li><a href="{{URL::route('user.work_agency.AgencyPartial',2)}}">Partial</a></li>
                        <li><a href="{{URL::route('user.work_agency.AgencyFull',3)}}">Full</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-menu -->
        @endif



    </section>
</aside>

