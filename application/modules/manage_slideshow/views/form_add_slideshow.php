<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Add New Slideshow</h3><br/><br/>
        <div class="col-md-8 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_slideshow/add_slideshow" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-2 control-label">Image : </label>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input type="file" accept="image/*" name="img_slide[]" required=""/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title" class="form-control" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Description : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <textarea name="img_des" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-md-8 col-lg-8 text-right">
                        <a href="<?php echo base_url().'manage_slideshow'?>"><input type="button" value="Cancel" name="cancel" class="btn btn-warning"/></a>
                        <input type="submit" value="Save" name="save" class="btn btn-success"/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
