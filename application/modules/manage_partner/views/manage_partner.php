<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-users"></i> Manage Partners</h3>

            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'manage_partner/form_add_partner'; ?>"><i class="fa fa-pencil"></i> Add new</a>

        </nav>
    </div>
    <div class="table-responsive">
        <table id="example" class="table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>English Name</th>
                    <th>Khmer Name</th>
                    <th>URL</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>English Name</th>
                    <th>Khmer Name</th>
                    <th>URL</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>

                <?php
                $i = 1;
                foreach ($partner->result() as $partner) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $partner->en_name; ?></td>
                        <td><?php echo $partner->kh_name; ?></td>
                        <td><?php echo $partner->link; ?></td>
                        <td><img src="<?php echo base_url() . 'images/partners/' . $partner->image_name; ?>" width="60px" height="50px" /></td>
                        <td><a href="<?php echo base_url() . 'manage_partner/form_update_partner/' . $partner->pid; ?>"><i class="fa fa-edit"></i> Edit</a> | <a href="<?php echo base_url() . 'manage_partner/delete_partner/' . $partner->pid; ?>" onclick="return confirm('Do you want to delete ?');"><i class="fa fa-edit"></i> Delete</a></td>

                    </tr>
                    <?php
                    $i++;
                }
                ?>


            </tbody>
        </table>
        <br/></br>
    </div>
</div>
<?php $this->load->view('admin-initial/footer'); ?>