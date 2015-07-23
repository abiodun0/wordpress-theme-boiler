<?php global $news;?>
 <div class="col-md-4 subscription-form">
                        <h4 class="font-alt mt0"><?php echo $news[ 'news_title' ];?></h4>
                        <form action="//meednetworks.us11.list-manage.com/subscribe/post?u=28db17584d4231d6dfa395b14&amp;id=953c8927c4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"role="form" name="subscribe">
                            <div class="form-group">
                                <p class="form-control-static"><?php echo $news[ 'description' ];?></p>
                            </div>
                            <div class="form-group">
                                <input name="EMAIL" type="email" class="form-control" id="newsletter_email" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Subscribe Now</button>
                        </form>
         </div>