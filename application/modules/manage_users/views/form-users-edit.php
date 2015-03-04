<?php $this->load->view('admin-initial/header'); ?>

<div class="container main">
    <h3 class="text-center text-danger"><i class="fa fa-user"></i> <?php echo "Update Profile";?></h3>
    <legend class="text-success"><i class="fa fa-info-circle"></i> User Information:</legend>
   <?php
    echo form_open('manage_users/view_user', array('id' => 'employee_form', 'class' => 'form-horizontal'));
    ?>
    <div class="form-group">
        <?php echo form_label("User Level" . ':', 'user_level', array('class' => 'col-sm-2 col-md-2 col-lg-2 control-label')); ?>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <select class="form-control" name="user_level" id="user_level" <?php echo $this->session->userdata('level')==2?'disabled':'';?>>
                <option <?php echo $user_info->level==1?"selected='selected'":"";?> value="1">Admin</option>
                <option <?php echo $user_info->level==2?"selected='selected'":"";?> value="2">User</option>
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
                'value' =>  set_value('fullname')?set_value('fullname'):isset($user_info->fullname)?$user_info->fullname:'')
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
                'value' => set_value('email')?set_value('email'):isset($user_info->email)?$user_info->email:'')
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
                'value' =>  set_value('username')?set_value('username'):isset($user_info->username)?$user_info->username:'')
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
                'value' => set_value('phone')?set_value('phone'):isset($user_info->phone)?$user_info->phone:'')
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
            <?php $p = $this->manage_user->get_permission($categories->cid,$user_info->uid); ?>
           <input type="checkbox" name="permission[]" <?php echo $p>0?'checked':'';?> class="form-inps" value="<?php echo $categories->cid; ?>" <?php echo $this->session->userdata('level')==2?'disabled':'';?> />
       
        </div>
         <?php echo form_label($categories->en_title.' - '.$categories->kh_title, 're-password', array('class' => 'col-sm-5 col-md-5 col-lg-5 padding-left')); ?>
        <?php  } ?>
    </div>
    <?php  } ?>
    <div class="form-group">
         <div class="col-sm-9 col-md-9 col-lg-9"></div>
         <div class="col-sm-3 col-md-3 col-lg-3"><input type="submit" name="save" class="btn btn-info" value="Save"/></div>
    </div>
    <?php echo form_close();?>
    <br/></br>
</div>
<?php $this->load->view('admin-initial/footer'); ?>
    