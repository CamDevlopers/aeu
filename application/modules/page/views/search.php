<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->

        <div id="content-page" class="content group">

            <div style="padding-left: 25px; padding-top: 10px;" class="hentry group">

                <div class="section portfolio">
                    <?php $lang = $this->session->userdata('language') ? $this->session->userdata('language') : 'english'; ?>
                    <h3 class="title"><?php echo lang('result_search_' . $lang); ?></h3>
                    <?php if ($new->num_rows()>0) { ?>
                     <?php foreach ($new->result() as $news) { ?>
                        <div class="hentry work group portfolio-sticky portfolio-full-description">
                            <div class="work-thumbnail">
                                <a href="<?php echo base_url(); ?>page/news/<?php echo $news->nid; ?>"><img class="thumbnail" style="width:370px;" src="<?php echo base_url() ?>images/thumbnial/<?php echo $news->thumbnial; ?>"/></a>
                            </div>
                            <div class="work-description">
                                <h2><a href="<?php echo base_url(); ?>page/news/<?php echo $news->nid; ?>"><?php echo $news->title; ?></a></h2>
                                
                                <?php echo $news->sort_desc; ?> <a href="<?php echo base_url(); ?>page/news/<?php echo $news->nid; ?>" class="read-more">|| Read more</a>
                            </div>
                        </div>
                     <?php } ?>
                        <div class="clear"></div>
                    <?php } else { ?>
                        <center><h1><?php echo lang('not_found_' . $lang); ?></h1><br/>
                            <img src="<?php echo base_url().'images/net.jpg';?>"/></center>
                        
                    <?php } ?>

                </div>

            </div>
        </div>

    </div>
    <?php $this->load->view('frontend-initial/footer'); ?>
