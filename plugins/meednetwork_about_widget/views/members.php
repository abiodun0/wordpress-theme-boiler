   <?php global $members; global $member;?>
    <div class="container">        
        <div class="section-header text-center">
            <h2 class="section-title">
                <div class="font-alt nm"><?php echo $members['title'];?></div>
                <small><?php echo $members['excerpt'];?></small>
            </h2>
        </div>
        <div class="row">
          <?php while ($member->have_posts()) : $member->the_post(); ?>
            <div class="col-sm-3">                
                <div class="panel no-border overflow-hidden">                    
                     <?php if (has_post_thumbnail()) the_post_thumbnail('thumbnail');
                        else {
                            ?>
                            <img src="<?php echo get_template_directory_uri();?>/img/avatar/avatar.png" width="100%" alt="photo" height="160"> <?php }?>

                    <div class="panel-body">
                        <h4 class="semibold ellipsis text-center mt0">
                            <p class="nm"><?php the_title();?></p>
                        <?php

                          $custom_fields = get_post_custom($post_id);
                         // var_dump($custom_fields);
                          $my_custom_field = $custom_fields['Position'];
                          $custom = '';
                          foreach ( $my_custom_field as $key => $value ) {
                           $custom .= $value;

                                                     }

                        ?>
                            <small class="text-accent"><?php echo $custom;?></small>
                        </h4>
                        <p class="text-center nm"><?php the_excerpt();?></p>
                        <hr>
                        <div class="text-center">
                            <a href="#" class="text-default mr15" data-toggle="tooltip" title="Facebook"><i class="icon icon-facebook"></i></a>
                            <a href="#" class="text-default mr15" data-toggle="tooltip" title="Twitter"><i class="icon icon-twitter"></i></a>
                            <a href="#" class="text-default mr15" data-toggle="tooltip" title="Google+"><i class="icon icon-gplus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
        </div>
    </div>