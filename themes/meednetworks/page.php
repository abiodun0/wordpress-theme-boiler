<?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="page-header page-header-block nm">
    <div class="pattern pattern9"></div>
    <div class="container pt15 pb15">
        <div class="page-header-section">
            <h4 class="title font-alt"><?php the_title();?></h4>
        </div>
        <div class="page-header-section">
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="#" data-nav>Home</a></li>
                    <li><a href="#" class="active"data-nav>About</a></li>
                    <li class="active">Careers</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section bgcolor-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb15">
                <div class="section-header section-header-bordered mb15">

                </div>
                <?php the_content();?>
                <!--<p>We are always on the lookout for more business-minded overachievers to join us in our aggressive growth. If you are looking for the kind of environment that values honesty and integrity with an eye toward the long-term goals, you have found a great place to work at Meed Networks.</p>

                <blockquote><p>Our team is growing... pretty much all of the time.</p></blockquote>

                <p>If you don’t see any openings that you feel are a good fit, don’t sweat it. Please check out our job listing link below and apply to the future opportunities link. This link is monitored frequently by our Human Resources Department.</p>

                <br>

                <a href="#" class="btn btn-primary"><i class="icon icon-new-tab mr5"></i> See Openings</a>-->
                
            </div>
        </div>
    </div>
</section>

<?php endwhile;?>
<?php get_footer();?>