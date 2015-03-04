<div class="col-lg-12">
            
            <div class="table-responsive">
                <table id="example" class="table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>English Menu</th>
                            <th>Khmer Menu</th>
                            <th>Status</th>
                            <th>Menu Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>English Menu</th>
                            <th>Khmer Menu</th>
                            <th>Status</th>
                            <th>Menu Order</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($list_page->result() as $row_menu) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row_menu->en_menu; ?></td>
                                <td><?php echo $row_menu->kh_menu; ?></td>
                                <td>
                                    <?php
                                    $status = $row_menu->m_status;
                                    echo $status == 1 ? "Display" : "Hidden";
                                    ?>
                                </td>
                                <td><?php echo $row_menu->m_order; ?></td>
                                <td><a href="<?php echo base_url() . 'manage_pages/edit_page/' . $row_menu->mid; ?>"><i class="fa fa-edit"></i> Edit</a> | 
                                   <?php if($row_menu->mid!=2){?> <a onclick ="return confirm('Arey you sure to delete?');" href="<?php echo base_url() . 'manage_pages/delete_page/' . $row_menu->mid; ?>"><i class="fa fa-trash-o"></i> Delete</a><?php } ?></td>

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