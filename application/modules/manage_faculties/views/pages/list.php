<div class="col-lg-12">
            
            <div class="table-responsive">
                <table id="example" class="table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>English Title</th>
                            <th>Khmer Title</th>
                            <th>Faculty Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>English Title</th>
                            <th>Khmer Title</th>                  
                            <th>Faculty Order</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($faculty->result() as $row_faculty) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row_faculty->en_title; ?></td>
                                <td><?php echo $row_faculty->kh_title; ?></td>
                                
                                <td><?php echo $row_faculty->f_order; ?></td>
                                <td><a href="<?php echo base_url() . 'manage_faculties/edit/' . $row_faculty->fid; ?>"><i class="fa fa-edit"></i> Edit</a> | 
                                   <?php if($row_faculty->fid!=6){?> <a onclick ="return confirm('Arey you sure to delete?');" href="<?php echo base_url() . 'manage_faculties/delete/' . $row_faculty->fid; ?>"><i class="fa fa-trash-o"></i> Delete</a><?php }?>
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