<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div style="padding-left:20px; padding-right:20px; padding-top: 5px; padding-bottom: 10px;" id="content-page" class="content group">


            <div id="content-page" class="content group">
                <div class="hentry group">
                    <script>
                        jQuery(document).ready(function ($) {
                            $('.sidebar').remove();

                            if (!$('#primary').hasClass('sidebar-no')) {
                                $('#primary').removeClass().addClass('sidebar-no');
                            }

                        });
                    </script>
                    <ul id="portfolio" class="three-columns">
                        <?php
                        $i = 1;

                        function getYouTubeIdFromURL($url) {
                            $url_string = parse_url($url, PHP_URL_QUERY);
                            parse_str($url_string, $args);
                            return isset($args['v']) ? $args['v'] : false;
                        }

                        foreach ($all->result() as $row) {

                            $link  = base_url().'page/video/'.$row->vid;
                                    
                            $title = $row->title;
                            $is_youtube = $row->is_youtube;
                            ?>
                            <li style='padding-right: 1.5%;' class="slide-<?php echo $i ?> <?php
                            if ($i == 1) {
                                echo "first";
                            } else if ($i % 3 == 0) {
                                echo "last group";
                            }
                            ?> one-third">


                                <?php
                                if ($is_youtube == 1) {
                                    $youtubeid = getYouTubeIdFromURL($row->url);
                                    ?>
                                    <a class="thumb video" href="http://www.youtube.com/v/<?php echo $youtubeid; ?>?width=640&amp;height=480&amp;iframe=true" rel="lightbox" title="Right to live free"><img src="http://img.youtube.com/vi/<?php echo $youtubeid; ?>/hqdefault.jpg" alt="" title="" /></a>

                                    <?php
                                } else {
                                    ?>
                                    <a class="thumb video" href="<?php echo base_url() . 'videos/' . $row->url; ?>">
                                        <video width="355" height="190" controls>
                                            <source src="<?php echo base_url() . 'videos/' . $row->url; ?>" type="video/mp4">
                                            <source src="<?php echo base_url() . 'videos/' . $row->url; ?>" type="video/ogg">

                                        </video>
                                    </a>
                                    <?php
                                }
                                ?>

                                <a href="<?php echo $link; ?>"><h5 class="post-title"><?php echo $title; ?> </h5></a>
                            </li>
                            <?php
                            $i++;
                        }
                        ?>

                    </ul>
                </div>
                <div class="general-pagination group"><?php echo $links_video; ?></div>
                <!-- START COMMENTS -->
                <div id="comments">
                </div>
                <!-- END COMMENTS -->
            </div>

            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
<?php $this->load->view('frontend-initial/footer'); ?>
