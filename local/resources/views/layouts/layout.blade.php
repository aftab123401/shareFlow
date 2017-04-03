<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="expires" content="0">
        <title>Stock Market</title>
        <link rel="icon" href="{{'OAS'}}"/>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/timeline.css')}}">
        <link rel="stylesheet" href="{{asset('css/nepali.datepicker.v2.2.min.css')}}">

        <!-- Font Awesome -->

        <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!-- Ionicons -->


        <script  src="{{asset('js/newjs/jquery-2.2.3.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
        <script  src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        <script  src="{{asset('js/newjs/calculation.js')}}"></script>
        <script  src="{{asset('js/newjs/main.js')}}"></script>
        <script  src="{{asset('js/jszip.js')}}"></script>
        <script  src="{{asset('js/newjs/modernizr.js')}}"></script>

    </head>

    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wr">
            <div class="col-md-12" id="header">
                @include('common.header')
            </div><br/><br/><br/>

            <div class="col-md-12">
                <div class="content-wrapper">

                    <br/><br/>
                    <!-- Main content -->
                    <section class="content">
                        <div class="callout csallout-info">

                            @yield('content')
                            <br/><br/>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                @include('common.footer')
            </div>
        </div>

    </body>
</html>


