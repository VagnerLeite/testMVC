<?php if ( ! defined('ABSPATH')) exit; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My MVC</title>
		<script src="<?php echo HOME_URI;?>/js/script.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo HOME_URI;?>/views/_css/style.css">
    <link rel="stylesheet" href="<?php echo HOME_URI;?>/bootstrap-3.3.7-dist/css/bootstrap.css">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo HOME_URI;?>/dashboard/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo HOME_URI;?>/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo HOME_URI;?>"><i class="fa fa-clone" aria-hidden="true"></i> Vagner</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo HOME_URI;?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo HOME_URI;?>/agenda/"><i class="fa fa-phone-square fa-fw"></i> Agenda</a>
                        </li>
                        <li>
                            <a href="<?php echo HOME_URI;?>/user-register/"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
