<div class="col-lg-12">
            
            <div class="table-responsive">
                <table id="example" class="table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>English Menu</th>
                            <th>Khmer Menu</th>
                            <th>Status</th>
                        
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>English Title</th>
                            <th>Khmer Title</th>
                            <th>Youtube Video</th>
                           
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($list->result() as $row_video) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row_video->en_title; ?></td>
                                <td><?php echo $row_video->kh_title; ?></td>
                               
                                <td>
                                   <?php if($row_video->is_youtube==1){?>
                                        <?php $youtubeid =getYouTubeId($row_video->youtube_url); ?>
                                 <iframe width="320" height="200"
                                    src="http://www.youtube.com/embed/<?php echo $youtubeid; ?>">
                                 </iframe>  
                                  <?php  }else{?> 
                                   <video width="320" controls>
                                        <source src="<?php echo base_url().'videos/'.$row_video->youtube_url;?>" type="video/mp4">
                                        <source src="<?php echo base_url().'videos/'.$row_video->youtube_url;?>" type="video/ogg">
                                        Your browser does not support HTML5 video.
                                    </video>
                                  <?php } ?>
                                </td>
                             
                               
                                <td><?php if($row_video->is_youtube==1){?>
                                    <a href="<?php echo base_url() . 'manage_video/edit/' . $row_video->vid; ?>"><i class="fa fa-edit"></i> Edit</a> | 
                                    <a onclick ="return confirm('Arey you sure to delete?');" href="<?php echo base_url() . 'manage_video/delete/' .$row_video->vid; ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                <?php }else{?>
                                    <a href="<?php echo base_url() . 'manage_video/edite_upload/' . $row_video->vid; ?>"><i class="fa fa-edit"></i> Edit</a> | 
                                    <a onclick ="return confirm('Arey you sure to delete?');" href="<?php echo base_url() . 'manage_video/delete/' .$row_video->vid; ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                    <?php }?>
                                </td>

                            </tr>
                            <?php
                            $i++;
                        }
                        ?>


                    </tbody>
                </table>
                <br/><br>
            </div>
        </div>  