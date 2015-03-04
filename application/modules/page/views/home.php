<?php $this->load->view('frontend-initial/header'); ?>
<style>
    #cboxPrevious,#cboxNext,#cboxCurrent{
        display:none !important;
    }
</style>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-home" class="content group">
            <div class="hentry group">
                <!-- news -->
                <?php $lang = $this->session->userdata('language') ? $this->session->userdata('language') : 'english'; ?>
                <div class="box-sections col-1-3 one-third">
                    <h4><i class="icon icon-bell"></i><span style="line-height:32px; <?php echo $lang == 'english' ? 'font-family: Arial;' : 'font-family:Khmer Moul' ?>"> <?php echo lang('news_' . $lang); ?></span></h4>
                    <div class="recent-post group">
                        <ul id="portfolio" class="three-columns">
                            <div class="hentry hentry-post blog-small group ">
                                <?php foreach ($new->result() as $news) { ?>



                                    <!-- post featured & title -->
                                    <div class="thumbnail">
                                        <a class="title" href="<?php echo base_url(); ?>page/news/<?php echo $news->nid; ?>"><?php echo $news->title; ?></a>

                                        <br/>
                                        <div class="overlay_a myimg"  style=" float: left;margin-right: 5px;">

                                            <img src="<?php echo base_url() ?>images/thumbnial/<?php echo $news->thumbnial; ?>" alt="No image view" title="No image view" />										
                                            <div class="overlay">
                                                <a class="overlay_img" href="<?php echo base_url() ?>images/thumbnial/<?php echo $news->thumbnial; ?>" rel="lightbox" title=""></a>
                                                <a class="overlay_project overlay_img" href="<?php echo base_url(); ?>page/news/<?php echo $news->nid; ?>" rel="lightbox" title=""></a>

                                            </div>


                                        </div>
                                    </div>
                                    <!-- post content -->
                                    <div class="the-content group">
                                        <h5 style="color:#107EDA;">Posted by : <?php echo $news->fullname; ?> | Date: <?php echo date("l d/m/Y", strtotime($news->date)); ?></h5>
                                        <?php echo $news->sort_desc; ?>....   <a style="color:#0067D4;" href="<?php echo base_url(); ?>page/news/<?php echo $news->nid; ?>">&rarr; <?php echo lang('read_more_' . $lang); ?></a>
                                    </div>


                                    <hr/>

                                <?php } ?>
                            </div>
                        </ul>
                    </div>
                    <br/><br/>
                    <a href="<?php echo base_url() ?>page/all_news" class="btn btn-info view_all"><?php echo lang('view_all_' . $lang); ?></a>
                </div>
                <!-- end news -->
                <!-- new event -->
                <div class="box-sections col-1-3 one-third">
                    <h4><i class="icon icon-calendar"></i><span style="line-height:32px; <?php echo $lang == 'english' ? 'font-family: Arial;' : 'font-family:Khmer Moul' ?>"> <?php echo lang('event_' . $lang); ?></span></h4>
                    <div class="recent-post group">
                        <ul id="portfolio" class="three-columns">
                            <div class="hentry hentry-post blog-small group ">
                                <?php foreach ($event->result() as $events) { ?>



                                    <!-- post featured & title -->
                                    <div class="thumbnail">
                                        <a class="title" href="<?php echo base_url(); ?>page/event/<?php echo $events->eid; ?>"><?php echo substr($events->title, 0, 45) . '...'; ?></a>

                                        <br/>
                                        <div class="overlay_a myimg"  style=" float: left;margin-right: 5px;">

                                            <img src="<?php echo base_url() ?>images/thumbnial/<?php echo $events->thumbnial; ?>" alt="No image view" title="No image view" />										
                                            <div class="overlay">
                                                <a class="overlay_img" href="<?php echo base_url() ?>images/thumbnial/<?php echo $events->thumbnial; ?>" rel="lightbox" title=""></a>
                                                <a class="overlay_project overlay_img" href="<?php echo base_url(); ?>page/event1/<?php echo $events->eid; ?>" rel="lightbox" title=""></a>

                                            </div>


                                        </div>
                                    </div>
                                    <!-- post content -->
                                    <div class="the-content group">
                                        <h5 style="color:#107EDA;">Posted by : <?php echo $events->fullname; ?> | Date: <?php echo date("l d/m/Y", strtotime($events->date)); ?></h5>
                                        <?php echo $events->sort_desc . '...'; ?>  <a style="color:#0067D4;" href="<?php echo base_url(); ?>page/event/<?php echo $events->eid; ?>">&rarr; <?php echo lang('read_more_' . $lang); ?></a>
                                    </div>


                                    <hr/>

                                <?php } ?>
                            </div>
                        </ul>
                    </div>
                    <br/><br/>
                    <a href="<?php echo base_url() ?>page/all_events" class="btn btn-info view_all"><?php echo lang('view_all_' . $lang); ?></a>
                </div>
                <!-- end event -->
                <!-- new event -->
                <?php

                function getYouTubeId($url) {
                    parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
                    return $my_array_of_vars['v'];
                }
                ?>
                <div class="box-sections col-1-3 one-third">
                    <h4><i class="icon icon-film"></i> <span style="line-height:32px; <?php echo $lang == 'english' ? 'font-family: Arial;' : 'font-family:Khmer Moul' ?>"><?php echo lang('video_' . $lang); ?></span></h4>
                    <div class="recent-post group">
                        <ul id="portfolio" class="three-columns">
                            <?php foreach ($video->result() as $videos) { ?>
                                <li class="first slide-1 first">

                                    <div class="overlay_wrapper">
                                        <?php if ($videos->is_youtube == 1) { ?>
                                            <iframe height='200' width="100%" src="http://www.youtube.com/embed/<?php echo getYouTubeId($videos->url) ?>">
                                            </iframe>

                                        <?php } else { ?>
                                            <div class="overlay_a">
                                                <video width="100%" controls>
                                                    <source src="<?php echo base_url() . 'videos/' . $videos->url; ?>" type="video/mp4">
                                                    <source src="<?php echo base_url() . 'videos/' . $videos->url; ?>" type="video/ogg">
                                                    Your browser does not support HTML5 video.
                                                </video>
                                            </div>
                                        <?php } ?>



                                        <a class="title"><?php echo substr($videos->title, 0, 45) . '...'; ?></a>

                                    </div>

                                    <hr/>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                    <br/><br/>
                    <a href="<?php echo base_url() ?>page/all_videos" class="btn btn-info view_all"><?php echo lang('view_all_' . $lang); ?></a>
                </div>
                <!-- end event -->
                <div style="clear: both;"></div><br/>
                <div class="">



                    <?php
                    $i = 1;
                    foreach ($photo->result() as $photos) {
                        ?> 
                        <div class="box-sections col-1-4 one-third">
                            <ul style="" id="portfolio" class="fourth-columns">
                                <li style='width: 100%;' class=" ">
                                    <div style="margin-top: -20px;" class="overlay_a">
                                        <div class="overlay_wrapper">
                                            <img src="<?php echo base_url() . 'images/photo_albums/' . $photos->img; ?>" class="thumbnail"/>										
                                            <div class="overlay">
                                                <a style="margin-left: 30px;" class="overlay_img" href="<?php echo base_url() . 'images/photo_albums/' . $photos->img; ?>" rel="lightbox" title=""></a>

                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="<?php echo base_url() . 'page/album_detail/' . $photos->gid; ?>"> <?php echo substr($photos->title, 0, 40) . '...'; ?></a></h4>

                                </li>
                            </ul>
                        </div>   
                        <?php
                        $i++;
                    }
                    ?>

                    <br/><br/>
                    <a style="margin-right: 20px;" href="<?php echo base_url() ?>page/all_album" class="btn btn-info view_all"><?php echo lang('view_all_' . $lang); ?></a>

                </div>
            </div>

        </div>
        <br/>

    </div>
</div>
</div>
<?php $this->load->view('frontend-initial/footer'); ?>
