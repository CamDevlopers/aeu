<?php $this->load->view('admin-initial/header'); ?>

<div class="container main">
    <h3 class="text-center text-danger"><i class="fa fa-user"></i> Add new User</h3>
   <?php
    echo form_open('manage_users/save', array('id' => 'employee_form', 'class' => 'form-horizontal'));
    ?>
    <legend class="text-success"><i class="fa fa-info-circle"></i> User Information:</legend>
    <div class="form-group">
        <?php echo form_label("User Level" . ':', 'user_level', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <select class="form-control" name="user_level" id="user_level">
                <option <?php echo set_value('user_level')==1?"selected='selected'":"";?> value="1">Admin</option>
                <option <?php echo set_value('user_level')==2?"selected='selected'":"";?> value="2">User</option>
            </select>
        </div>
       
    </div>
    <div class="form-group">
        <?php echo form_label("Full name" . ':', 'fullname', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label ')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <?php
            echo form_input(array(
                'name' => 'fullname',
                'id' => 'fullname',
                'class' => 'form-control form-inps',
                'value' =>  set_value('fullname'))
            );
            ?>
            <span class="text-danger"> <?php echo form_error('fullname');?></span>
        </div>
        <?php echo form_label("Email" . ':', 'email', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label ')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <?php
            echo form_input(array(
                'name' => 'email',
                'id' => 'email',
                'class' => 'form-control form-inps',
                'value' => set_value('email'))
            );
            ?>
            <span class="text-danger"> <?php echo form_error('email');?></span>
        </div>
    </div>
    <div class="form-group">
        <?php echo form_label("Username" . ':', 'username', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label ')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <?php
            echo form_input(array(
                'name' => 'username',
                'id' => 'username',
                'class' => 'form-control form-inps',
                'value' =>  set_value('username'))
            );
            ?>
            <span class="text-danger"> <?php echo form_error('username');?></span>
        </div>
        <?php echo form_label("Phone" . ':', 'phone', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label ')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <?php
            echo form_input(array(
                'name' => 'phone',
                'id' => 'phone',
                'class' => 'form-control form-inps',
                'value' => set_value('phone'))
            );
            ?>
            <span class="text-danger"> <?php echo form_error('phone');?></span>
        </div>
    </div>
    <div class="form-group">
        <?php echo form_label("Password" . ':', 'password', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label ')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <?php
            echo form_input(array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control form-inps',
                'value' =>'')
            );
            ?>
            <span class="text-danger"> <?php echo form_error('password');?></span>
        </div>
        <?php echo form_label("Re-password" . ':', 're-password', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label ')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <?php
            echo form_input(array(
                'name' => 're-password',
                'id' => 're-password',
                'type' => 'password',
                'class' => 'form-control form-inps',
                'value' => '')
            );
            ?>
            <span class="text-danger"> <?php echo form_error('re-password');?></span>
        </div>
    </div>
    <legend class="text-success"><i class="fa fa-lock"> </i> Permission:</legend>
    
    <?php 
    $this->load->model('manage_faculties/manage_faculty');
    $faculty = $this->manage_faculty->get_all();
    foreach ($faculty->result() as $faculties){?>
    <b class="text-success"><?php echo $faculties->en_title.' - '.$faculties->kh_title;?></b>
    <div class="form-group">
        <?php $category = $this->manage_faculty->get_category_by_faculty($faculties->fid); 
            foreach ($category->result() as $categories){
            ?>
        <div class="col-sm-1 col-md-1 col-lg-1 text-right">
                <?php
                echo form_input(array(
                    'name' => 'permission[]',
                    'type' => 'checkbox',
                    'class' => 'form-inps',
                    'value' => $categories->cid)
                );
            ?>
           
       
        </div>
         <?php echo form_label($categories->en_title.' - '.$categories->kh_title, 're-password', array('class' => 'col-sm-5 col-md-5 col-lg-5 padding-left')); ?>
        <?php  } ?>
    </div>
    <?php  } ?>
    
    <div class="form-group">
         <div class="col-sm-9 col-md-9 col-lg-9"></div>
         <div class="col-sm-3 col-md-3 col-lg-3"><input type="submit" class="btn btn-info" value="Save"/></div>
    </div>
    <?php echo form_close();?>
    <br/></br>
</div>
<?php $this->load->view('admin-initial/footer'); ?>
    