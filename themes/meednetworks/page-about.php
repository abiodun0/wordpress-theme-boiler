<?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="page-header page-header-block nm">
    <div class="pattern pattern9"></div>
    <div class="container pt15 pb15">
        <div class="page-header-section">
            <h4 class="title font-alt">About Us</h4>
        </div>
        <div class="page-header-section">
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="#" data-nav>Home</a></li>
                    <li class="active">About Us</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section bgcolor-white">
    <div class="container">
       
        <?php the_content();?>
       
    </div>
</section>

<section class="section">
    <div class="container">        
 <?php if ( is_active_sidebar( 'about-values-header' ) ) dynamic_sidebar('about-values-header');?>   
        <div class="row text-center">
        <?php if ( is_active_sidebar( 'about-values' ) ) dynamic_sidebar('about-values');?>   
          <!--div class="col-sm-4">
            <h1><i class="icon icon-compass"></i></h1>
            <h4>Integrity</h4>
            <p>We are always honest, respectful and hold true to the highest degree of integrity</p>
          </div>
          <div class="col-sm-4">
            <h1><i class="icon icon-users"></i></h1>
            <h4>Relationships</h4>
            <p>We never risk long-term client relationships for short-term profit</p>  
          </div>
          <div class="col-sm-4">
            <h1><i class="icon icon-thumbs-up"></i></h1>
            <h4>Excellence</h4>
            <p>We always strive for continued operational and methodology excellence</p>
          </div>
        </div-->
    </div>
</section>

<section class="section bgcolor-white">
    <div class="container">        
 <?php if ( is_active_sidebar( 'about-methods-header' ) ) dynamic_sidebar('about-methods-header');?>   

        <div class="row owl-carousel" id="methodology">
        <?php if ( is_active_sidebar( 'about-methods' ) ) dynamic_sidebar('about-methods');?>   
          <!--div class="item">
            <h1><i class="icon icon-eye-slash"></i></h1>
            <h4>Pre-Sales</h4>
            <p>The idea is to understand your project, organizational environment, technical environment, timeline and project team. Our team brings years of industry experience and best practices to your solution to help you get it right the first time.</p>
          </div>
          <div class="item">
            <h1><i class="icon icon-sliders"></i></h1>
            <h4>Planning</h4>
            <p>The goal is to agree on the business and technical requirements for making your project a success. Using the information from site surveys, our Project Managers &amp; System Engineers document all network, system &amp; operational requirements and expectations.</p>
          </div>
          <div class="item">
            <h1><i class="icon icon-edit"></i></h1>
            <h4>Design</h4>
            <p>Our Engineers using the information from the Planning phase and Design workshop to document the detailed architecture of the solution to meet the required specifications.</p>
          </div>
          <div class="item">
            <h1><i class="icon icon-cogs"></i></h1>
            <h4>Implementation</h4>
            <p>Using the approved, documented Design, installation and configuration will commence based upon a documented migration plan. Administrator Guides &amp; Training follows with multiple Client Acceptance checkpoints along the way.</p>
          </div>
          <div class="item">
            <h1><i class="icon icon-lifebuoy"></i></h1>
            <h4>Support</h4>
            <p>Based upon a complete understanding of your infrastructure, organizational dynamic and support requirements, we prepare an ongoing Support Plan to maintain your infrastructure at optimal levels and keep your users content.</p>
          </div-->
        </div>
    </div>
</section>

<section class="section">
    <?php if ( is_active_sidebar( 'about-members' ) ) dynamic_sidebar('about-members');?>   
</section>
<?php endwhile;?>
<?php get_footer();?>