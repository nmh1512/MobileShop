<?php

include "lib/session.php";
Session::checkSession();
include_once 'lib/database.php';
include_once 'lib/format.php';
spl_autoload_register(function ($className) {
    include_once "class/" . $className . ".php";
});
include "class/member.php";
$db = new Database;
$fm = new Format;
$ct = new Cart;
$customer = new Customer;
$cat = new cartegory;
$product = new product;
$brand = new brand;
$news = new News;
$profit = new Profit;
$admin = new Members;


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Freedom Mobile</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="C:/xampp/htdocs/baitap/DATN/admin/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css">
    <script src="./ckeditor/ckeditor.js"></script>
    <script src="./ckfinder/ckfinder.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
</head>

<body id="page-top">
    <div class="modal-busy" style="display: none"></div>
    <?php
    $id = Session::get('id_admin');
    $getId = $admin->showProfile($id);
    $user = $getId->fetch_assoc();
    //L???y th??ng tin ph???n quy???n c???a member
    $userPrivileges = $admin->getPrivilege($id);
    $userPrivileges = mysqli_fetch_all($userPrivileges, MYSQLI_ASSOC);
    if (!empty($userPrivileges)) {
        foreach ($userPrivileges as $privilege) {      
            $user['privileges'][] = $privilege['url_match'];
        }
    }
    $_SESSION['current_user'] = $user;
    ?>



    <!-- Page Wrapper -->
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroyAdmin();
    }
    ?>
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="position-fixed navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index">
                    <i class="fas fa fa-home"></i>
                    <span>Trang ch???</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php if ($admin->checkPrivillege('categories') || $admin->checkPrivillege('brands') || $admin->checkPrivillege('products')) { ?>
                <div class="sidebar-heading">
                    Qu???n l?? s???n ph???m
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <?php if ($admin->checkPrivillege('categories')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="categories">
                            <span>Qu???n l?? danh m???c</span></a>
                    </li>
                <?php } ?>

                <!-- Nav Item - Utilities Collapse Menu -->
                <?php if ($admin->checkPrivillege('brands')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="brands">
                            <span>Qu???n l?? lo???i s???n ph???m</span></a>
                    </li>
                <?php } ?>

                <?php if ($admin->checkPrivillege('products')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="products">
                            <span>Qu???n l?? s???n ph???m</span></a>
                    </li>
                <?php }
                ?>
                <hr class="sidebar-divider">

            <?php
            } ?>
            <!-- Divider -->

            <!-- Heading -->
            <?php if ($admin->checkPrivillege('customers') || $admin->checkPrivillege('orders')) { ?>
                <div class="sidebar-heading">
                    Qu???n l?? kh??ch h??ng
                </div>

                <?php if ($admin->checkPrivillege('customers')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="customers">
                            <span>Qu???n l?? t??i kho???n kh??ch h??ng</span></a>
                    </li>
                <?php } ?>

                <?php if ($admin->checkPrivillege('orders')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="orders">
                            <span>Qu???n l?? ????n h??ng</span></a>
                    </li>
                <?php }
                ?>

                <hr class="sidebar-divider d-none d-md-block">
            <?php
            } ?>

            <?php if ($admin->checkPrivillege('news') || $admin->checkPrivillege('members')) { ?>
                <div class="sidebar-heading">
                    Kh??c
                </div>

                <?php if ($admin->checkPrivillege('news')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="news">
                            <span>Qu???n l?? tin t???c</span></a>
                    </li>
                <?php } ?>

                <?php if ($admin->checkPrivillege('members')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="members">
                            <span>Qu???n l?? nh??n vi??n</span></a>
                    </li>
            <?php }
            } ?>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div style="margin-left: 225px" id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Xin ch??o <?php echo Session::get('name_admin'); ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    H??? s??
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ????ng xu???t
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>