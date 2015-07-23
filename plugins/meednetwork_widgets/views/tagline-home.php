<?php global $tagline;?>

<section class="jumbotron jumbotron-bg1 nm" data-stellar-background-ratio="0.4" style="min-height:486px;">
    
    <div class="overlay pattern pattern2"></div>
    
    <div class="container" style="padding-top:8%;">
        <div class="row">
            <div class="col-md-9">
                <h1 class="thin text-white font-alt mt0 mb5"><?php echo $tagline['header'];?></h1>
                <p class="text-white mb15 fsize14">
                 <?php echo $tagline['tagline'];?>
                </p>
                <h4 class="mt0"><a href="<?php echo  get_page_by_title('About')->guid;?>" data-nav>Learn more...</a></h4>
            </div>
        </div>
    </div>
</section>
