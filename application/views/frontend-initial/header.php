<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !IE]>
<html dir="ltr" lang="en-US">
<![endif]-->

<!-- START HEAD -->
<head>

    <meta charset="UTF-8" />
    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

    <title>AEU website</title>

    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>images/aeulogo.ico" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>images/aeulogo.ico" />
    <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
    <!-- For iPad3 with retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x.png" />
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57x.png" />
    <!-- [favicon] end -->

    <!-- CSSs -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>frontedn-assets/css/reset.css" /> <!-- RESET STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>frontedn-assets/style.css" /> <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" id="max-width-1024-css" href="<?php echo base_url(); ?>frontedn-assets/css/max-width-1024.css" type="text/css" media="screen and (max-width: 1240px)" />
    <link rel="stylesheet" id="max-width-768-css" href="<?php echo base_url(); ?>frontedn-assets/css/max-width-768.css" type="text/css" media="screen and (max-width: 987px)" />
    <link rel="stylesheet" id="max-width-480-css" href="<?php echo base_url(); ?>frontedn-assets/css/max-width-480.css" type="text/css" media="screen and (max-width: 480px)" />
    <link rel="stylesheet" id="max-width-320-css" href="<?php echo base_url(); ?>frontedn-assets/css/max-width-320.css" type="text/css" media="screen and (max-width: 320px)" />

    <!-- CSSs Plugin -->
    <link rel="stylesheet" id="thickbox-css" href="<?php echo base_url(); ?>frontedn-assets/css/thickbox.css" type="text/css" media="all" />
    <link rel="stylesheet" id="styles-minified-css" href="<?php echo base_url(); ?>frontedn-assets/css/style-minifield.css" type="text/css" media="all" />
    <link rel="stylesheet" id="buttons" href="<?php echo base_url(); ?>frontedn-assets/css/buttons.css" type="text/css" media="all" />
    <link rel="stylesheet" id="cache-custom-css" href="<?php echo base_url(); ?>frontedn-assets/css/cache-custom.css" type="text/css" media="all" />
    <link rel="stylesheet" id="custom-css" href="<?php echo base_url(); ?>frontedn-assets/css/custom.css" type="text/css" media="all" />

    <!-- FONTs -->
    <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
    <link rel='stylesheet' href='<?php echo base_url(); ?>frontedn-assets/css/font-awesome.css' type='text/css' media='all' />
    <link rel="stylesheet" id="custom-css" href="<?php echo base_url(); ?>frontedn-assets/css/simplegrid.css" type="text/css" media="all" />

    <script src="<?php echo base_url() ?>frontedn-assets/scrollyeah/jquery.js"></script>

    <link rel="stylesheet" href="<?php echo base_url() ?>frontedn-assets/scrollyeah/scrollyeah.css"/>
    <script src="<?php echo base_url() ?>frontedn-assets/scrollyeah/scrollyeah.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>frontedn-assets/search/css/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>frontedn-assets/search/css/component.css" />
    <script src="<?php echo base_url(); ?>frontedn-assets/search/js/modernizr.custom.js"></script>

    <!-- JAVASCRIPTs -->
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/comment-reply.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.quicksand.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.tipsy.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.cycle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.anythingslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.eislideshow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.easing.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.aw-showcase.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/layerslider.kreaturamedia.jquery-min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/shortcodes.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.colorbox-min.js"></script> <!-- nav -->
    <script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.tweetable.js"></script>


</head>
<!-- END HEAD -->
<!-- START BODY -->
<body class="no_js responsive stretched">

    <!-- START BG SHADOW -->
    <div class="bg-shadow bg-gray">

        <!-- START WRAPPER -->
        <div id="wrapper" class="group">

            <!-- START HEADER -->
            <div id="header" class="group bg-gray">

                <div class="group inner">

                    <!-- START LOGO -->
                    <div id="logo" class="group">
                        <a href="<?php echo base_url(); ?>" title="AEU Website"><img src="<?php echo base_url(); ?>images/logo-large.gif" title="Pink Rio" alt="Pink Rio" /></a>
                    </div>
                    <!-- END LOGO -->
                    <?php $lang = $this->session->userdata('language') ? $this->session->userdata('language') : 'english'; ?>
                    <div class="group">
                        <div style="padding-top:30px;" class="widget-first widget yit_text_quote">
                            <b> <cite class="text-quote-author">



                                    <a style="font-size:12px; color:<?php if ($this->uri->segment(1) == '') {
                        echo '#CA6B02';
                    } else {
                        echo '#000';
                    } ?>;" href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home_' . $lang); ?> | </a>
                                    <?php
                                    $this->load->model('pages');
                                    $menu = $this->pages->get_all_menu();
                                    foreach ($menu->result() as $menus) {
                                        $mid = $menus->mid;
                                        ?>
                                        <a style="font-size:12px; color:<?php if ($this->uri->segment(2) == 'p' && $this->uri->segment(3) == $mid) {
                                        echo '#CA6B02';
                                    } else {
                                        echo '#000';
                                    } ?>;" href="<?php echo base_url() . 'page/p/' . $menus->mid; ?>"><?php echo $menus->title; ?> |</a> 
<?php
}
$ff = $this->pages->get_fac(6);
?>
                                    <a style="font-size:12px; color:#000;" href="<?php echo base_url() . 'page/fac/' . $ff->fid; ?>"><?php echo $ff->title; ?></a> 

                                    <a href="?lang=english"> <img style="float: right; margin-left: 5px;" src="<?php echo base_url() ?>images/english.png" alt="English"/> </a>

                                    <a href="?lang=khmer"><img style="float: right;  margin-left: 5px;" src="<?php echo base_url() ?>images/khmer.png" alt="Khmer"/></a>

                                </cite>
                            </b>
                        </div>

                    </div>

                    <hr/>

                    <!-- START MAIN NAVIGATION -->

                    <div class="abc">
                        <div class="menu classic">

                            <ul id="nav" class="menu scrollyeah">
                                        <?php
                                        $item = $this->pages->get_all_fac();
                                        foreach ($item->result() as $items) {
                                            $fid = $items->fid
                                            ?>
                                    <li>
                                        <a <?php
                                if ($this->uri->segment(2) == 'fac' && $this->uri->segment(3) == $fid) {
                                    echo 'style="color: #E17A03;"';
                                }
                                ?> href="<?php echo base_url() . 'page/fac/' . $items->fid; ?>"><?php echo $items->title; ?></a>

                                    </li>
    <?php
}
?>

                            </ul>
                        </div>
                        <div id="sb-search" class="sb-search">
                            <form action="<?php echo base_url() . 'page/search'; ?>">
                                <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"></span>
                            </form>
                        </div>
                    </div>

                    <!-- END MAIN NAVIGATION -->
                    <div id="header-shadow"></div>
                    <div id="menu-shadow"></div>

                </div>

            </div>
<?php if($this->uri->segment(2)!='sent'){?>
            <!-- BEGIN #slider -->
<?php $this->load->view('frontend-initial/slide_show'); ?>
<?php } ?>