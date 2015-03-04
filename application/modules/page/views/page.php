<?php $this->load->view('frontend-initial/header'); ?>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <?php if($this->uri->segment(3)==2){?>
            <div id="comments">
                <h1 style="padding-left:20px;padding-top: 10px;">Feedback</h1>
                <form method='post' action='<?php echo base_url().'page/send';?>' style='padding-left: 10%;'>
                    Name: <br/><input style="width: 40%; height:30px;" type="text" required name="name"/></br>
                    Student's ID <small>(For Student only)</small>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year <small>(For Student only)</small>: 
                    <br/><input style="width: 15%; height:30px;" type="text" name="stu_id"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input style="width: 15%; height:30px;" type="text" name="year"/></br>
                    To AEU: <br/><input style="width: 40%; height:30px;" type="text" required name="aeu"/></br>
                    Email: <br/><input style="width: 40%; height:30px;" type="email" required name="email"/></br>
                    Subject: <br/><input style="width: 40%; height:30px;" type="text" required name="subject"/></br>
                    Message: <br/><textarea name='message' style="width:50%;height: 300px;"></textarea></br>
                    <input type='submit' value='Send feedback'/>
                </form>
            </div>
            <?php }?>
        <div style="padding-left:20px; padding-right:20px; padding-top: 5px; padding-bottom: 10px;" id="content-page" class="content group">
            <h2><?php echo $content->title; ?></h2>
            <div class="hentry group">
                <?php echo $content->content; ?>
            </div>
            <!-- START COMMENTS -->
            
            <br/>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
<?php $this->load->view('frontend-initial/footer'); ?>
