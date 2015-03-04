<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Add Albums</h3><br/><br/>
        <div class="col-md-8 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo base_url(); ?>photo_albums/add_albums" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-2 control-label">Images : </label>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                       <input name="userfile[]" id="userfile" accept="image/*" type="file" multiple="" />
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Album's title : </label>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="title" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-md-8 col-lg-8 text-right">
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
