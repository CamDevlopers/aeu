<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Asia Europ Univeristy </title>
        <link rel="icon" href="<?php echo base_url() . 'admin-assets'; ?>/img/aeulogo.ico" type="image/x-icon">
        <link href="<?php echo base_url() . 'admin-assets'; ?>/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets'; ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets'; ?>/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets'; ?>/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets'; ?>/css/main-style.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets'; ?>/css/select2.css" rel="stylesheet" />


        <!-- Page-Level CSS -->
        <link href="<?php echo base_url() . 'admin-assets'; ?>/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'admin-assets'; ?>/dataTables/jquery.dataTables.min.css"/>
        <script src="<?php echo base_url() . 'admin-assets'; ?>/plugins/jquery-1.10.2.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url() . 'admin-assets'; ?>/dataTables/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>fckeditor/fckeditor.js"></script>


        <script>
            $(document).ready(function() {
                $('#example').dataTable();
            });
        </script>
    </head>
    <body>
        <!--  wrapper -->
        <div id="">
            <!-- navbar top -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
                <!-- navbar-header -->
                <div class="navbar-header">

                    <a class="logo" href="<?php echo base_url(); ?>">
                        <img src="<?php echo base_url() . 'admin-assets'; ?>/img/logo-large.png" alt="" />
                    </a>
                </div>
                <!-- end navbar-header -->
                <!-- navbar-top-links -->
                <ul class="nav navbar-top-links navbar-right">
                    <!-- main dropdown -->
                    <?php if ($this->session->userdata('level') == 1) { ?>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'dashboard' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>dashboard">
                                <center><i class="fa fa-home fa-3x"></i><br/>
                                    Dashboard</center>
                            </a>
                        </li>

                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_pages' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>manage_pages">
                                <center><i class="fa fa-file fa-3x"></i><br/>
                                    Pages</center>
                            </a>
                        </li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_faculties' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>manage_faculties">
                                <center><i class="fa fa-tasks fa-3x"></i><br/>
                                    Faculties</center>
                            </a>
                        </li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_categories' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>manage_categories">
                                <center><i class="fa fa-list-alt fa-3x"></i><br/>
                                    Categories</center>
                            </a>
                        </li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_sub_categories' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>manage_sub_categories">
                                <center><i class="fa fa-indent fa-3x"></i><br/>
                                    Sub-categories</center>
                            </a>
                        </li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_slideshow' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <center><i class="fa fa-picture-o fa-3x"></i><br/>
                                    Slideshow</center>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>manage_slideshow"><i class="fa fa-retweet fa-fw"></i> Banner</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>manage_partner"><i class="fa fa-flag fa-fw"></i> Partner</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_users' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <center><i class="fa fa-user fa-3x"></i><br/>
                                    Users </center>
                            </a>
                            <!-- dropdown user-->
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>manage_users"><i class="fa fa-users fa-fw"></i>  Users</a>
                                </li>
                                <li><a href="<?php echo base_url() . 'manage_users/view_user?user_id=' . $this->session->userdata('user_id') ?>"><i class="fa fa-gear fa-fw"></i> Profile Setting</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- end dropdown-user -->
                        </li>
                    <?php } else { ?>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'dashboard' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>dashboard">
                                <center><i class="fa fa-home fa-3x"></i><br/>
                                    Dashboard</center>
                            </a>
                        </li>

                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_news' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>manage_news">
                                <center><i class="fa fa-file fa-3x"></i><br/>
                                    Hot news</center>
                            </a>
                        </li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_event' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>manage_event">
                                <center><i class="fa fa-tasks fa-3x"></i><br/>
                                    New Events</center>
                            </a>
                        </li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'manage_users' ? 'bg-success' : ''; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <center><i class="fa fa-user fa-3x"></i><br/>
                                    Profile </center>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . 'manage_users/view_user?user_id=' . $this->session->userdata('user_id') ?>"><i class="fa fa-gear fa-fw"></i> Profile Setting</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <!-- end main dropdown -->
                    </ul>
                <?php } ?>
                <!-- end navbar-top-links -->

            </nav>








