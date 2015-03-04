<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Add Document</h3><br/><br/>
        <div class="col-md-8 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_document/add_albums" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-2 control-label">Faculty : </label>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                       <select name="fac" class="form-control">
                           <?php foreach ($fac->result() as $facs){?>
                               <option value="<?php echo $facs->fid;?>"><?php echo $facs->en_title?></option>
                          <?php }?>
                           
                       </select>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Files : </label>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                       <input name="userfile[]" id="userfile" accept="" type="file" multiple="" />
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Document's title : </label>
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
