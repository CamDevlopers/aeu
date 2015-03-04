<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-list"></i> Manage Categories</h3>

            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'manage_categories/form_add_categories'; ?>"><i class="fa fa-pencil"></i> Add new</a>

        </nav>
    </div>
        <div class="table-responsive">
        <table id="example" class="table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title(en)</th>
                    <th>Title(kh)</th>
                    
                    <th>faculty</th>
                    <th style="width: 132px;">Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Title(en)</th>
                    <th>Title(kh)</th>
                    
                    <th>faculty</th>
                    <th style="width: 132px;">Action</th>
                </tr>
            </tfoot>

            <tbody>
                
                
                    <?php  
                    $i=1;
                    foreach ($cat->result() as $value){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value->et;?></td>
                        <td><?php echo $value->kt;?></td>
                        <td><?php echo $value->fet;?></td>
                        <td><a href="<?php echo base_url().'manage_categories/form_update_categories/'.$value->cid;?>"><i class="fa fa-edit"></i> Edit</a> | <a href="<?php echo base_url().'manage_categories/delete_categories/'.$value->cid;?>" onclick="return confirm('Do you want to delete ?')"><i class="fa fa-trash-o"></i> Delete</a></td>
                        
                    </tr>
                    <?php 
                    $i++;
                    }  ?>
                    
                
            </tbody>
        </table>
            <br/></br>
    </div>
</div>

<?php $this->load->view('admin-initial/footer'); ?>