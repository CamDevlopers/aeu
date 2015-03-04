<?php $this->load->view('admin-initial/header'); ?>

<div class="container main">
   
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-users"></i> User Logs</h3>

            
        </nav>
    </div>
        <div class="table-responsive">
        <table id="example" class="table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Full Name</th>
                    <th>Activities</th>
                   
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Full Name</th>
                    <th>Activities</th>
                </tr>
            </tfoot>

            <tbody>
                    <?php
                    $i=1;
                    foreach ($log->result() as $logs){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $logs->date ?></td>
                        <td><?php echo $logs->fullname ?></td>
                        <td><?php echo $logs->activities ?></td>
                        
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
    