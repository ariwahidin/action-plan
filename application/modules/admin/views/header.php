<!DOCTYPE html>
<html>

<head>
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
    <title>Service Desk</title>
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

<body class="hold-transition skin-blue-light sidebar-mini <?= $this->uri->segment(2) == 'createProposal2' || $this->uri->segment(2) == 'createOperating2' || $this->uri->segment(2) == 'setOperatingActivity' ? 'sidebar-collapse' : '' ?>" style="height: auto; min-height: 100%;">
    <div class="wrapper">
        <header class="main-header">
            <a href="" class="logo">
                <span class="logo-mini"><b>P</b>K</span>
                <span class="logo-lg"><b>Service</b> Desk </span>
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
                                <img src="<?= base_url() ?>assets/dist/img/user123.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $_SESSION['sd_username'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url() ?>assets/dist/img/user123.png" class="img-circle" alt="User Image">
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
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview <?= $this->uri->segment(2) == 'master' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-archive"></i>
                            <span>Data Master</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(2) == 'master' && $this->uri->segment(3) == 'users' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/master/users') ?>"><i class="fa fa-tag"></i><span>Master Users</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>