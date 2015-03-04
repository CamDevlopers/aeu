<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div style="padding-left:20px; padding-right:20px; padding-top: 5px; padding-bottom: 10px;" id="content-page" class="content group">


            <div id="content-blog" class="content group">

                <?php
                foreach ($partner->result() as $row) {
                    
                       $name = $row->name;
                   
                    ?> 
                    <h2 class="post-title"><?php echo $name; ?></h2>

                    <p><?php echo $row->des; ?></p>



                    <a href="<?php echo $row->link; ?>" target="_blank"><?php echo $row->link ?></a>
                    <?php
                   
                }
                ?>	


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
