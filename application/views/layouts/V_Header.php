<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Sweetalert 2 -->
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert2/') ?>dist/sweetalert2.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/skins/skin-blue.min.css">
    <!-- Custom css -->
    <style>
    .mr {
        margin-right: 10px;
    }

    .dt-buttons {
        margin-bottom: 15px;
    }

    .dt-buttons .btn {
        margin: 5px;
    }

    .dataTables_length {
        margin-bottom: -35px;
    }

    .active {
        color: #ffffff !important;
    }

    #spinningSquaresG {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: black;
        z-index: 1200;
    }

    .item {
        position: fixed;
        margin-left: -155px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .spinningSquaresG {
        position: absolute;
        background-color: #FAB223;
        width: 29px;
        height: 29px;
        -moz-animation-name: bounce_spinningSquaresG;
        -moz-animation-duration: 1.8s;
        -moz-animation-iteration-count: infinite;
        -moz-animation-direction: normal;
        -moz-transform: scale(.3);
        -webkit-animation-name: bounce_spinningSquaresG;
        -webkit-animation-duration: 1.8s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-direction: normal;
        -webkit-transform: scale(.3);
        -ms-animation-name: bounce_spinningSquaresG;
        -ms-animation-duration: 1.8s;
        -ms-animation-iteration-count: infinite;
        -ms-animation-direction: normal;
        -ms-transform: scale(.3);
        -o-animation-name: bounce_spinningSquaresG;
        -o-animation-duration: 1.8s;
        -o-animation-iteration-count: infinite;
        -o-animation-direction: normal;
        -o-transform: scale(.3);
        animation-name: bounce_spinningSquaresG;
        animation-duration: 1.8s;
        animation-iteration-count: infinite;
        animation-direction: normal;
        transform: scale(.3);
    }

    #spinningSquaresG_1 {
        left: 0;
        -moz-animation-delay: 0.72s;
        -webkit-animation-delay: 0.72s;
        -ms-animation-delay: 0.72s;
        -o-animation-delay: 0.72s;
        animation-delay: 0.72s;
    }

    #spinningSquaresG_2 {
        left: 30px;
        -moz-animation-delay: 0.9s;
        -webkit-animation-delay: 0.9s;
        -ms-animation-delay: 0.9s;
        -o-animation-delay: 0.9s;
        animation-delay: 0.9s;
    }

    #spinningSquaresG_3 {
        left: 60px;
        -moz-animation-delay: 1.08s;
        -webkit-animation-delay: 1.08s;
        -ms-animation-delay: 1.08s;
        -o-animation-delay: 1.08s;
        animation-delay: 1.08s;
    }

    #spinningSquaresG_4 {
        left: 90px;
        -moz-animation-delay: 1.26s;
        -webkit-animation-delay: 1.26s;
        -ms-animation-delay: 1.26s;
        -o-animation-delay: 1.26s;
        animation-delay: 1.26s;
    }

    #spinningSquaresG_5 {
        left: 120px;
        -moz-animation-delay: 1.44s;
        -webkit-animation-delay: 1.44s;
        -ms-animation-delay: 1.44s;
        -o-animation-delay: 1.44s;
        animation-delay: 1.44s;
    }

    #spinningSquaresG_6 {
        left: 150px;
        -moz-animation-delay: 1.62s;
        -webkit-animation-delay: 1.62s;
        -ms-animation-delay: 1.62s;
        -o-animation-delay: 1.62s;
        animation-delay: 1.62s;
    }

    #spinningSquaresG_7 {
        left: 180px;
        -moz-animation-delay: 1.8s;
        -webkit-animation-delay: 1.8s;
        -ms-animation-delay: 1.8s;
        -o-animation-delay: 1.8s;
        animation-delay: 1.8s;
    }

    #spinningSquaresG_8 {
        left: 210px;
        -moz-animation-delay: 1.98s;
        -webkit-animation-delay: 1.98s;
        -ms-animation-delay: 1.98s;
        -o-animation-delay: 1.98s;
        animation-delay: 1.98s;
    }

    @-moz-keyframes bounce_spinningSquaresG {
        0% {
            -moz-transform: scale(1);
            background-color: #FAB223;
        }

        100% {
            -moz-transform: scale(.3) rotate(90deg);
            background-color: #FFFFFF;
        }

    }

    @-webkit-keyframes bounce_spinningSquaresG {
        0% {
            -webkit-transform: scale(1);
            background-color: #FAB223;
        }

        100% {
            -webkit-transform: scale(.3) rotate(90deg);
            background-color: #FFFFFF;
        }

    }

    @-ms-keyframes bounce_spinningSquaresG {
        0% {
            -ms-transform: scale(1);
            background-color: #FAB223;
        }

        100% {
            -ms-transform: scale(.3) rotate(90deg);
            background-color: #FFFFFF;
        }

    }

    @-o-keyframes bounce_spinningSquaresG {
        0% {
            -o-transform: scale(1);
            background-color: #FAB223;
        }

        100% {
            -o-transform: scale(.3) rotate(90deg);
            background-color: #FFFFFF;
        }

    }

    @keyframes bounce_spinningSquaresG {
        0% {
            transform: scale(1);
            background-color: #FAB223;
        }

        100% {
            transform: scale(.3) rotate(90deg);
            background-color: #FFFFFF;
        }

    }
    </style>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div id="spinningSquaresG">
        <div class="item">
            <div id="spinningSquaresG_1" class="spinningSquaresG"></div>
            <div id="spinningSquaresG_2" class="spinningSquaresG"></div>
            <div id="spinningSquaresG_3" class="spinningSquaresG"></div>
            <div id="spinningSquaresG_4" class="spinningSquaresG"></div>
            <div id="spinningSquaresG_5" class="spinningSquaresG"></div>
            <div id="spinningSquaresG_6" class="spinningSquaresG"></div>
            <div id="spinningSquaresG_7" class="spinningSquaresG"></div>
            <div id="spinningSquaresG_8" class="spinningSquaresG"></div>
        </div>
    </div>
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="<?= $account['role_id'] == '2' ? base_url('admin') : base_url()?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?= base_url('assets/upload/profile/').$account['image'] ?>" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?= $account['name'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/upload/profile/').$account['image'] ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $account['name'] ?>
                                        <small>Member since <?= date('M. Y', $account['date_created']) ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="<?= base_url('logout') ?>"><i class="glyphicon glyphicon-log-out"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>