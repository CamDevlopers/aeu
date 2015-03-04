<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div style="padding-left:20px; padding-right:20px; padding-top: 5px; padding-bottom: 10px;" id="content-page" class="content group">
            
           
            <div id="content-blog" class="content group">
			
			<?php foreach ($events->result() as $row) { 
            ?> 
			<h2 class="post-title"><?php echo $row->title; ?></h2>
                        <h5 style="color:#107EDA;">Posted by : <?php echo $row->fullname; ?> | Date: <?php echo date("l d/m/Y", strtotime($row->date)); ?></h5>
				
			<p><?php echo $row->long_desc; ?></p>

				            
				            
				            
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
