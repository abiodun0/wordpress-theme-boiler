 <?php global $info;?>   
      <div class="container">                
                <div class="row">                    
                    <div class="col-md-4">

                        <h4 class="font-alt mt0"><?php echo $info[ 'about_title' ];?></h4>
                        <p><?php echo $info[ 'about_text' ];?></p>
                        <a data-nav href="<?php echo  get_page_by_title('About')->guid;?>" class="text-primary">Learn More</a>
                    </div>
                    
                    <div class="col-md-4">
                        <h4 class="font-alt mt0"><?php echo $info[ 'address_title' ];?></h4>
              
                        <address>
                            <?php echo $info[ 'address_line_1' ];?><br>
                           <?php echo $info[ 'address_line_2' ];?><br>
                            <?php echo $info[ 'city' ];?><br>
                            <?php echo $info[ 'state' ];?>, <?php echo $info[ 'country' ];?><br>
                            <abbr title="Phone">P:</abbr> <?php echo $info[ 'phone' ];?>
                        </address>
                        <h4 class="font-alt mt0">Stay Connected</h4>
                        <a href="http://facebook.com/<?php echo $info['facebook'];?>" class="mr15"><i class="icon icon-facebook-squared"></i></a>
                        <a href="http://twitter.com/<?php echo $info['twitter'];?>" class="mr15"><i class="icon icon-twitter-squared"></i></a>
                        <a href="http://linkedin.com/company/<?php echo $info['linkedin'];?>" class="mr15"><i class="icon icon-linkedin-squared"></i></a>
                        <a href="http://google.com/<?php echo $info['google'];?>" class="mr15"><i class="icon icon-gplus-squared"></i></a>
                    </div>
                    
                    <div class="col-md-4 subscription-form">
                        <h4 class="font-alt mt0"><?php echo $info[ 'news_title' ];?></h4>
                        <form action="//meednetworks.us11.list-manage.com/subscribe/post?u=28db17584d4231d6dfa395b14&amp;id=953c8927c4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"role="form" name="subscribe">
                            <div class="form-group">
                                <p class="form-control-static"><?php echo $info[ 'description' ];?></p>
                            </div>
                            <div class="form-group">
                                <input name="EMAIL" type="email" class="form-control" id="newsletter_email" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Subscribe Now</button>
                        </form>
                    </div>
                </div>                
            </div>   