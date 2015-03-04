<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div style="padding-left:20px; padding-right:20px; padding-top: 5px; padding-bottom: 10px;" id="content-page" class="content group">
            <?php $lang = $this->session->userdata('language') ? $this->session->userdata('language') : 'english'; ?>

            <div id="content-blog" class="content group">
                <h1>All News</h1>

                <?php
                foreach ($all_news->result() as $row_news) {

                    $link = base_url() . 'page/news/' . $row_news->nid;
                    ?>




                    <div class="hentry hentry-post blog-small group ">
                        <!-- post featured & title -->
                        <div class="thumbnail">
                            <!-- post title -->
                            <h2 class="post-title"><a href="<?php echo $link ?>"><?php echo $row_news->title; ?></a></h2>

                            <!-- post featured -->
                            <div class="image-wrap">
                                <img src="<?php echo base_url() . 'images/thumbnial/' . $row_news->thumbnial; ?>" alt="001" style="width: 250px;" title="<?php echo $row_news->title; ?>" />        
                            </div>
                        </div>
                        <!-- post content -->
                        <div class="the-content group">
                            <h5 style="color:#107EDA;">Posted by : <?php echo $row_news->fullname; ?> | Date: <?php echo date("l d/m/Y", strtotime($row_news->date)); ?></h5>
                            <p><?php echo $row_news->sort_desc; ?></p>
                            <p><a href="<?php echo $link ?>" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link"> <?php echo lang('read_more_' . $lang); ?></a></p>
                        </div>
                    </div>



                    <?php
                }
                ?>	

                <div class="general-pagination group"><?php echo $links; ?></div>

            </div>
            <!-- START COMMENTS -->
            <div id="comments">
            </div>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
<?php $this->load->view('frontend-initial/footer'); ?>
