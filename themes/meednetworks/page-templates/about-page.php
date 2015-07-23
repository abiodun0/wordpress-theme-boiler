<?php 
/**
 * Template Name: About Template
 *
 * Description: A page template that provides custom views for About meednetworks
 * Training Site
 * @package Meed Network team
 * @subpackage MeedNetwrk Team
 * @since meed
 */

 get_header();?>
<?php while ( have_posts() ) : the_post(); ?>
 <section class="page-header page-header-block nm">
    <div class="pattern pattern9"></div>
    <div class="container pt15 pb15">
        <div class="page-header-section">
            <h4 class="title font-alt">About</h4>
        </div>
        <div class="page-header-section">
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="#" data-nav>Home</a></li>
                    <li><a href="#about"data-nav>About</a></li>
                    <li><a href="#" class="active" data-nav><?php the_title();?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section bgcolor-white">
    <div class="container">
        <div class="row">
       
            <div class="col-md-12 mb15">

                <div>
               
                <?php the_content();?>
           
               </div> 
            </div>
               
        </div>
    </div>
</section>
<?php endwhile;?>
<?php get_footer();?>