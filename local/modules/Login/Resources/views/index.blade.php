<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <!-- Font Awesome -->
       <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
       <link rel="stylesheet" href="{{asset('css/newcss/AdminLTE.min.css')}}">

      
    </head>
    <body class="hold-transition login-page">

        <div class="login-box">
            <div class="login-logo">
                <b>Stock Market</b>
            </div>
            <!-- /.login-logo -->
            <div class="box box-primary" style="padding-left: 40px;padding-right: 40px">
                <center><t style="font-size: 30px;color: #367FA9;"><b>Login</b></t></center>
                <hr/>
                <div id="loginError"></div>
                @if(Session::has('error_message'))
                <div class="alert alert-danger"><span class="fa fa-times"></span><em> {!! session('error_message') !!}</em></div>
                @endif
                <div >


                    <div class="box-body">

                        <form class="form-horizontal" id="login" role="form" method="post" action="{{route('login.login')}}">
                            {{ csrf_field() }}
                            <!-- Date -->
                            <div class="form-group">
                                <label>Email:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" name="email" class="form-control" placeholder="example@gmail.com" autofocus="autofocus" id="user_email" value="{{Input::old('email')}}">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Password:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="******" id="user_password">
                                </div>
                                <!-- /.input group -->
                            </div>


                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="ace" name="remember_me" value="yes" /> Remember Me
                                </label>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-mini btn-primary" id="loginBtnn">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->

                </div>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script type="text/javascript" src="{{url('backend/js/newjs/jquery-2.2.3.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('backend/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});

jQuery(function ($) {

    $("#loginBtnn").on("click", function () {
        var email = $("#user_email").val();
        var pass = $("#user_password").val();
       
        if (email == "" || pass == "")
        {
            $('.spinner-ajax').hide();
            $('#loginError').html("<div class='alert alert-block alert-danger alert-popup'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>Please fill all the fields.</div>");
            return false;

        }
    });
});
        </script>
    </body>
</html>
<style type="text/css">
    .box-primary{
        -webkit-box-shadow: 10px 10px 36px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 36px 0px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 36px 0px rgba(0,0,0,0.75);
    }
</style>