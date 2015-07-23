<?php 
global $testimonial;
//global $instance;
//$i = 0
?>

<section class="jumbotron jumbotron-bg2 nm">
    <div class="section">
        
        <div class="overlay pattern pattern3"></div>
        
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">
                    <div class="font-alt nm">Testimonials</div>
                    <small>What our satisfied customers say about us</small>
                </h2>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 owl-carousel" id="testimonials">
                 <?php while ($testimonial->have_posts()) : $testimonial->the_post(); ?>
                    <?php

                          $custom_fields = get_post_custom($post_id);
                         // var_dump($custom_fields);
                          $my_custom_field = $custom_fields['Position'];
                          $custom = '';
                          foreach ( $my_custom_field as $key => $value ) {
                           $custom .= $value;

                                                     }

                        ?>
                    <div class="item text-center pt5">
                   
                        <blockquote class="nm">
                            <?php the_excerpt();?>
                        
                       <footer class="text-white"><?php the_title();?>, <?php echo $custom;?></footer>

                       </blockquote>
                    </div>
                <?php 
                endwhile;?>
                </div>
            </div>
        </div>
    </div>
</section>