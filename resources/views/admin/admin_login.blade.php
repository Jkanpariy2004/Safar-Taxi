<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<head>
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.css">
  <link rel="stylesheet" href="assets/dist/css/custom.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <style>
    body {
      width: calc(100%);
      height: calc(100%);
      background-image: url('assets/uploads/1644974880_wallpaper.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    #logo-img {
      width: 15em;
      height: 15em;
      object-fit: scale-down;
      object-position: center center;
    }
  </style>
  <div class="login-box">
    <div class="clear-fix my-2"></div>
    <!-- /.login-logo -->
    <div class="card card-outline card-warning">
      <div class="card-header text-center">
        <a href="./" class="h1"><b>Safar Admin Login</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif

        <form id="login-frm" action="dashboard" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" autofocus placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <a href="#">Back to Site</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-warning btn-flat btn-sm w-100">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      end_loader();
    })
  </script>
</body>

</html>