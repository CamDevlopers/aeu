<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
<br/><br/><br/><br/><br/><br/>
    <div class="row">
        <div class="col-md-2"></div>
        <a href="<?php echo base_url() . 'manage_video/add'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-youtube fa-3x"></i>
                        <h3>Embed from Youtube</h3>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url() . 'manage_video/upload_form'; ?>">
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body gray">
                        <i class="fa fa-upload fa-3x"></i>
                        <h3> Upload File</h3>
                    </div>
                </div>
            </div>
        </a>
           
    </div>

    <?php $this->load->view('admin-initial/footer'); ?>