<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="col-lg-12">
        <?php
        if(isset($_GET['success'])){
            if($_GET['success'] == 1){
                $sms = "New menu has been added!";
            }else if($_GET['success'] == 2){
                 $sms = "Menu has been updated!";
            }
            else if($_GET['success'] == 3){
                 $sms = "Menu has been deleted!";
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
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-file"></i> Manage Pages</h3>

            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'manage_pages/add_page'; ?>"><i class="fa fa-pencil"></i> Add new</a>

        </nav>
    </div>

    <div class="row">
        <?php
        $url1 = $this->uri->segment(1);
        $url2 = $this->uri->segment(2);
        $url3 = $this->uri->segment(3);
        if ($url1 == "manage_pages" && $url2 == "" || $url1 == "manage_pages" && $url2 == "index") {
            include_once('pages/listpage.php');
        } else {

            include_once('pages/' . $url2 . '.php');
        }
        ?>

    </div>

    <?php $this->load->view('admin-initial/footer'); ?>