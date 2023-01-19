<?php
include "../lib/Session.php";
Session::checkSessions();

?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NFTMUSK Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/img/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <style media="screen">
      #sendMail{
        margin-bottom:15px;
        float: right;
      }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="/admin/admin.php">NFTMUSK Admin</a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                                <ul class="collapse">
                                    <!-- <li class="active"><a href="/dashboard/home.php">Dashboard</a></li> -->
                                    <li><a href="/admin/admin">Home</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i>
                                    <span>Users</span></a>
                                <ul class="collapse">
                                    <li><a href="/admin/view-verified-users.php">Verify Users</a></li>
                                    <li><a href="/admin/view-users.php">View Users</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i>
                                    <span>Transaction</span></a>
                                <ul class="collapse">
                                    <li><a href="/admin/view-withdraw.php">View Withdrawals</a></li>
                                    <li><a href="/admin/view-deposit.php">View Deposit</a></li>
                                    <!-- <li><a href="/admin/update-coin.php">Update Coin</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-envelope-o"></i>
                                    <span>Inbox</span></a>
                                <ul class="collapse">
                                    <li><a href="/admin/view-inbox">View Inbox</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-upload"></i>
                                    <span>NFT Upload Image</span></a>
                                <ul class="collapse">
                                    <li><a href="/admin/upload-image">Upload Image</a></li>
                                    <li><a href="/admin/view-upload">View</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="#"><i class="ti-map-alt"></i><span>Not expanding</span></a></li> -->
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                                    <span>Settings</span></a>
                                <ul class="collapse">
                                    <li><a href="#">Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="/admin/logout"><i class="ti-power-off"></i><span>Logout</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->

                </div>
            </div>
