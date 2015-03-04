<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <!-- Welcome -->
        <div class="col-lg-12">
            <div class="alert alert-info">
                <i class="fa fa-play"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $this->session->userdata('fname'); ?> </b>
                , Click following modules to get start!
            </div>
        </div>
        <!--end  Welcome -->
    </div>

    <div class="row">
        <a href="<?php echo base_url() . 'manage_news'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-bell fa-3x"></i>
                        <h3><?php echo $count_news;?> Hot news</h3>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url() . 'manage_event'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-thumbs-up fa-3x"></i>
                        <h3><?php echo $count_events;?> New Events</h3>
                    </div>
                </div>
            </div>
        </a>
        <?php if ($this->session->userdata('level') == 1) { ?>
            <a href="<?php echo base_url() . 'manage_pages'; ?>">
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body gray">
                            <i class="fa fa-file fa-3x"></i>
                            <h3><?php echo $count_pages;?>  Pages</h3>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() . 'manage_faculties'; ?>">
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body gray">
                            <i class="fa fa-tasks fa-3x"></i>
                            <h3><?php echo $count_faculty;?>  Faculties</h3>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() . 'manage_categories'; ?>">
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body gray">
                            <i class="fa fa-list fa-3x"></i>
                            <h3><?php echo $count_category;?>  Categories</h3>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() . 'manage_sub_categories'; ?>">
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body gray">
                            <i class="fa fa-indent fa-3x"></i>
                            <h3><?php echo $count_sub_category;?>  Sub categories</h3>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() . 'manage_users'; ?>">
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body gray">
                            <i class="fa fa-users fa-3x"></i>
                            <h3><?php echo $count_users;?>  Users</h3>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
        <a href="<?php echo base_url() . 'photo_albums'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-picture-o fa-3x"></i>
                        <h3><?php echo $count_album;?> Album Photos</h3>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url() . 'manage_video'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-video-camera fa-3x"></i>
                        <h3><?php echo $count_video;?>  Videos</h3>
                    </div>
                </div>
            </div>
        </a>
        <?php if($this->session->userdata('level') == 1){?>
        <a href="<?php echo base_url() . 'manage_users/logs'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-times-circle-o fa-3x"></i>
                        <h3>All activities</h3>
                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
        <a href="<?php echo base_url() . 'manage_document'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-folder fa-3x"></i>
                        <h3><?php echo $count_doc;?>  Documents</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <?php $this->load->view('admin-initial/footer'); ?>