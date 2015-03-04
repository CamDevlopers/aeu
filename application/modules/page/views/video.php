<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div style="padding-left:20px; padding-right:20px; padding-top: 5px; padding-bottom: 10px;" id="content-page" class="content group">
            <div class="clear"></div>
            <div class="posts">
                <div class="portfolio-post internal-post group">
                    <div id="portfolio" class="portfolio-full-description">

                        <?php

                        function getYouTubeIdFromURL($url) {
                            $url_string = parse_url($url, PHP_URL_QUERY);
                            parse_str($url_string, $args);
                            return isset($args['v']) ? $args['v'] : false;
                        }

                        foreach ($video->result() as $row) {
                            
                            $is_youtube = $row->is_youtube;
                            ?>

                            <div class="fulldescription_title gallery-filters">
                                <h1><?php echo $row->title; ?></h1>
                                
                            </div>
                            <h5>Posted by : <?php echo $row->fullname; ?></h5>
                            <div class="portfolios hentry work group">

                                <div class="work-thumbnail">
                                    <div class="post_video youtube">
                                        <?php
                                        if ($is_youtube == 1) {
                                            $youtubeid = getYouTubeIdFromURL($row->url);
                                            ?>

                                            <div class="post_video youtube">
                                                <iframe width="100%" height="100%" src="http://www.youtube.com/embed/<?php echo $youtubeid; ?>" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            
                                                <video  width="600" height="400" controls>
                                                    <source src="<?php echo base_url() . 'videos/' . $row->url; ?>" type="video/mp4">
                                                    <source src="<?php echo base_url() . 'videos/' . $row->url; ?>" type="video/ogg">

                                                </video>
                                            
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="work-description">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <?php
                        }
                        ?>


                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
<?php $this->load->view('frontend-initial/footer'); ?>
