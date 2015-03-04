<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="col-lg-12">
        <?php

        //get video id from youtube url
        function getYouTubeId($url) {
            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            return $my_array_of_vars['v'];
        }

        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {
                $sms = "New video has been added!";
            } else if ($_GET['success'] == 2) {
                $sms = "Video has been updated!";
            } else if ($_GET['success'] == 3) {
                $sms = "Video has been deleted!";
            }
            ?>
            <div class="alert alert-info">
                <i class="fa fa-check"></i> <?php echo $sms; ?>
            </div>
            <?php
        }
        ?>

    </div>
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-film"></i> Manage Video</h3>

            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'manage_video/add_select'; ?>"><i class="fa fa-pencil"></i> Add new</a>

        </nav>
    </div>

    <div class="row">
        <?php
        $url1 = $this->uri->segment(1);
        $url2 = $this->uri->segment(2);
        $url3 = $this->uri->segment(3);
        if ($url1 == "manage_video" && $url2 == "" || $url1 == "manage_video" && $url2 == "index") {
            include_once('pages/list.php');
        } else {

            include_once('pages/' . $url2 . '.php');
        }
        ?>

    </div>

    <?php $this->load->view('admin-initial/footer'); ?>