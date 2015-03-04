<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-users"></i> Manage Banners </h3>
            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'manage_slideshow/form_add_slideshow'; ?>"><i class="fa fa-pencil"></i> Add new</a>
        </nav>
    </div>
    <div class="table-responsive">
        <table id="example" class="table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image Name</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Image Name</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $i = 1;
                foreach ($slideshow->result() as $slideshow) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                       <td><?php echo $slideshow->image_name; ?></td>
                        <td><?php echo $slideshow->image_description; ?></td>
                        <td><img src="<?php echo base_url() . 'images/slideshows/' . $slideshow->image_name; ?>" width="60px" height="50px" /></td>
                        <td><a href="<?php echo base_url() . 'manage_slideshow/form_update_slideshow/' . $slideshow->sid; ?>"><i class="fa fa-edit"></i> Edit</a> | <a href="<?php echo base_url() . 'manage_slideshow/delete_slideshow/' . $slideshow->sid; ?>" onclick="return confirm('Do you want to delete ?')"><i class="fa fa-edit"></i> Delete</a></td>

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