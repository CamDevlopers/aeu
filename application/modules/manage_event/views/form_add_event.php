<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Add Event</h3><br/>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_event/add_event" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label class="col-md-2 control-label">Category : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                    <select class="form-control" name="cat_name">
                            <?php
                            foreach ($cat->result() as $value) {
                                ?>
                                <option value="<?php echo $value->cid; ?>"><?php echo $value->en_title; ?></option>
                            <?php } ?>
                        </select>
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
                        <input type="text" name="title_en" required="" class="form-control"/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">English Short Description : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <textarea name="s_des_en" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label>English Content</label>

                    <?php
                    $this->fckeditor->Create("","l_des_en");
                    ?>
                </div>
                
                <!--for khmer content -->
                
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title_kh" required="" class="form-control"/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Short Description : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <textarea name="s_des_kh" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label>Khmer Content</label>

                    <?php
                    $this->fckeditor->Create("","l_des_kh");
                    ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-md-offset-4 col-lg-6 text-right">
                        <a href="<?php echo base_url().'manage_event'?>"><input type="button" value="Cancel" name="cancel" class="btn btn-warning"/></a>
                        <input type="submit" value="Save" name="save" class="btn btn-success"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
