<?php $this->load->view('frontend-initial/header'); ?>
<?php $lang = $this->session->userdata('language') ? $this->session->userdata('language') : 'english'; ?>
<div id="primary" class="sidebar-left">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-page" class="content group">
            <div class="hentry group">
                <?php if($this->uri->segment(2) !='document'){ ?>
                <h3><?php echo $fac->title; ?></h3>
                <?php echo $fac->description; ?>
                <?php } else{?>
                <h3><?php echo lang('document_'.$lang); ?></h3>
                <table>
                    <tr>
                        <td width='80%'><h2>File's Name</h2></td>
                        <td width='10%'><h2>Action</h2></td>
                    </tr>
                    
                    <?php 
                    if($file->num_rows() > 0){
                    foreach ($file->result() as $item){
                    ?>
                        <tr>
                            <td><i class='icon icon-arrow-right'></i> <?php echo $item->img_name;?></td>
                            <td><a target='_blank' class='btn btn-info' href='<?php echo base_url().'documents/'.$item->img_name;?>'> Download </a></td>
                        </tr>
                    <?php
                    }
                    }else{ ?>
                        <tr> <td><center>No file... </center></td><td></td></tr>
                   <?php }
                   ?>
                </table>
                <?php }?>
                <br/><br/>
            </div>
            <!-- START COMMENTS -->
            <div id="comments">
            </div>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <?php $lang = $this->session->userdata('language') ? $this->session->userdata('language') : 'english'; ?>
        <!-- START SIDEBAR -->
        <div class="sidebar group">
            
            <div class="widget-first widget recent-posts">
                <h3><?php echo $fac->title; ?></h3>
                <?php $this->load->model('manage_sub_categories/m_sub_categories');?>
                <?php foreach ($category->result() as $categories){ ?>
                <div class="toggle">
                    <p class="tab-index tab-closed"><a href="#" title="Close"><span class="icon-plus-sign"></span> <?php echo $categories->title;?></a></p>
                    <div style="padding-left: 20px;" class="content-tab closed">
                        <ul class="nav">
                            <?php foreach($this->pages->get_sub_category($categories->cid)->result() as $sub){?>
                            <li><i class="icon icon-arrow-right"></i> <a href="<?php echo base_url().'page/cat/'.$this->uri->segment(3).'/'.$sub->cid;?>"><?php echo $sub->title;?></a></li>
                           <?php }?>
                            
                        </ul>
                    </div>
                </div>
                
                
                
                <?php }?>
                <div class="toggle">
                    <p class="tab-index tab-closed"><a href="#" title="Close"><span class="icon-plus-sign"></span> <?php echo lang('document_'.$lang);?></a></p>
                    <div style="padding-left: 20px;" class="content-tab closed">
                        <ul class="nav">
                           
                            <li><i class="icon icon-arrow-right"></i> <a href="<?php echo base_url().'page/document/'.$this->uri->segment(3);?>"><?php echo lang('show_'.$lang);?></a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>

            <div class="widget-last widget text-image">
                <h3><?php echo $this->lang->line('event_' . $lang); ?></h3>
                 <?php foreach ($event->result() as $events) { ?>
                <div class="text-image" style="text-align:left"><img src="<?php echo base_url() ?>images/thumbnial/<?php echo $events->thumbnial; ?>" alt="Customer support" /></div>
               <a class="title" href="<?php echo base_url(); ?>page/event/<?php echo $events->eid; ?>"><?php echo $events->title; ?></a>
                <p><?php echo $events->sort_desc; ?>  <a class="" href="<?php echo base_url(); ?>page/event/<?php echo $events->eid; ?>">&rarr; <?php echo lang('read_more_' . $lang); ?></a></p>
                 <?php } ?>
            </div>

        </div>
        <!-- END SIDEBAR -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
<?php $this->load->view('frontend-initial/footer'); ?>
