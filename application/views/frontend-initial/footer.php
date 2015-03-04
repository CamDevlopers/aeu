
<br/><div class="inner group bg-gray scrollyeah">
    <?php
    $this->load->model('manage_partner/m_partner');
    $partner = $this->m_partner->get_partner();
    foreach ($partner->result() as $partner) {
        ?>
    <a href="<?php echo base_url().'page/partner/'.$partner->pid; ?>"> <img  style="padding:5px;" class="thumbnail" src="<?php echo base_url() . 'images/partners/' . $partner->image_name; ?>" height="60"/></a>&nbsp;&nbsp;&nbsp;
    <?php }?>
</div>
<style>
    #social{
        margin-left:70px;
    }
    #footer{
        background-color: #1a1919;
    }
</style>
<div id="copyright bg-black">

    <footer id="footer">
        <div class="hentry group">
            <div class="box-sections col-1-3 one-third">
                <!--<h4><span style="line-height:32px">Our Location</span></h4>-->
                <div class="location-tip"><h3 style="color:#fff;">Our Location</h3>
                    <div class="tooltip-bottom"></div>
                </div>
                <img src="<?php echo base_url(); ?>images/profile.jpg" alt="Unlimited slider" class="icon" />
                <div class="span333">
                    <h3>About AEU University</h3>
                    <p><font color="#FFFFFF"> 
                        #832, Kampuchea krum Blvd, Sangkat Teuk Laak I, Khan Toul Kok, Phnom Penh, Cambodia.<br>
                        Phone/Fax: (855)23 998 124<br>
                    </p>
                </div> 
            </div>
            <div class="box-sections col-1-3 one-third">
                <div class="row">
                    <iframe src="https://mapsengine.google.com/map/embed?mid=zpnL8ffOV3So.kAkHxaa0eepA" width="480px" height="292"></iframe>
                </div>
                <p class="fleft"><font color="#CC9900"size="-1"> &copy; Copyright 2014. All Rights Reserved. By AEU University</p>
            </div>
            <div class="box-sections one-third">
                <div class="row" id="social">
                   <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FAEUCamboadia&amp;width=390&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:325px; height:290px;" allowTransparency="true"></iframe>
                </div> 
            </div>
        </div>
    </footer>

</div>
<!-- END COPYRIGHT -->
</div>
<!-- END WRAPPER -->
</div>
<!-- END BG SHADOW -->
<script>
    $(function() {

        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('.menu').addClass('menu-fixed');
                $('#nav').addClass('ul-fixed');
            } else {
                $('.menu').removeClass("menu-fixed");
                $('#nav').removeClass("ul-fixed");
            }
        });

    });
</script>
<script src="<?php echo base_url(); ?>frontedn-assets/search/js/classie.js"></script>
<script src="<?php echo base_url(); ?>frontedn-assets/search/js/uisearch.js"></script>
<script>
    new UISearch(document.getElementById('sb-search'));
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/contact.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>frontedn-assets/js/jquery.mobilemenu.js"></script> 

</body>
<!-- END BODY -->
</html>