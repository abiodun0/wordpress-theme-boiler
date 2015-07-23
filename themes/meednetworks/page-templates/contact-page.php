<?php

/**
 * Template Name: Contact Us  Template
 *
 * Description: A page template that provides custom views for About for meednetworks
 * Training Site
 * @package Meed Network team
 * @subpackage MeedNetwrk Team
 * @since meed
 */
get_header();

?>
<section class="page-header page-header-block nm">
  <div class="pattern pattern9"></div>
  <div class="container pt15 pb15">
      <div class="page-header-section">
          <h4 class="title font-alt">Contact Us</h4>
      </div>
      <div class="page-header-section">
          <div class="toolbar">
              <ol class="breadcrumb breadcrumb-transparent nm">
                  <li><a href="<?php bloginfo('url');?>" data-nav>Home</a></li>
                  <li class="active">Contact Us</li>
              </ol>
          </div>
      </div>
  </div>
</section>

<section class="section np">
  <div id="gmaps-marker" style="height:360px;"></div>
</section>

<section class="section bgcolor-white">
  <div class="container">
      <div class="row">
          <div class="col-md-9 mb15">
              <div class="section-header section-header-bordered mb10">
                  <h3 class="section-title">
                      <p class="font-alt nm">Contact Form</p>
                  </h3>
              </div>
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content();?>
              <?php endwhile;?>
             <!-- <form class="form-horizontal" role="form" name="contact">
                  <div class="form-group">
                      <div class="col-sm-12">
                          <p class="form-control-static">You want to say hello, or you want to know more about us? Drop us a line! We will be happy to answer you.</p>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-6">
                          <label for="contact_name" class="control-label">Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="contact_name" name="name">
                      </div>
                      <div class="col-sm-6">
                          <label for="contact_email" class="control-label">Email <span class="text-danger">*</span></label>
                          <input type="email" class="form-control" id="contact_email" name="email">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-12">
                          <label for="contact_email" class="control-label">Your Message <span class="text-danger">*</span></label>
                          <textarea class="form-control" rows="4" id="contact_message" name="message"></textarea>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Send Message</button>
              </form>-->
          </div>
          
          <div class="col-md-3">
                    <?php if ( is_active_sidebar( 'contact-sidebar' ) ) dynamic_sidebar('contact-sidebar');?>  
          </div>
      </div>
  </div>
</section>
<?php get_footer();?>