<!DOCTYPE html>
<html>

<head>
    <style>
        .swal2-popup {
            font-size: 16px !important;
        }
    </style>
    <style>
        #overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 100px;
            height: 100px;
            border: 10px #ddd solid;
            border-top: 10px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }

        .is-hide {
            display: none;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Action Plan</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/dist/img/pandurasa_kharisma_pt.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" /> -->
    <link type="text/css" href="<?= base_url() ?>assets/css/gyrocode.css" rel="stylesheet" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>assets//dist/css/skins/_all-skins.min.css">
    <link type="text/css" href="<?= base_url() ?>assets/css/checkbox_dataTables.css" rel="stylesheet" />
    <link type="text/css" href="<?= base_url() ?>assets/css/jquery_dataTables.css" rel="stylesheet" />
    <link type="text/css" href="<?= base_url() ?>assets/css/select_dataTables.css" rel="stylesheet" />
    <link type="text/css" href="<?= base_url() ?>assets/css/sweetalert2.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style>
    /* Absolute Center Spinner */
    .loading {
        content: 'tunggu';
        position: fixed;
        z-index: 9999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    /* Transparent Overlay */
    .loading:before {
        content: 'tunggu';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
        background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading:not(:required):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 150ms infinite linear;
        -moz-animation: spinner 150ms infinite linear;
        -ms-animation: spinner 150ms infinite linear;
        -o-animation: spinner 150ms infinite linear;
        animation: spinner 150ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-moz-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-o-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>
<div id="muncul_loading" class=""></div>

<body class="hold-transition skin-blue-light sidebar-mini <?= $this->uri->segment(2) == 'createProposal2' || $this->uri->segment(2) == 'createOperating2' || $this->uri->segment(2) == 'setOperatingActivity' ? 'sidebar-collapse' : '' ?>" style="height: auto; min-height: 100%;">
    <div class="wrapper">
        <header class="main-header">
            <a href="" class="logo">
                <span class="logo-mini">
                    <img src="<?= base_url() ?>assets/dist/img/pandurasa_kharisma_pt.png" style="max-width: 35px;" class="user-image" alt="User Image">
                </span>
                <span class="logo-lg"><b>Action</b> Plan </span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?><?php if (!is_null($_SESSION['sd_image'])) {
                                                                echo "upload/fotoprofil/" . $_SESSION['sd_image'];
                                                            } else {
                                                                echo "assets/dist/img/red-user.png";
                                                            } ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $_SESSION['sd_username'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url() ?><?php if (!is_null($_SESSION['sd_image'])) {
                                                                    echo "upload/fotoprofil/" . $_SESSION['sd_image'];
                                                                } else {
                                                                    echo "assets/dist/img/red-user.png";
                                                                } ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $this->session->userdata('sd_fullname') ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-flat">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?><?php if (!is_null($_SESSION['sd_image'])) {
                                                        echo "upload/fotoprofil/" . $_SESSION['sd_image'];
                                                    } else {
                                                        echo "assets/dist/img/red-user.png";
                                                    } ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= ucwords(strtolower($_SESSION['sd_fullname'])) ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="<?= base_url('settings/profile') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <!-- <li class="treeview <?= $this->uri->segment(2) == 'employee' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-archive"></i>
                            <span>Data Master</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(2) == 'showGroup' ? 'class="active"' : '' ?>>
                                <a href=""><i class="fa fa-tag"></i><span>Master A</span></a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="treeview <?= $this->uri->segment(1) == 'issuerequest' || $this->uri->segment(1) == 'issue' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-archive"></i>
                            <span>Issue</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?= $this->uri->segment(2) == 'issuein' ? 'active' : '' ?>">
                                <a href="<?= base_url('issuerequest/issuein') ?>" class=""><i class="fa fa-tag"></i><span>Issue Request</span></a>
                            </li>
                            <li class="<?= $this->uri->segment(2) == 'closedissue' ? 'active' : '' ?>">
                                <a href="<?= base_url('issuerequest/closedissue') ?>"><i class="fa fa-tag"></i><span>Closed Issue</span></a>
                            </li>
                            <li class="<?= $this->uri->segment(2) == 'myissue' ? 'active' : '' ?>">
                                <a href="<?= base_url('issue/myissue') ?>"><i class="fa fa-tag"></i><span>My Issue</span></a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="treeview <?= $this->uri->segment(1) == 'settings'  ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-archive"></i>
                            <span>Settings</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?= $this->uri->segment(2) == 'profile' ? 'active' : '' ?>">
                                <a href="<?= base_url('settings/profile') ?>" class=""><i class="fa fa-tag"></i><span>User Profile</span></a>
                            </li>
                        </ul>
                    </li> -->
                    <?php if ($this->session->userdata('sd_level') == 'senior manager' || $this->session->userdata('sd_level') == 'manager') { ?>
                        <li class="treeview <?= $this->uri->segment(1) == 'team'  ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-archive"></i>
                                <span>Team</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?= $this->uri->segment(1) == 'team' && $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                                    <a href="<?= base_url('team/dashboard') ?>" class=""><i class="fa fa-dashboard"></i><span>Team Dashboard</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(1) == 'team' && $this->uri->segment(2) == 'issuerequest' ? 'active' : '' ?>">
                                    <a href="<?= base_url('team/issuerequest') ?>" class=""><i class="fa fa-tag"></i><span>Issue Request</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(1) == 'team' && $this->uri->segment(2) == 'closedissue' ? 'active' : '' ?>">
                                    <a href="<?= base_url('team/closedissue') ?>" class=""><i class="fa fa-tag"></i><span>Closed Request</span></a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </aside>