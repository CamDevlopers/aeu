<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Update Partner</h3><br/><br/>
        <div class="col-md-12">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_partner/update_partner" method="post" enctype="multipart/form-data">

                <?php
                foreach ($data->result() as $partner) {
                    ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Image : </label>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                            <img src="<?php echo base_url('images/partners/' . $partner->image_name); ?>" name="img_partner" alt=""/></div><br/><br/>
                            <input type="file" accept="image/*" name="img_partner[]" class="form" value="<?php echo $partner->image_name; ?>"/>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">URL : </label>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="link" class="form-control" required="" value="<?php echo $partner->link; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-2 control-label">English Name :  </label>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="en_name" class="form-control" value="<?php echo $partner->en_name; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Name : </label>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="kh_name" class="form-control" value="<?php echo $partner->kh_name; ?>"/>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label>English Description</label>
                    <?php
                    $this->fckeditor->Create( $partner->image_description,"en_des");
                    ?>
                </div>
                <div class="form-group col-lg-12">
                    <label>Khmer Description</label>
                    <?php
                    $this->fckeditor->Create($partner->kh_description,"kh_des");
                    ?>
                </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <input type="hidden" value="<?php echo $partner->pid; ?>" name="id"/>
                            <a href="<?php echo base_url() . 'manage_partner' ?>"><input type="button" value="Cancel" name="cancel" class="btn btn-warning"/></a>
                            <input type="submit" value="Save" name="save" class="btn btn-success"/>
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
