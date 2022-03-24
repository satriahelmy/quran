<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quran Digital</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('asset/adminlte/dist/img/favicon.ico')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('asset/adminlte/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/skins/_all-skins.min.css')}}">
        <!-- Bootstrap token field -->
        <link rel="stylesheet" href="{{asset('asset/tokenfield/dist/css/bootstrap-tokenfield.min.css')}}">

        <!-- Bootstrap token field -->
        <link rel="stylesheet" href="{{asset('asset/tokenfield/dist/css/tokenfield-typeahead.min.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <!-- jQuery 2.1.4 -->
            <script src="{{asset('asset/adminlte/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
            <!-- jQuery 2.1.4 -->
            <script src="{{asset('asset/adminlte/plugins/chartjs/Chart.min.js')}}"></script>
            
            <!-- jQuery UI 1.11.4 -->
            <script src="{{asset('asset/adminlte/plugins/jQueryUI/jquery-ui.min.js')}}"></script>
            <!-- DataTables -->
            <script src="{{asset('asset/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('asset/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
            <style>
                div.dataTables_filter {
                    text-align: right;
                }

                .ui-autocomplete {
                    position: absolute;
                    z-index: 1000;
                    cursor: default;
                    padding: 0;
                    margin-top: 2px;
                    list-style: none;
                    background-color: #ffffff;
                    border: 1px solid #ccc;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                    -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                }
                .ui-autocomplete > li {
                    padding: 3px 10px;
                }
                .ui-autocomplete > li.ui-state-focus {
                    background-color: #3399FF;
                    color:#ffffff;
                }
                .ui-helper-hidden-accessible {
                    display: none;
                }
            </style>

            <!-- Start of calendar -->
            <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/fullcalendar/fullcalendar.min.css')}}">
            <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
            <!-- end of calendar -->

        </head>
        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">

                <header class="main-header">
                    <!-- Logo -->
                    <a href="{{url('')}}" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>Quran</b></span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Quran</b></span>
                    </a>
                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                    </nav>
                </header>