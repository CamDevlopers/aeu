<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <h3 class="text-center text-danger">Update Documents</h3><br/><br/>
       <table class="table table-hover">
           <tr>
               <th>File's Name</th>
               <th>Action</th>
           </tr>
           <?php 
                $name= '';
                $gid = '';
           ?>
          <?php foreach ($img_data->result() as $image){?>
           <tr>
               <td> <a target='_blank' href='<?php echo base_url()."documents/".$image->img_name;?>'><?php echo $image->img_name;?></a></td>
               <td> <span key='<?php echo $image->album_id; ?>' class='btn btn-danger delete'><i class='fa fa-trash-o'></i> Delete</span></td>
           </tr>
           
          <?php
          $name =$image->album_name;
          $gid = $image->gid;
          }?>
         </table>
       
    </div>
    <div class="row">
        <h3 class="text-center text-danger">Add more Files to Documents</h3><br/><br/>
        <div class="col-md-8 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo base_url(); ?>manage_document/add_albums" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-2 control-label">Files : </label>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                       <input name="userfile[]" id="userfile" type="file" multiple="" />
                    </div>
                    <input type='hidden' name='title' value='<?php echo $name;?>'/>
                    <input type='hidden' name='fac' value='<?php echo $gid;?>'/>
                   
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
            url: "<?php echo base_url();?>manage_document/delete_img", 
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
