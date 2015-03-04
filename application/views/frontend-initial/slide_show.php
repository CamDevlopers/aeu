<div id="slider-elastic" class="slider elastic ei-slider" style="width: 95%; height: 400px;">
    <div class="ei-slider-loading">Welcome to AEU, Please wait...</div>
    <ul class="ei-slider-large">
        <?php
        $this->load->model('pages');
        $slide = $this->pages->get_all_slide();
        foreach ($slide->result() as $slides) {
            ?> 
            <li class="first slide-1 slide">
                <a><img src="<?php echo base_url(); ?>images/slideshows/<?php echo $slides->image_name; ?>" alt="<?php echo $slides->title; ?>" title="<?php echo $slides->title; ?>" /></a>
                <div class="ei-title">
                    <h2><a style="color:#FFF; font-style: normal; font-family: Arial;" target="_blank"><?php echo $slides->title; ?></a></h2>
                    <h3 style="color:#FFF; font-family: Arial;"><?php echo $slides->image_description; ?></h3>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
    <!-- ei-slider-large -->
    <ul class="ei-slider-thumbs">
        <li class="ei-slider-element">Current</li>
        <?php foreach ($slide->result() as $slides) { ?>
            <li><a href="#">love the sport - </a><img src="<?php echo base_url(); ?>images/slideshows/<?php echo $slides->image_name; ?>" alt=" - " /></li>
        <?php } ?>
    </ul>
    <!-- ei-slider-thumbs -->    
    <div class="shadow"></div>
</div>
<!-- ei-slider -->    
<!-- END #slider -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#slider-elastic.elastic').eislideshow({
            easing: 'easeOutExpo',
            titleeasing: 'easeOutExpo',
            titlespeed: 1200,
            autoplay: true,
            slideshow_interval: 3000,
            speed: 1000,
            animation: 'sides'
        });
    });
</script>