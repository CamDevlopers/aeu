

<div class="col-lg-12">
    <!-- Advanced Tables -->

    <?php
    $error_add = validation_errors();
    if ($error_add != "") {
        ?>
        <div class="alert alert-warning"><?php echo $error_add; ?></div>
        <?php
    }
    ?>

    <div class="panel panel-default">

        <div class="panel-heading">
            <span class="lead"><i class="fa fa-plus"></i> Add Video</span>

        </div>
        <div class="panel-body">
            <form  role="form" action="<?php echo base_url() . 'manage_video/add'; ?>" name="form1" method="post">
                <div class="form-group col-lg-7 pull-left">
                    <label>English Title</label>
                    <input class="form-control" name="en_title" >
                    <input type="hidden" value="1" name="is_youtube" >
                </div>
                <div class="form-group col-lg-7 pull-left">
                    <label>Khmer Title</label>
                    <input class="form-control"  name="kh_title">

                </div>

                <div class="form-group col-lg-7 pull-left">
                    <label>Youtube URL</label>
                    <input class="form-control"  name="url" required="">

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
