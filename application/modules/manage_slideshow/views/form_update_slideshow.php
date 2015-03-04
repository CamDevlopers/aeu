<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Update Slideshow</h3><br/><br/>
        <div class="col-md-8 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_slideshow/update_slideshow" method="post" enctype="multipart/form-data">
               
                <?php 
                    foreach ($data->result() as $slideshow){
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Image : </label>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="thumbnail"><img src="<?php echo base_url('images/slideshows/' . $slideshow->image_name); ?>" name="img_partner" alt=""/></div><br/><br/>
                        <input type="file" name="img_slide[]" accept="image/*" class="form"/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title" class="form-control" value="<?php echo $slideshow->title; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Description : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <textarea name="img_des" class="form-control"><?php echo $slideshow->image_description; ?></textarea>
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-md-8 col-lg-8 text-right">
                        <input type="hidden" value="<?php echo $slideshow->sid; ?>" name="id"/>
                        <a href="<?php echo base_url().'manage_slideshow'?>"><input type="button" value="Cancel" name="cancel" class="btn btn-warning"/></a>
                        <input type="submit" value="Save" name="save" class="btn btn-success"/>
                    </div>
                </div>
                    <?php } ?>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
