@extends('layouts.public')

@section('content')

<!--<a href="admin/login">Admin Login</a>-->
<!--<a href="user/login">User Login</a>-->
<section class="content-header">
   <center> <h1>
           Welcome To DPC
       </h1>
   </center>
</section>
<!-- Main content -->

<div class="col-xs-12">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                  <h3 class="text-center">Click on Login to continue..</h3>
                    <div class="text-center">
                        <a href="{{url("admin/login")}}" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i>&nbsp;Super Admin Login
                        </a>
                        <a href="{{url("user/login")}}" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i>&nbsp;DPC/Agency Login
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection

