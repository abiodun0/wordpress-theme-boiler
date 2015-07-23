<?php get_header();?>

<?php   while ( have_posts() ) : the_post();
  if ( is_single() ) :
  	?>
  <?php setPostViews(get_the_ID()); ?>
<section class="page-header page-header-block nm">
    <div class="pattern pattern9"></div>
    <div class="container pt15 pb15">
        <div class="page-header-section">
            <h4 class="title font-alt"><?php the_title();?></h4>
        </div>
        <div class="page-header-section">
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="#" data-nav>Home</a></li>
                    <li class="active">Courses</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section bgcolor-white">
    <div class="container">
        <div class="row">
        <div class="col-sm-9 mb15">
            <div class="panel panel-default" style="boder:0px">
                <div class="panel-body">

                    <article>
                    <h1><?php the_title();?></h1>
<?php the_content();?> 
                           <h4 class="section">Request Information </h4>
                           <?php body_name();?>
                    <form class="post-form" method="post" name=" " action="">
                    <p> Please complete the following form and a Tonex Training Specialist will contact you as soon as is possible.</p>
                    <input type="hidden" name="course_name" value="<?php the_title();?>"?>
                            <span class="required">* Indicates required fields</span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="request[first_name]" required>

                                    <p class="help-block">First</p>
                                </div>
                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <input type="text" class="form-control" name="request[last_name]" required>

                                    <p class="help-block">Last</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="request[email]" required>

                                    <p class="help-block">Email</p>
                                </div>
                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <input type="text" class="form-control" name="request[email_confirm]" required>

                                    <p class="help-block">Confirm Email</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="request[company_name]">

                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Title / Position</label>
                                    <input type="text" class="form-control" name="request[title]">

                                    <p class="help-block"></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="request[address_line_1]" required>

                                    <p class="help-block">Street Address</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" name="request[address_line_2]">

                                    <p class="help-block">Street Address</p>
                                </div>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" name="request[state]">

                                    <p class="help-block">State/ Province/ Region</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" name="request[zip]">

                                    <p class="help-block">Zip / Postal Code</p>
                                </div>
                                <div class="col-sm-6">

                                    <select class="form-control" name="request[country">
                                        <option value="ng">Nigeria</option>
                                    </select>

                                    <p class="help-block">State/ Province/ Region</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="request[phone]" required>

                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Fax Number</label>
                                    <input type="text" class="form-control" name="request[fax]">

                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>How did You Learn About Us</label>
                                    <input type="text" class="form-control" name="request[how_did_you_know_about_us]">

                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="request[website]">

                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">

                                <label>Your Request <span class="required">*</span></label>
                                <textarea rows="10" type="text" class="form-control" name="request[your_request]" required></textarea>

                                <p class="help-block"></p>

                            </div>
                             <!--div class="row">
                                <div class="col-sm-6">
                                    <label>How did You Learn About Us</label>
                                    <input type="text" class="form-control">

                                    <p class="help-block"></p>
                                </div>
                            </div-->


                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                        </form>
                    </article>


                </div>


            </div>


        </div>
            <div class="col-md-3 mb15">

                        <?php if ( is_active_sidebar( 'sidebar-1' ) ) dynamic_sidebar('sidebar-1');?>
                    
                </div>


                <!--<div class="mb15">
                    <div class="section-header section-header-bordered mb10">
                        <h4 class="section-title">
                            <p class="font-alt nm">Categories</p>
                        </h4>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb5"><i class="icon icon-angle-right text-muted mr5"></i> <a href="#">Fibre Optics</a></li>
                        <li class="mb5"><i class="icon icon-angle-right text-muted mr5"></i> <a href="#">Wireless</a></li>
                        <li class="mb5"><i class="icon icon-angle-right text-muted mr5"></i> <a href="#">Voice &amp; Video</a></li>
                        <li class="mb5"><i class="icon icon-angle-right text-muted mr5"></i> <a href="#">Network Design</a></li>
                        <li class="mb5"><i class="icon icon-angle-right text-muted mr5"></i> <a href="#">Network Audit</a></li>
                        <li class="mb5"><i class="icon icon-angle-right text-muted mr5"></i> <a href="#">Security</a></li>
                        <li class="mb5"><i class="icon icon-angle-right text-muted mr5"></i> <a href="#">Cloud Computing</a></li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
</section>
</div>
</section>
<?php endif; endwhile;?>


<?php get_footer();?>