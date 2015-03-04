<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Add Sub Categories</h3><br/>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_sub_categories/add_sub_categories" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-md-2 control-label">Parent Category : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <select class="form-control" name="subid">
                            <?php
                            foreach ($cat->result() as $value) {
                                ?>
                                <option value="<?php echo $value->cid; ?>"><?php echo $value->en_title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label">English Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title_en" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label">Khmer Title : </label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="title_kh" required="" class="form-control"/>
                    </div>
                </div>

                <div class="form-group col-lg-12">
                    <label>English Description</label>
                    <?php
                    $this->fckeditor->Create("", "en_des");
                    ?>
                </div>
                <div class="form-group col-lg-12">
                    <label>Khmer Description</label>
                    <?php
                    $this->fckeditor->Create("", "kh_des");
                    ?>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 col-md-offset-4 col-lg-6 text-right">
                        <a href="<?php echo base_url() . 'manage_sub_categories' ?>"><input type="button" value="Cancel" name="cancel" class="btn btn-warning"/></a>
                        <input type="submit" value="Save" name="save" class="btn btn-success"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>
<script src="<?php echo base_url() . 'admin-assets'; ?>/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>fckeditor/fckeditor.js"></script>