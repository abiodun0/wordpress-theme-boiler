<?php get_header();?>
  
  <section class="jumbotron jumbotron-bg1 nm" data-stellar-background-ratio="0.4" style="min-height:486px;">
    
    <div class="overlay pattern pattern2"></div>
    
    <div class="container" style="padding-top:8%;">
        <div class="row">
            <div class="col-md-9">
                <h1 class="thin text-white font-alt mt0 mb5"><?php echo get_theme_mod('home_header');?></h1>
                <p class="text-white mb15 fsize14">
                 <?php echo get_theme_mod('home_header_text');?>
                </p>
                <h4 class="mt0"><a href="<?php echo  get_page_by_title('About')->guid;?>" data-nav>Learn more...</a></h4>
            </div>
        </div>
    </div>
</section>              

<!--section class="section bgcolor-white">
    <div class="container">
        <div class="section-header text-center mb15">
            <h4 class="section-title">
                <p class="font-alt nm">Some of our clients</p>
            </h4>
        </div>
        <div class="owl-carousel" id="clients">
            <div class="item text-center">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/client/aztec.png" alt="Aztec Logo"></a>
            </div>
            <div class="item text-center">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/client/cisco.png" alt="Cisco Logo"></a>
            </div>
            <div class="item text-center">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/client/cocacola.png" alt="Cocacola Logo"></a>
            </div>
            <div class="item text-center">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/client/everyday.png" alt="Everyday Logo"></a>
            </div>
            <div class="item text-center">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/client/hp.png" alt="HP Logo"></a>
            </div>
            <div class="item text-center">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/client/natural.png" alt="Natural Logo"></a>
            </div>
            <div class="item text-center">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/client/shell.png" alt="Shell Logo"></a>
            </div>
        </div>
    </div>
</section-->

<?php if ( is_active_sidebar( 'home-widget' ) ) dynamic_sidebar('home-widget');?>     

<section class="section bgcolor-primary">
    <div class="container">
        <h4 class="text-center nm">
            <i class="icon icon-twitter mr5"></i>
            A sample tweet from the company's twitter account posted not too long ago.
            <small>23 Minute Ago</small>
        </h4>
    </div>
</section>
        
<?php get_footer();?>