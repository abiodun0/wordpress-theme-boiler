 <?php global $services; global $service;?>  
<section class="section bgcolor-white">
    <div class="container">                    
        <div class="section-header text-center">
            <h2 class="section-title">
            
                <p class="font-alt nm"><?php echo $services['heading'];?></p>
                <small class="text-muted"><?php echo $services['sub_text'];?></small>
            </h2>
        </div>
        
        <div class="table-layout">
            <div class="col-md-4">
            <?php $i=1; 
            while ($service->have_posts()) : $service->the_post(); if($i%2 !== 0): ?>
                <div class="table-layout animation" data-toggle="waypoints" data-showanim="fadeInRight" data-trigger-once="true">
                    <div class="col-xs-2 valign-top"><?php if (has_post_thumbnail()) the_post_thumbnail('custom-service-size'); ?></div>
                    <div class="col-xs-10 pl15">
                        <h4 class="font-alt"><?php the_title();?>  </h4>
                        <p class="nm"><?php the_excerpt();?> </p>
                    </div>
                </div>
            <?php endif; $i++;
            endwhile;?>
            </div>
            <div class="col-md-4 pt15 text-center animation" data-toggle="waypoints" data-showanim="flipInY" data-trigger-once="true" data-offset="40%">
                <img src="<?php echo get_template_directory_uri(); ?>/img/mockup/iphone-5s.png">
            </div>
            <div class="col-md-4">
        <?php $i=1; 
            while ($service->have_posts()) : $service->the_post(); if($i%2 === 0): ?>
                <div class="table-layout animation" data-toggle="waypoints" data-showanim="fadeInRight" data-trigger-once="true">
                    <div class="col-xs-2 valign-top"><?php if (has_post_thumbnail()) the_post_thumbnail('custom-service-size'); ?></div>
                    <div class="col-xs-10 pl15">
                        <h4 class="font-alt"><?php the_title();?>  </h4>
                        <p class="nm"><?php the_excerpt();?> </p>
                    </div>
                </div>
            <?php endif; $i++;
            endwhile;?>
            </div>
        </div>
    </div>
</section>