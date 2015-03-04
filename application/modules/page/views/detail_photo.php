<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        
        <div id="content-page" class="content group">
            
            <div style="padding-left: 25px;" class="hentry group">

                <h1 style="padding-top: 20px;"><i class="icon icon-camera"></i> <span><?php echo $title; ?></span></h1>
                <ul id="portfolio" class="three-columns">
                    <?php foreach ($photo->result() as $image) { ?>
                        <li style='padding-right: 1.5%;' class="slide-1 one-third">
                            <div class="overlay_a">
                                <div class="overlay_wrapper">
                                    <img src="<?php echo base_url() . "images/photo_albums/" . $image->img_name; ?>" alt="0082" title="0082" />										
                                    <div class="overlay">
                                        <a style="margin-left: 30px;" class="overlay_img" href="<?php echo base_url() . "images/photo_albums/" . $image->img_name; ?>" rel="lightbox" title=""></a>

                                    </div>
                                </div>
                            </div>

                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </div>
    <?php $this->load->view('frontend-initial/footer'); ?>
