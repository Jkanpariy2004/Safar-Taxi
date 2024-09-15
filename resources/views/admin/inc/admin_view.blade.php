<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Safar</title>
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/adminlte.css">
  <link rel="stylesheet" href="/assets/dist/css/custom.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- <style type="text/css">
    </style> -->

  <!-- jQuery -->
  <script src="/assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="/assets/plugins/toastr/toastr.min.js"></script>
  <script>
  </script>
  <script src="/assets/dist/js/script.js"></script>
  <style>
    .user-img {
      position: absolute;
      height: 27px;
      width: 27px;
      object-fit: cover;
      left: -7%;
      top: -12%;
    }

    .btn-rounded {
      border-radius: 50px;
    }
  </style>

</head>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-light text-sm shadow">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Admin</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> -->
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <div class="btn-group nav-link">
            <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span><img src="/assets/uploads/1624240500_avatar.png" class="img-circle elevation-2 user-img" alt="User Image"></span>
              <span class="ml-3">admin</span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="#"><span class="fa fa-user"></span> My Account</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="admin_logout"><span class="fas fa-sign-out-alt"></span> Logout</a>
            </div>
          </div>
        </li>
        <li class="nav-item">

        </li>
        <!--  <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
          </li> -->
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-warning elevation-4 sidebar-no-expand">
      <!-- Brand Logo -->
      <a href="admin_dashboard" class="brand-link text-sm text-dark" style="background-color:#F77D0A">
        <img src="/assets/uploads/1644974880_logo.png" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.6rem;height: 1.6rem;max-height: unset">
        <span class="brand-text font-weight-light">Safar</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
        <div class="os-resize-observer-host observed">
          <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
          <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
        <div class="os-padding">
          <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
            <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
              <!-- Sidebar user panel (optional) -->
              <div class="clearfix"></div>
              <!-- Sidebar Menu -->
              <nav class="mt-4">
                <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item dropdown">
                    <a href="admin_dashboard" class="nav-link nav-home {{Request::is('admin_dashboard') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="cab_list" class="nav-link nav-cabs {{Request::is('cab_list') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-car"></i>
                      <p>
                        Cab List
                      </p>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="users" class="nav-link nav-clients {{Request::is('users') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Registered Clients
                      </p>
                    </a>
                  </li>
                  <!-- <li class="nav-item dropdown">
                    <a href="users" class="nav-link nav-clients">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Car Type
                      </p>
                    </a>
                  </li> -->
                  <li class="nav-item dropdown">
                    <a href="/show-package" class="nav-link nav-clients {{Request::is('show-package') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-car"></i>
                      <p>
                        Tour Packages
                      </p>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="/show-package-booking" class="nav-link nav-clients {{Request::is('show-package-booking') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-car"></i>
                      <p>
                        Package Booking
                      </p>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="/most-visited" class="nav-link nav-clients {{Request::is('most-visited') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-city"></i>
                      <p>
                        Most Visited Place
                      </p>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="/contact-show" class="nav-link nav-clients {{Request::is('contact-show') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-newspaper"></i>
                      <p>
                        Contact Us
                      </p>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="/driver-show" class="nav-link nav-clients {{Request::is('driver-show') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Driver Details
                      </p>
                    </a>
                  </li>
                  <!-- <li class="nav-item dropdown">
                    <a href="/book-package" class="nav-link nav-clients">
                      <i class="nav-icon fas fa-car"></i>
                      <p>
                        Tour Packages Booking
                      </p>
                    </a>
                  </li> -->
                  <!--<li class="nav-item dropdown">-->
                  <!--  <a href="#" class="nav-link nav-bookings">-->
                  <!--    <i class="nav-icon fas fa-tasks"></i>-->
                  <!--    <p>-->
                  <!--      Booking List-->
                  <!--    </p>-->
                  <!--  </a>-->
                  <!--</li>-->
                  <!--<li class="nav-header">Maintenance</li>-->
                  <!--<li class="nav-item dropdown">-->
                  <!--  <a href="#" class="nav-link nav-categories">-->
                  <!--    <i class="nav-icon fas fa-th-list"></i>-->
                  <!--    <p>-->
                  <!--      Category List-->
                  <!--    </p>-->
                  <!--  </a>-->
                  <!--</li>-->
                  <!--<li class="nav-item dropdown">-->
                  <!--  <a href="#" class="nav-link nav-user_list">-->
                  <!--    <i class="nav-icon fas fa-users-cog"></i>-->
                  <!--    <p>-->
                  <!--      User List-->
                  <!--    </p>-->
                  <!--  </a>-->
                  <!--</li>-->
                  <!--<li class="nav-item dropdown">-->
                  <!--  <a href="#" class="nav-link nav-system_info">-->
                  <!--    <i class="nav-icon fas fa-cogs"></i>-->
                  <!--    <p>-->
                  <!--      Settings-->
                  <!--    </p>-->
                  <!--  </a>-->
                  <!--</li>-->
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
          </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
          <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
          </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
          <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
          </div>
        </div>
        <div class="os-scrollbar-corner"></div>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- /.navbar -->

    <div class="content-wrapper pt-3" style="min-height: 567.854px;">

      <!-- Main content -->
      <section class="content">
        @section('main-content')
        @show

      </section>
      <!-- /.content -->
      <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header">
              <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body">
              <div id="delete_content"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm rounded-0" id='confirm' onclick="">Continue</button>
              <button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm rounded-0" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
              <button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height  modal-md" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fa fa-arrow-right"></span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content rounded-0">
            <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
            <img src="" alt="">
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        window.viewer_modal = function($src = '') {
          start_loader()
          var t = $src.split('.')
          t = t[1]
          if (t == 'mp4') {
            var view = $("<video src='" + $src + "' controls autoplay></video>")
          } else {
            var view = $("<img src='" + $src + "' />")
          }
          $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
          $('#viewer_modal .modal-content').append(view)
          $('#viewer_modal').modal({
            show: true,
            backdrop: 'static',
            keyboard: false,
            focus: true
          })
          end_loader()

        }
        window.uni_modal = function($title = '', $url = '', $size = "") {
          start_loader()
          $.ajax({
            url: $url,
            error: err => {
              console.log()
              alert("An error occured")
            },
            success: function(resp) {
              if (resp) {
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if ($size != '') {
                  $('#uni_modal .modal-dialog').addClass($size + '  modal-dialog-centered')
                } else {
                  $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                }
                $('#uni_modal').modal({
                  show: true,
                  backdrop: 'static',
                  keyboard: false,
                  focus: true
                })
                end_loader()
              }
            }
          })
        }
        window._conf = function($msg = '', $func = '', $params = []) {
          $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
          $('#confirm_modal .modal-body').html($msg)
          $('#confirm_modal').modal('show')
        }
      })
    </script>
    <footer class="main-footer text-sm">
      <strong>Copyright © <?php echo date('Y') ?>.
        <!-- <a href=""></a> -->
      </strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>xcv (by: <a href="mailto:oretnom23@gmail.com" target="blank">oretnom23</a> )</b> v1.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="/assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="/assets/plugins/sparklines/sparkline.js"></script>
  <!-- Select2 -->
  <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
  <!-- JQVMap -->
  <script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="/assets/plugins/moment/moment.min.js"></script>
  <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- overlayScrollbars -->
  <!-- AdminLTE App -->
  <script src="/assets/dist/js/adminlte.js"></script>
  <div class="daterangepicker ltr show-ranges opensright">
    <div class="ranges">
      <ul>
        <li data-range-key="Today">Today</li>
        <li data-range-key="Yesterday">Yesterday</li>
        <li data-range-key="Last 7 Days">Last 7 Days</li>
        <li data-range-key="Last 30 Days">Last 30 Days</li>
        <li data-range-key="This Month">This Month</li>
        <li data-range-key="Last Month">Last Month</li>
        <li data-range-key="Custom Range">Custom Range</li>
      </ul>
    </div>
    <div class="drp-calendar left">
      <div class="calendar-table"></div>
      <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-calendar right">
      <div class="calendar-table"></div>
      <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
  </div>
  <div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>


  </div>


  <script>
    // $(document).ready(function() {
    //   var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    //   var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    //   page = page.replace('/', "_");
    //   if (s != '')
    //     page = page + '_' + s;

    //   if ($('.nav-link.nav-' + page).length > 0) {
    //     $('.nav-link.nav-' + page).addClass('active')
    //     if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
    //       $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
    //       $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
    //     }
    //     if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
    //       $('.nav-link.nav-' + page).parent().addClass('menu-open')
    //     }

    //   }

    // })
  </script>


</body>

</html>