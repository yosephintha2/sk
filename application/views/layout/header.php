<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/toastr/toastr.min.css">

        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <!--<link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">-->
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">

        <!-- jQuery -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js"></script>

        <!-- ChartJS -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>

        <!-- daterangepicker -->
        <!-- <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
        -->
        <!-- DataTables  & Plugins -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/toastr/toastr.min.js"></script>
        <!-- Summernote -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <!-- <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/js/demo.js"></script> -->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script> -->



    </head>

    <style type="text/css">
        /*.help-block{color: red;}*/
        .has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,.has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,.has-error.radio label,.has-error.radio-inline label{
            color:#a94442
        }
        .has-error .form-control{
            border-color:#a94442;
            -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow:inset 0 1px 1px rgba(0,0,0,.075)
        }
        .has-error .form-control:focus{
            border-color:#843534;
            -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;
            box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
        }
        .has-error .input-group-addon{
            color:#a94442;
            background-color:#f2dede;
            border-color:#a94442
        }
        .has-error .form-control-feedback{
            color:#a94442
        }

        .page-item.active .page-link {
            background-color: #17a2b8 !important;
            border: #17a2b8 !important;
        }
    </style>
    <style type="text/css">
        #hidden {
            display:none
        }
        #progress-bar {
            position:fixed;
            z-index:9999;
            top:0;
            left:0;
            width:0;
            height:2px;
            background-color:#4aa6e7
        }
        #loading {
            position:fixed;
            z-index:999;
            top:0;
            left:0;
            width:100%;
            height:100%;
            opacity: 0.5;
            background:#fff url(<?php echo base_url('assets/images/loading-image.gif'); ?>) center no-repeat
        }
        .style1 {
            color: #FF0000;
            font-size: 10px;
        }
    </style>

    <body class="hold-transition sidebar-mini layout-navbar-fixed">

        <div id="hidden">
            <div id="progress-bar"></div><div id="loading"></div>
        </div>
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <!-- <li class="nav-item d-none d-sm-inline-block">
                      <a href="../../index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                      <a href="#" class="nav-link">Contact</a>
                    </li> -->
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-info">
                                <img src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li class="user-body">
                              <div class="row">
                                <div class="col-4 text-center">
                                  <a href="#">Followers</a>
                                </div>
                                <div class="col-4 text-center">
                                  <a href="#">Sales</a>
                                </div>
                                <div class="col-4 text-center">
                                  <a href="#">Friends</a>
                                </div>
                              </div> 
                            </li> -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Ganti Password</a>
                                <a href="#" class="btn btn-default btn-flat float-right">Sign out</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <!--  <li class="nav-item">
                       <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                         <i class="fas fa-th-large"></i>
                       </a>
                     </li> -->
                </ul>
            </nav>
            <!-- /.navbar -->

            <?php $this->load->view('layout/sidebar'); ?>