<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Edit Event</h3><br/>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_categories/update_categories" method="post" enctype="multipart/form-data">
                <?php 
                    foreach ($data->result() as $value){
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Faculty : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                         <select class="form-control" name="fac_name">
                            <?php foreach ($faculty->result() as $faculties){?>
                            <option <?php echo $faculties->fid==$value->fac_id?"selected":"";?> value="<?php echo $faculties->fid;?>"><?php echo $faculties->en_title?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">English Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title_en" value="<?php echo $value->en_title; ?>" class="form-control">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title_kh" value="<?php echo $value->kh_title; ?>" required="" class="form-control"/>
                    </div>
                    
                </div>
                <div class="form-group col-lg-12">
                    <label>English Description</label>
                    <?php
                    $this->fckeditor->Create($value->en_description, "en_des");
                    ?>
                </div>
                <div class="form-group col-lg-12">
                    <label>Khmer Description</label>
                    <?php
                    $this->fckeditor->Create($value->kh_description, "kh_des");
                    ?>
                </div>

                <input type="hidden" name="id" value="<?php echo $value->cid;?>" />
                <div class="form-group">
                    <div class="col-sm-8 col-md-offset-4 col-lg-6 text-right">
                        <a href="<?php echo base_url().'manage_categories'?>"><input type="button" value="Cancel" name="cancel" class="btn btn-warning"/></a>
                        <input type="submit" value="Save" name="save" class="btn btn-success"/>
                    </div>
                </div>
                    <?php } ?>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
