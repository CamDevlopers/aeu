<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Update Albums</h3><br/><br/>
       
          <?php foreach ($img_data->result() as $image){?>
           
           <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
              <img src='<?php echo base_url()."images/photo_albums/".$image->img_name;?>'/>
              <?php echo $image->img_name;?>
              <span key='<?php echo $image->album_id; ?>' class='btn btn-danger delete'><i class='fa fa-trash-o'></i> Delete</span>
            </a>
          </div>
          <?php  }?>
       
    </div>
    <div class="row">
        <h3 class="text-center text-danger">Add more images to album</h3><br/><br/>
        <div class="col-md-8 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo base_url(); ?>photo_albums/add_albums" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-2 control-label">Images : </label>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                       <input name="userfile[]" id="userfile" accept="image/*" type="file" multiple="" />
                    </div>
                    <input type='hidden' name='title' value='<?php echo $image->album_name;?>'/>
                    <input type='hidden' name='gid' value='<?php echo $image->gid;?>'/>
                   
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-md-8 col-lg-8 text-right">
                        <a class='btn btn-danger' href='<?php echo base_url().'photo_albums'?>'>Back</a>
                            <input type="submit" value="Save" name="save" class="btn btn-success"/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                    
                </div>
            </form>
        </div>
    </div>
</div>
<script type='text/javascript'>
$(function(){
    $(".delete").click(function(){
        var conf = confirm("Are you sure to delete?");
        var id = $(this).attr('key');
        if(conf==1){
           $.ajax({
            type: "POST",
            data: {key: id},
            url: "<?php echo base_url();?>photo_albums/delete_img", 
            success: 
                 function(data){
                  location.reload();
                 }
             });
         }
    });
});
</script>
<?php $this->load->view('admin-initial/footer'); ?>
