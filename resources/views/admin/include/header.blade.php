<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/images/favicon.png')}}" />
  <title>MyGreen Plants </title>

  <!-- Bootstrap -->
  <link href="{{ asset('public/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('public/assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('public/assets/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="{{ asset('public/assets/admin/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ asset('public/assets/admin/build/css/custom.min.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  <!-- Datatables -->
  <link href="{{ asset('public/assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
  <script src="{{ asset('public/assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('public/assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin.home')}}" class="site_title"><img src="{{ asset('public/assets/images/favicon.png')}}" height="50px"></i> <span>MyGreen Plants</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">

            <div class="profile_info">
              <h2> <span>Welcome,</span>
                @if (Auth::user())
                {{ Auth::user()->name }}
              </h2>
              @endif
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />