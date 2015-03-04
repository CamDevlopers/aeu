<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Add New Partner</h3><br/><br/>
        <div class="col-md-12">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_partner/add_partner" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-2 control-label">Image : </label>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input type="file" accept="image/*" name="img_partner[]" required=""/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">URL : </label>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="link" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">English Name :  </label>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="en_name" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Name : </label>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="kh_name" class="form-control"/>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label>English Description</label>
                    <?php
                    $this->fckeditor->Create("","en_des");
                    ?>
                </div>
                <div class="form-group col-lg-12">
                    <label>Khmer Description</label>
                    <?php
                    $this->fckeditor->Create("","kh_des");
                    ?>
                </div>
               
                <div class="col-sm-6 col-md-6 col-lg-6">
                       <input type="submit" value="Save" name="save" class="btn btn-success"/>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                       <br/><br/>
                </div>
                
            </form>
        </div>
        <br/><br/>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
