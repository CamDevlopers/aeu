<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Edit Event</h3><br/>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_event/update_event" method="post" enctype="multipart/form-data">
                <?php 
                    foreach ($data->result() as $value){
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Category : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                            <select class="form-control" name="cat_name">
                                <?php
                                foreach ($cat->result() as $cats) {
                                    ?>
                                    <option <?php echo $cats->cid==$value->cat_id?"selected":"";?> value="<?php echo $cats->cid; ?>"><?php echo $cats->en_title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-3 col-md-3 col-lg-3 thumbnail">
                        <img src="<?php echo base_url();?>images/thumbnial/<?php echo $value->thumbnail;?>" width="300"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Thumbnail : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                         <input type="file" name="thumbnial[]" accept="imgage/*" value="" class=""/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">English Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title_en" required="" value="<?php echo $value->en_title;?>" class="form-control"/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">English Short Description : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <textarea name="s_des_en" class="form-control"><?php echo $value->en_short_desc;?></textarea>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label>English Content</label>

                    <?php
                    $this->fckeditor->Create($value->en_long_desc,"l_des_en");
                    ?>
                </div>
                
                <!--for khmer content -->
               
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title_kh" required="" class="form-control" value="<?php echo $value->kh_title;?>"/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Short Description : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <textarea name="s_des_kh" class="form-control"><?php echo $value->kh_short_desc;?></textarea>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label>English Content</label>

                    <?php
                    $this->fckeditor->Create($value->kh_long_desc,"l_des_kh");
                    ?>
                </div>
                <input type="hidden" name="id" value="<?php echo $value->eid;?>" />
                <div class="form-group">
                    <div class="col-sm-8 col-md-offset-4 col-lg-6 text-right">
                        <a href="<?php echo base_url().'manage_event'?>"><input type="button" value="Cancel" name="cancel" class="btn btn-warning"/></a>
                        <input type="submit" value="Save" name="save" class="btn btn-success"/>
                    </div>
                </div>
                    <?php } ?>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
