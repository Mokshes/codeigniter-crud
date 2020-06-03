<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Ci Task </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url()?>docs/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>docs/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>docs/css/animate.min.css" rel="stylesheet">

        <!-- Documentation extras -->

        <link href="<?php echo base_url();?>docs/css/docs.min.css" rel="stylesheet">

        <!-- <script src="<?php echo base_url();?>docs/js/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>

        <!-- bootstrap table  -->
        <link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">
        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <!-- bootstrap table  -->

        <script type="text/javascript" src="<?php echo base_url();?>docs/js/shCore.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>docs/js/shBrushXml.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>docs/css/shCoreDefault.css"/>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/ico" />

    <title>CI Task! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url();?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>/build/css/custom.min.css" rel="stylesheet">

        <style>
            body{
                color: #73879C; background: #F7F7F7;
            }

        </style>
    </head>


    <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="<?php echo base_url();?>admin" class="site_title"><i class="fa fa-paw"></i> <span>CI task!</span></a>
              </div>

              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="<?php
                  // if($this->session->userdata('user_data')['profile']){
                    // echo base_url().USER_PROFILE_PATH.$this->session->userdata('user_data')['profile'];
                    echo base_url()."assets/images/img.jpg";
                  // }else{

                    // echo base_url()."assets/images/img.jpg";
                  // }
                  ?>" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2><?php
                  // echo $this->session->userdata('user_data')['first_name']."  ".$this->session->userdata('user_data')['last_name'];
                  ?></h2>
                </div>
              </div>

              <!-- /menu profile quick info -->

              <br />

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>General</h3>
                  <ul class="nav side-menu">
                    <li><a href="<?php echo base_url(); ?>admin"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/category"><i class="fa fa-first-order"></i> Category </a></li>
                    <li><a href="<?php echo base_url(); ?>admin/sub_category"><i class="fa fa-first-order"></i> Sub Category </a></li>
                    <li><a href="<?php echo base_url(); ?>admin/products"><i class="fa fa-user"></i> Products </a></li>
                  </ul>
                </div>
              </div></div>
              <!-- /sidebar menu -->

              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a> -->
                <!-- <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url();?>admin/logout">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a> -->
              </div>
              <!-- /menu footer buttons -->
            </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav" style="float:right;;">
            <div class="nav_menu" style="background: none; border-bottom: none">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                </nav>
            </div>
          </div>

          <!-- /top navigation -->
