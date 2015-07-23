<?php global $address;?>


<div class="col-md-4">
                        <h4 class="font-alt mt0"><?php echo $address[ 'address_title' ];?></h4>
              
                        <address>
                            <?php echo $address[ 'address_line_1' ];?><br>
                           <?php echo $address[ 'address_line_2' ];?><br>
                            <?php echo $address[ 'city' ];?><br>
                            <?php echo $address[ 'state' ];?>, <?php echo $address[ 'country' ];?><br>
                            <abbr title="Phone">P:</abbr> <?php echo $address[ 'phone' ];?><br>
                            <abbr title="Email">E:</abbr> <a href="mailto:<?php echo $address['email'];?>"><?php echo $address['email'];?></a>
                        </address>
                    <?php if(is_home()): ?>
                        <h4 class="font-alt mt0">Stay Connected</h4>
                        <a href="http://facebook.com/<?php echo $info['facebook'];?>" class="mr15"><i class="icon icon-facebook-squared"></i></a>
                        <a href="http://twitter.com/<?php echo $info['twitter'];?>" class="mr15"><i class="icon icon-twitter-squared"></i></a>
                        <a href="http://linkedin.com/company/<?php echo $info['linkedin'];?>" class="mr15"><i class="icon icon-linkedin-squared"></i></a>
                        <a href="http://google.com/<?php echo $info['google'];?>" class="mr15"><i class="icon icon-gplus-squared"></i></a>
                    <?php endif;?>
     </div>