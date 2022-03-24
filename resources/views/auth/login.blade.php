<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cost Controlling App</title>
  <link rel="shortcut icon" type="image/x-icon" href="asset/adminlte/adminlte/dist/img/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('asset/adminlte/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition penggunaan-page">
        <div class="login-box">
          <div class="login-logo">
            <!-- <b>COCO Apps</b> -->
            <img src="{{asset('asset/logo_coco.png')}}" width="75%">
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Login untuk mengakses</p>
            <form action="{{url('/login')}}" method="post">
              @csrf
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="username" name="username" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                </div><!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
              </div>
            </form>

          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
          <!-- jQuery 2.1.4 -->
          <script src="{{asset('asset/adminlte/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
          <!-- Bootstrap 3.3.5 -->
          <script src="{{asset('asset/adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
          <!-- iCheck -->
          <script src="{{asset('asset/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
          <script>
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
              });
            });
          </script>
        </body>
        </html>
