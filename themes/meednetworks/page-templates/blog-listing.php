<?php 
/**
 * Template Name: Blog List Template
 *
 * Description: A Displays All the blog listings
 * @package Meed Network team
 * @subpackage MeedNetwrk Team
 * @since meed
 */

get_header();?>

<section class="page-header page-header-block nm">
    <div class="pattern pattern9"></div>
    <div class="container pt15 pb15">
        <div class="page-header-section">
            <h4 class="title font-alt">Blog</h4>
        </div>
        <div class="page-header-section">
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="#" data-nav>Home</a></li>
                    <li class="active">Blog</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section bgcolor-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mb15">
               <?php $blogpost = new WP_Query(array(
      'post_type'=>array('post'), 
      'posts_per_page'=>10, 
      //'paged'=>1
    ));
   if ($blogpost->have_posts()): while ($blogpost->have_posts()) : $blogpost->the_post();;
 ?>
                <article class="panel panel-minimal overflow-hidden">
                    <div class="table-layout">
                        <div class="col-sm-5">
                            <header class="thumbnail">
                                <div class="media">
                                    <div class="indicator"><span class="spinner"></span></div>
                                    <div class="overlay">
                                        <div class="toolbar">
                                            <a href="#" class="btn btn-default"><i class="icon icon-link"></i></a>
                                        </div>
                                    </div>
                                     <?php the_post_thumbnail('thumbnail') ;?>
                                </div>
                            </header>
                        </div>
                        <div class="col-sm-7">
                            <section class="panel-body">
                                <h3 class="font-alt ellipsis mt0"><a href="<?php the_permalink();?>" class="text-default"><?php the_title();?></a></h3>
                                <p class="meta">
                                    <a href="<?php the_permalink();?>"><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                                    <span class="text-muted mr5 ml5">&#8226;</span>
                                    <span class="text-muted">In </span><a href="#"><?php echo cat_name();?></a>
                                    <span class="text-muted mr5 ml5">&#8226;</span>
                                    <span class="text-muted">By </span><a href="#"><?php the_author();?></a>
                                </p>
                                <div class="text-default">
                                   <?php the_excerpt();?>
                                </div>                                            
                                <a href="<?php the_permalink();?>" class="btn btn-success">Read more&#8230;</a>
                            </section>
                        </div>
                    </div>
                </article>

                <hr>   


        <?php endwhile;
                ?>
<div class="navigation"><p><?php posts_nav_link('&#8734;','&laquo;&laquo; Go Forward 
In Time','Go Back in Time &raquo;&raquo;'); ?></p></div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="pager mt0">
                            <li class="previous"><a href="#"><i class="icon icon-angle-left mr5"></i> Older</a></li>
                            <li class="next"><a href="#">Newer <i class="icon icon-angle-right ml5"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
<?php endif; wp_reset_query();?>
            <div class="col-md-3 mb15">

                <div class="mb15">
                    <div class="section-header section-header-bordered mb10">
                        <h4 class="section-title">
                            <p class="font-alt nm">Welcome</p>
                        </h4>
                    </div>
                    <p class="nm text-default"><?php echo get_theme_mod('Blog_post_summary');?></p>
                </div>

            <?php get_search_form();?>

                <div class="mb15">
                    <div class="section-header section-header-bordered mb10">
                        <h4 class="section-title">
                            <p class="font-alt nm">Categories</p>
                        </h4>
                    </div>
                   <?php get_categories_listing();?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php get_footer();?>