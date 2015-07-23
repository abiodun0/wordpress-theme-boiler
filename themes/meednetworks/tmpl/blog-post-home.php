<?php global $blog; global $bloginfo;?>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-header mb5">
                    <h3 class="section-title">
                   
                        <p class="font-alt nm"><?php echo get_theme_mod('Blog_post_header');?></p>
                        <small class="text-muted"><?php echo get_theme_mod('Blog_post_sub');?></small>
                    </h3>
                </div>
                <div class="mb15">
                    <p class="mb15"><?php echo get_theme_mod('Blog_post_summary');?></p>

                    <a href="<?php echo  get_page_by_title('Blog lists')->guid;?>" class="btn btn-primary" data-nav><?php echo $bloginfo['button_text'];?></a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                  <?php while ($blog->have_posts()) : $blog->the_post(); ?>
                    <div class="col-sm-4 post">
                        <article class="panel overflow-hidden">
                            <header class="thumbnail">
                                <div class="media">
                                    <div class="indicator"><span class="spinner"></span></div>
                                    <div class="overlay">
                                        <div class="toolbar">
                                            <a href="<?php the_permalink();?>" data-nav class="btn btn-success"><i class="icon icon-new-tab"></i></a>
                                        </div>
                                    </div>
                                    <?php the_post_thumbnail('thumbnail') ;?>
                                </div>
                            </header>
                            <section class="panel-body">
                                <h4 class="mt0 ellipsis"><a href="<?php the_permalink();?>" data-nav class="text-default"><?php the_title();?></a></h4>
                                <p class="meta nm">
                                    <a href="javascript:void(0);"><?php the_time('F j, Y');?></a>
                                    <span class="text-muted mr5 ml5">&#8226;</span>
                                    <span class="text-muted">By </span><a href="javascript:void(0);"><?php the_author();?></a>
                                </p>
                            </section>
                        </article>
                    </div>
                <?php endwhile;?>
                </div>
            </div>
        </div>                    
    </div>
</section>
<!--section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-header mb5">
                    <h3 class="section-title">
                   
                        <p class="font-alt nm"><?php echo $bloginfo['title'];?></p>
                        <small class="text-muted"><?php echo $bloginfo['sub_head'];?></small>
                    </h3>
                </div>
                <div class="mb15">
                    <p class="mb15"><?php echo $bloginfo['sub'];?></p>

                    <a href="<?php echo  get_page_by_title('Blog lists')->guid;?>" class="btn btn-primary" data-nav><?php echo $bloginfo['button_text'];?></a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                  <?php while ($blog->have_posts()) : $blog->the_post(); ?>
                    <div class="col-sm-4 post">
                        <article class="panel overflow-hidden">
                            <header class="thumbnail">
                                <div class="media">
                                    <div class="indicator"><span class="spinner"></span></div>
                                    <div class="overlay">
                                        <div class="toolbar">
                                            <a href="<?php the_permalink();?>" data-nav class="btn btn-success"><i class="icon icon-new-tab"></i></a>
                                        </div>
                                    </div>
                                    <?php the_post_thumbnail('thumbnail') ;?>
                                </div>
                            </header>
                            <section class="panel-body">
                                <h4 class="mt0 ellipsis"><a href="<?php the_permalink();?>" data-nav class="text-default"><?php the_title();?></a></h4>
                                <p class="meta nm">
                                    <a href="javascript:void(0);"><?php the_time('F j, Y');?></a>
                                    <span class="text-muted mr5 ml5">&#8226;</span>
                                    <span class="text-muted">By </span><a href="javascript:void(0);"><?php the_author();?></a>
                                </p>
                            </section>
                        </article>
                    </div>
                <?php endwhile;?>
                </div>
            </div>
        </div>                    
    </div>
</section-->