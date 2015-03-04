<?php $this->load->view('admin-initial/header'); ?>
<div class="container main">
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-film"></i> Manage Video</h3>
        </nav>
    </div>

    <div class="row">

<div class="col-lg-12">
    <!-- Advanced Tables -->

    <?php
    $error_add = validation_errors();
    if ($error_add != "") {
        ?>
        <div class="alert alert-warning"><?php echo $error_add; ?></div>
        <?php
    }
    
    foreach ($video->result() as $row_video){
        
        $en_title = $row_video->en_title;
        $kh_title = $row_video->kh_title;
        $url = $row_video->youtube_url;
        $v_order = $row_video->v_order;
        $id = $row_video->vid;
    }
    ?>

    <div class="panel panel-default">

        <div class="panel-heading">
            <span class="lead"><i class="fa fa-plus"></i> Edit Video</span>

        </div>
        <div class="panel-body">
            <form  role="form" action="<?php echo base_url() . 'manage_video/edit_upload/'; ?>" name="form1" method="post" enctype="multipart/form-data">
                <div class="form-group col-lg-7 pull-left">
                    <label>English Title</label>
                    <input class="form-control" name="en_title" value="<?php echo $en_title ?>">
                    <input type="hidden"class="form-control" name="vid" value="<?php echo $id ?>">

                </div>
                <div class="form-group col-lg-7 pull-left">
                    <label>Khmer Title</label>
                    <input class="form-control"  name="kh_title" value="<?php echo $kh_title ?>">

                </div>
                <video width="400" controls>
                    <source src="<?php echo base_url().'videos/'.$url;?>" type="video/mp4">
                    <source src="<?php echo base_url().'videos/'.$url;?>" type="video/ogg">
                    Your browser does not support HTML5 video.
                </video>
                <div class="form-group col-lg-7 pull-left">
                    <label>File</label>
                    <input type="file" accept="video/*" class="form-control"  name="video[]">

                </div>
                
                <div class="form-group col-lg-12"><br/>
                    <input type="submit" class="btn btn-primary" value="Save" name="btn_save">
                    <button type="reset" class="btn btn-success">Reset</button>
                </div>

            </form>
        </div>
    </div>
    <!--End Advanced Tables -->
</div>
   </div>   <?php $this->load->view('admin-initial/footer'); ?>
