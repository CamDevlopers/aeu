<?php $this->load->view('admin-initial/header');?>
<div class="container main">
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-picture-o"></i> Manage Photo albums</h3>

            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'photo_albums/form_add_album'; ?>"><i class="fa fa-pencil"></i> Add new albums</a>

        </nav>
    </div>
        <div class="table-responsive">
        <table id="example" class="table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Album's Name</th>
                    <th>Number of Photos</th>
                    <?php if($this->session->userdata('level')==1){ echo '<th>Post By</th>';}?>
                    <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Album's Name</th>
                    <th>Number of Photos</th>
                     <?php if($this->session->userdata('level')==1){ echo '<th>Post By</th>';}?>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                
                    <?php 
                    $i=1;
                    foreach ($albums->result() as $album){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $album->album_name; ?></td>
                        <td><?php echo $album->number?$album->number." Photos":0; ?></td>
                        <?php if($this->session->userdata('level')==1){?><td><?php echo $album->name; ?></td><?php } ?>
                        <td><a href="<?php echo base_url().'photo_albums/form_update_album/'.$album->gid;?>"><i class="fa fa-edit"></i> Edit</a> | <a href="<?php echo base_url().'photo_albums/delete_album/'.$album->gid;?>" onclick="return confirm('Do you want to delete ?')"><i class="fa fa-edit"></i> Delete</a></td>
                        
                    </tr>
                    <?php 
                    $i++;
                    }  ?>
                    
                
            </tbody>
        </table>
            <br/></br>
    </div>
</div>
    
  <?php $this->load->view('admin-initial/footer');?>