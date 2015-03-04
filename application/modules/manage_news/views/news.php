<?php $this->load->view('admin-initial/header');?>
<div class="container main">
    <div class="row">
        <nav>
            <h3 class="pull-left text-danger"> &nbsp;&nbsp;&nbsp;<i class="fa fa-archive"></i> Manage News</h3>

            <a class="padding-right btn btn-info pull-right" href="<?php echo base_url() . 'manage_news/form_add_news'; ?>"><i class="fa fa-pencil"></i> Add new</a>

        </nav>
    </div>
        <div class="table-responsive">
        <table id="example" class="table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title(en)</th>
                    <th>Title(kh)</th>
                    <th>Thumbnail</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Title(en)</th>
                    <th>Title(kh)</th>
                    <th>Thumbnail</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                
                
                    <?php  
                    $i=1;
                    $this->load->model('manage_sub_categories/m_sub_categories');
                    foreach ($news->result() as $value){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value->en_title;?></td>
                        <td><?php echo $value->kh_title;?></td>
 
                        <td><img src="<?php echo base_url();?>images/thumbnial/<?php echo $value->thumbnial;?>" width="100"/></td>
                        <td><?php echo $this->m_sub_categories->get_main_cat($value->cat_id)?$this->m_sub_categories->get_main_cat($value->cat_id):'No set';?></td>
                        <td><a href="<?php echo base_url().'manage_news/form_update_news/'.$value->nid;?>"><i class="fa fa-edit"></i> Edit</a> | <a href="<?php echo base_url().'manage_news/delete_news/'.$value->nid;?>" onclick="return confirm('Do you want to delete ?')"><i class="fa fa-trash-o"></i> Delete</a></td>
                        
                    </tr>
                    <?php 
                    $i++;
                    }  ?>
                    
                
            </tbody>
        </table>
            <br/></br>
    </div>
</div>
    
  <?php $this->load->view('admin-initial/footer');?>