

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
            <span class="lead"><i class="fa fa-pencil"></i> Edit Page</span>

        </div>
        <div class="panel-body">
            <?php
            foreach ($menu->result() as $row_emenu) {

                $en_menu = $row_emenu->en_menu;
                $kh_menu = $row_emenu->kh_menu;
                $status = $row_emenu->m_status;
                $m_order = $row_emenu->m_order;
                $en_des = $row_emenu->en_description;
                $kh_des = $row_emenu->kh_description;
            }
            ?>

            <form  role="form" action="<?php echo base_url() . 'manage_pages/edit_page/' . $this->uri->segment(3); ?>" method="post">
                <div class="form-group col-lg-7 pull-left">
                    <label>English Menu</label>
                    <input class="form-control" name="en_menu" value="<?php echo $en_menu; ?>" required="">

                </div>
                <div class="form-group col-lg-7 pull-left">
                    <label>Khmer Menu</label>
                    <input class="form-control"  name="kh_menu" value="<?php echo $kh_menu; ?>" required="">

                </div>


                <div class="form-group  col-lg-7 pull-left">
                    <label>Status</label>
                    <select class="form-control"  name="status" required="">

                        <option <?php echo $status == 0 ? 'selected="selected"' : ''; ?> value="0">Hidden</option>
                        <option <?php echo $status == 1 ? 'selected="selected"' : ''; ?> value="1">Display</option>
                    </select>
                </div>
                <div class="form-group col-lg-7 pull-left">
                    <label>Menu Order</label>
                    <input class="form-control"  value="<?php echo $m_order; ?>"  name="m_order">

                </div>
                <div class="form-group col-lg-12">
                    <label>English Description</label>
                    <?php
                    $fckeditorConfig = array(
                        'instanceName' => 'items[]',
                        'BasePath' => base_url() . 'fckeditor/',
                        'ToolbarSet' => 'Basic',
                        'Width' => '100%',
                        'Height' => '500',
                        'Value' => 'TESTS'
                    );                                      
                    $this->load->library('fckeditor', $fckeditorConfig);
                    
                    ?>
                    <?php
                    $this->fckeditor->Create($en_des,"en_des");
                    ?>
                   
                </div>
                <div class="form-group col-lg-12">
                    <label>Khmer Description</label>
                    
                    <?php
                    
                    $this->fckeditor->Create($kh_des,"kh_des");
                    ?>
                </div>
                <div class="form-group col-lg-12">
                    <input type="submit" class="btn btn-primary" value="Update" name="btn_edit">
                    <button type="reset" class="btn btn-success">Reset</button>
                </div>

            </form>



        </div>
    </div>
    <!--End Advanced Tables -->
</div>

<script src="<?php echo base_url() . 'admin-assets'; ?>/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>fckeditor/fckeditor.js"></script>