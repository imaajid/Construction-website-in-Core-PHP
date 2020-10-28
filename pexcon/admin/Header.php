<?php
//todo: hum ny yhan pr login ka kam krna hy
//date_default_timezone_set("Asia/Karachi");
//session_start();
//if (!empty($_SESSION["userId"])) {
//    require_once __DIR__ . '../php_help/class/Member.php';
//    $member = new Member();
//    $memberResult = $member->getMemberById($_SESSION["userId"]);
//    if (!empty($memberResult[0]["display_name"])) {
//        $displayName = ucwords($memberResult[0]["display_name"]);
//    } else {
//        $displayName = $memberResult[0]["user_name"];
//    }
//}
//else{
//    header("Location: ../login.php");
//    exit();
//}
//

$displayName="Doctor";
?>



<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Construction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/icon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/images/icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../srtdash/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/slicknav.min.css">
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <!-- others css -->
    <link rel="stylesheet" href="../../srtdash/assets/css/typography.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/default-css.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/styles.css">
    <link rel="stylesheet" href="../../srtdash/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../../srtdash/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="#"><H3>Construction</H3></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li id="navdashboard">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Our Project Detail
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_project_detail.php">Insert Project Detail</a></li>
                                <li><a href="list_project_detail.php">List Project detail</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Our Projects
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_our_project.php">Insert Project</a></li>
                                <li><a href="list_our_project.php">List Project</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-server"></i><span>Services
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_our_services.php">Insert Our Services</a></li>
                                <li><a href="list_services.php">List Our Services</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-quote-left"></i><span>Feedback
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_feedback.php">Insert Feedback</a></li>
                                <li><a href="list_feedback.php">List feedback</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>User Info
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_user_info.php">Insert user info</a></li>
                                <li><a href="list_user_info.php">List user info</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Blog Category
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_blog_category.php">Insert Blog Category</a></li>
                                <li><a href="list_blog_category.php">List Blog Category</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Blog
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_blog.php">Insert blog</a></li>
                                <li><a href="list_blog.php">List blog</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Writter
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_writer.php">Insert writter</a></li>
                                <li><a href="list_writer.php">List writter</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Contact Us
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="insert_contact_us.php">Insert Contact Us</a></li>
                                <li><a href="list_contact_us.php">List contact Us</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Profile
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="#">View Profile</a></li>
                                <li><a href="#">Change Password</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa-info-circle"></i><span>About Us</span></a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <!-- page title area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="../../srtdash/assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $displayName ?> <i
                                    class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
<!--                            <a class="dropdown-item" href="#">Message</a>-->
<!--                            <a class="dropdown-item" href="#">Settings</a>-->
                            <a class="dropdown-item" href="../php_help/logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page title area end -->
        <!-- header area end -->