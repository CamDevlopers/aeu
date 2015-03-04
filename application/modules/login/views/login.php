<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASIA EURO Univerisy</title>
         <link rel="icon" href="<?php echo base_url().'admin-assets';?>/img/aeulogo.ico" type="image/x-icon">
        <!-- Core CSS - Include with every page -->
        <link href="<?php echo base_url() . 'admin-assets/' ?>plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets/' ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets/' ?>plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets/' ?>css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'admin-assets/' ?>css/main-style.css" rel="stylesheet" />

    </head>

    <body class="body-Login-back">

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                    <img src="<?php echo base_url() . 'admin-assets/' ?>img/logo-large.png" alt=""/>
                </div>
                <div class="col-md-4 col-md-offset-4">
                   
                    <div class="login-panel panel panel-default">   
                        
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Please Login To Your Account</h3>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo base_url().'login/process';?>" method="post" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo set_value('username');?>" autofocus />
                                        <span class="text-danger"><?php echo form_error('username');?></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value=""/>
                                        <span class="text-danger"><?php echo form_error('password');?></span>
                                    </div>
                                     <span class="text-center text-danger">&nbsp;&nbsp;<?php if(!isset($form_error)){

                                        }else{
                                            echo $form_error;
                                        }?>
                                    </span>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Login"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Scripts - Include with every page -->
        <script src="<?php echo base_url() . 'admin-assets/' ?>plugins/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url() . 'admin-assets/' ?>plugins/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url() . 'admin-assets/' ?>plugins/metisMenu/jquery.metisMenu.js"></script>

    </body>

</html>
