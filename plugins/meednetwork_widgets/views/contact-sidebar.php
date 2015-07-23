  <?php global $contactinfo;?>

              <div class="mb15">
                  <div class="section-header section-header-bordered mb10">
                      <h4 class="section-title">

                          <p class="font-alt nm"><?php echo $contactinfo[ 'address_title' ];?></p>
                      </h4>
                  </div>
                   <address>
                            <?php echo $contactinfo[ 'address_line_1' ];?><br>
                           <?php echo $contactinfo[ 'address_line_2' ];?><br>
                            <?php echo $contactinfo[ 'city' ];?><br>
                            <?php echo $contactinfo[ 'state' ];?>, <?php echo $contactinfo[ 'country' ];?><br>
                            <abbr title="Phone">P:</abbr> <?php echo $contactinfo[ 'phone' ];?><br>
                            <abbr title="Email">E:</abbr> <a href="mailto:<?php echo $contactinfo['email'];?>"><?php echo $contactinfo['email'];?></a>
                  </address>

              </div>
              <div class="mb15">
                  <div class="section-header section-header-bordered mb10">
                      <h4 class="section-title">
                          <p class="font-alt nm">Business Hours</p>
                      </h4>
                  </div>
                  <ul class="list-unstyled">
                      <li><strong>Monday-Friday:</strong> <?php echo $contactinfo['working_days'];?></li>
                      <li><strong>Saturday:</strong> <?php echo $contactinfo['saturdays'];?></li>
                  </ul>
              </div>