<?php global $popular; global $heading; ?>

        <div class="mb15">
                    <div class="section-header section-header-bordered mb10">
                        <h4 class="section-title">
                            <p class="font-alt nm"><?php echo $heading;?></p>
                        </h4>
                    </div>
                 <ul class="list-unstyled">

<?php $i = 0; 
       while ($popular->have_posts() && $i < 10): 
        $popular->the_post(); 
        #$image = wp_get_attachment_image_src( get_post_thumbnail_id(), array(420,340) ); 
    ?>

                     <li><a class="mb5 "href="<?php the_permalink();?>"><i class="icon icon-angle-right text-muted mr5"></i><?php the_title();?> </a></li>
<?php endwhile;?>

 </ul>
 </div>