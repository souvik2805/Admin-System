<?php
session_start();
include "database/queries.php";
include "database/path.php";
date_default_timezone_set("Asia/Calcutta");
$today = date("F j , Y");      
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2020 09:23:19 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Superadmin CDIPL Contract Form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo-dark.png">

     <!-- Plugins css -->
    <link href="assets/plugins/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/css/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/css/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/css/select.bootstrap4.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
   
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>


                    <div class="dropdown d-none d-sm-inline-block">
                       <p style="color: white;font-size: 20px;padding-top: 10px;"> Today : &nbsp;<?php echo $today  ?> </p>   
                        
                    </div>
                </div>
                <div class="d-flex align-items-center">
                </div>

                <div class="d-flex align-items-center">
                   <h3 style="color: white;">Welcome: - <span style="color: red;"> Administrator</span></h3>
                

                    <div class="dropdown d-inline-block ml-2">
                           <a href="logout" class="btn btn-info btn-md " onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Sign out">
                            <i class="fa fa-power-off"></i> <span class="nav-label">Logout</span>
                        </a>
                        <form id="logout-form" action="database/logout" method="POST" style="display: none;">
                        </form>
                       
                    </div>
                     

                </div>
            </div>
        </header>