<?php $this->load->view('admin-initial/header'); ?>

<div class="container main">
   
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-users"></i> Manage Users</h3>

            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'manage_users/view'; ?>"><i class="fa fa-pencil"></i> Add new</a>

        </nav>
    </div>
        <div class="table-responsive">
        <table id="example" class="table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                    <?php
                    $i=1;
                    foreach ($user_data->result() as $user){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $user->fullname ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->phone ?></td>
                        <td><a href="<?php echo base_url().'manage_users/view_user?user_id='.$user->uid;?>"><i class="fa fa-edit"></i> Edit</a> | <a onclick ="return confirm('Arey you sure to delete?');" href="<?php echo base_url().'manage_users/delete/'.$user->uid;?>"><i class="fa fa-trash-o"></i> Delete</a></td>
                        
                    </tr>
                    <?php 
                    $i++;
                    }?>
                    
                
            </tbody>
        </table>
            <br/></br>
    </div>
</div>
<?php $this->load->view('admin-initial/footer'); ?>
    