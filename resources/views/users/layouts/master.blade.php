<!DOCTYPE html>
<html data-ng-app="dpcApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DPC</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/skin-blue.min.css')}}">

    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
          rel = "stylesheet">

    <!--  for data table-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!--  end for data table-->

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <![endif]-->

    <!--calender date-->



    <!--end calender date-->

</head>

<body class="hold-transition skin-blue sidebar-mini fixed">


<div class="wrapper">
    @include('users.layouts.navbar')
    <div class="content-wrapper" style="min-height:95vh; !important">

        <div class="row">
            @include('layouts.flash')
        </div>
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


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="{{asset('/js/vendor/jQuery-2.1.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js" charset="utf-8"></script>


<script src="{{asset('/js/vendor/jquery.slimscroll.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/vendor/charts.min.js')}}"></script>
<script src="{{asset('/js/vendor/charts.stackedbarchart.js')}}"></script>
<script>

    /*jQuery time*/
    $(document).ready(function(){
        $("#accordian h3").click(function(){
            //slide up all the link lists
            $("#accordian ul ul").slideUp();
            //slide down the link list below the h3 clicked - only if its closed
            if(!$(this).next().is(":visible"))
            {
                $(this).next().slideDown();
            }
        })
    })

</script>
<!--  for data table-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

<script>

    $("#plane_id").change(function(e) {

   if (this.value == "" || this.value == "undefined") {
            $("#sector_id").html("");
            $("#sub_sector_id").html("");
            $("#scheme_id").html("");
            $("#sector_id").append($('<option>').text("Select Sector").attr('value', ""));
            $("#sub_sector_id").append($('<option>').text("Select Sub Sector").attr('value', ""));
            $("#scheme_id").append($('<option>').text("Select Scheme").attr('value', ""));

       return;

        }

        $.get("/user/work/sector/" + this.value, function (data) {

            $("#sector_id").html("");
            $("#sub_sector_id").html("");
            $("#scheme_id").html("");
           $("#sector_id").append($('<option>').text("Select Sector").attr('value', ""));
            $("#sub_sector_id").append($('<option>').text("Select Sub Sector").attr('value', ""));
            $("#scheme_id").append($('<option>').text("Select Scheme").attr('value', ""));

            $.each(data, function (i, value) {

                $("#sector_id").append($('<option>').text(value.name).attr('value', value.id));
            });

        });
    });

    $("#sector_id").change(function(e) {


        if (this.value == "" || this.value == "undefined") {

            $("#sub_sector_id").html("");
            $("#scheme_id").html("");

            $("#sub_sector_id").append($('<option>').text("Select Sub Sector").attr('value', ""));
            $("#scheme_id").append($('<option>').text("Select Scheme").attr('value', ""));

            return;

        }
        $.get("/user/work/sub_sector/" + this.value, function (data) {


            $("#sub_sector_id").html("");
            $("#scheme_id").html("");

            $("#sub_sector_id").append($('<option>').text("Select Sub Sector").attr('value', ""));
            $("#scheme_id").append($('<option>').text("Select Scheme").attr('value', ""));

            $.each(data, function (i, value) {

                $("#sub_sector_id").append($('<option>').text(value.name).attr('value', value.id));
            });

        });
    });

    $("#sub_sector_id").change(function(e) {

        if (this.value == "" || this.value == "undefined") {

            $("#scheme_id").html("");
            $("#scheme_id").append($('<option>').text("Select Scheme").attr('value', ""));
            return;

        }
        $.get("/user/work/scheme/" + this.value, function (data) {

            $("#scheme_id").html("");

            $("#scheme_id").append($('<option>').text("Select Scheme").attr('value', ""));

            $.each(data, function (i, value) {

                $("#scheme_id").append($('<option>').text(value.name).attr('value', value.id));
            });

        });
    });

//    http://dpc.aeonlogiciel.com/public

//  location section

    $("#taluka_id").change(function(e) {


        if (this.value == "" || this.value == "undefined") {

            $("#village_id").html("");


            $("#village_id").append($('<option>').text("Select village").attr('value', ""));

            return;

        }
        $.get("/user/work/village/" + this.value, function (data) {

            $("#village_id").html("");

            $("#village_id").append($('<option>').text("Select village").attr('value', ""));

            $.each(data, function (i, value) {

                $("#village_id").append($('<option>').text(value.name).attr('value', value.id));
            });

        });
    });


</script>
<script>


    function ajaxindicatorstart(text)
    {
        if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
            jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="{{asset('/img/ajax-loader.gif')}}"><div>'+text+'</div></div><div class="bg"></div></div>');
        }

        jQuery('#resultLoading').css({
            'width':'100%',
            'height':'100%',
            'position':'fixed',
            'z-index':'10000000',
            'top':'0',
            'left':'0',
            'right':'0',
            'bottom':'0',
            'margin':'auto'
        });

        jQuery('#resultLoading .bg').css({
            'background':'#000000',
            'opacity':'0.7',
            'width':'100%',
            'height':'100%',
            'position':'absolute',
            'top':'0'
        });

        jQuery('#resultLoading>div:first').css({
            'width': '250px',
            'height':'75px',
            'text-align': 'center',
            'position': 'fixed',
            'top':'0',
            'left':'0',
            'right':'0',
            'bottom':'0',
            'margin':'auto',
            'font-size':'16px',
            'z-index':'10',
            'color':'#ffffff'

        });

        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
        jQuery('body').css('cursor', 'wait');
    }

    function ajaxindicatorstop()
    {
        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
        jQuery('body').css('cursor', 'default');
    }
    jQuery(document).ajaxStart(function () {
        //show ajax indicator
        ajaxindicatorstart('loading data.. please wait..');
    }).ajaxStop(function () {
        //hide ajax indicator
        ajaxindicatorstop();
    });

</script>





@yield('script')

</body>
</html>



