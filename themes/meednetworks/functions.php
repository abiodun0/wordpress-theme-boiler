<?php
error_reporting(0);
error_reporting(E_ALL);
/**
 * Include the TGM_Plugin_Activation class.
 */
//require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
//add_action( 'tgmpa_register', 'register_inudun_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function register_inudun_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(
    // This is an example of how to include a plugin bundled with a theme.
    array(
      'name'               => 'Meed Training Courses', // The plugin name.
      'slug'               => 'training-courses', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/lib/plugins/training-courses.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '0.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => 'Meed_Training_Courses', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    array(
      'name'               => 'Meed Training Registrations', // The plugin name.
      'slug'               => 'training-registrations', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/lib/plugins/training-registrations.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '0.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => 'Meed_Training_Registrations', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),


    array(
      'name'               => 'Meed Training Testimonial', // The plugin name.
      'slug'               => 'training-testimonials', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/lib/plugins/training-testimonials.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '0.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => 'Meed_Training_Testimonials', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),


    array(
      'name'               => 'Meed Training Widgets', // The plugin name.
      'slug'               => 'meed-widgets', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/lib/plugins/meed-widgets.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '0.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => 'Meed_Widgets', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    array(
      'name'               => 'Meed Training Sliders', // The plugin name.
      'slug'               => 'meed-sliders', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/lib/plugins/meed-sliders.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '0.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => 'Meed_Sliders', // If set, this callable will be be checked for availability to determine if a plugin is active.
    )
    
  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
    /*'strings'      => array(
      'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
      'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
      'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
      'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
      'notice_can_install_required'     => _n_noop(
        'This theme requires the following plugin: %1$s.',
        'This theme requires the following plugins: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_can_install_recommended'  => _n_noop(
        'This theme recommends the following plugin: %1$s.',
        'This theme recommends the following plugins: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_cannot_install'           => _n_noop(
        'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
        'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_ask_to_update'            => _n_noop(
        'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
        'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_ask_to_update_maybe'      => _n_noop(
        'There is an update available for: %1$s.',
        'There are updates available for the following plugins: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_cannot_update'            => _n_noop(
        'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
        'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_can_activate_required'    => _n_noop(
        'The following required plugin is currently inactive: %1$s.',
        'The following required plugins are currently inactive: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_can_activate_recommended' => _n_noop(
        'The following recommended plugin is currently inactive: %1$s.',
        'The following recommended plugins are currently inactive: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_cannot_activate'          => _n_noop(
        'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
        'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'install_link'                    => _n_noop(
        'Begin installing plugin',
        'Begin installing plugins',
        'theme-slug'
      ),
      'update_link'             => _n_noop(
        'Begin updating plugin',
        'Begin updating plugins',
        'theme-slug'
      ),
      'activate_link'                   => _n_noop(
        'Begin activating plugin',
        'Begin activating plugins',
        'theme-slug'
      ),
      'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
      'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
      'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
      'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
      'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
      'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
      'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),
      'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
    ),
    */
  );
  tgmpa( $plugins, $config );
}


##############################################################################################
################ Actual functions for Meed Trainings Custom Theme begin here #################
##############################################################################################

# Register support for WP features
add_action( 'after_setup_theme', 'theme_setup' );
function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
}
add_action( 'customize_register', 'mytheme_customize_register' );

function theme_setup() {

  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
  update_option( 'blogname', __('Meed Networks Training') );
  update_option( 'blogdescription', __('') );
  update_option( 'thumbnail_size_w', 224 );
  update_option( 'thumbnail_size_h', 160 );
  update_option( 'thumbnail_crop', true );
  add_post_type_support('page','excerpt');
  add_image_size( 'custom-service-size', 56, 56,true);
  
register_nav_menu('footer-menu',__( 'Footer Menu' ));
  register_nav_menu( 'primary', __( 'Primary Menu', 'meed-networks-primary-menu' ) );
  add_action( 'widgets_init', 'wpb_widgets_init' );

}

function wpb_widgets_init() {

  register_sidebar( array(
    'name' => __( 'Home Widget', 'meed network' ),
    'id' => 'home-widget',
    'description' => __( 'This appears on the front page ', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
  register_sidebar( array(
    'name' => __( 'Course Sidebar', 'meed network' ),
    'id' => 'sidebar-1',
    'description' => __( 'TThis side bar appears on the right side of the course side bar displaying the popular and recent posts', 'meednetworks' ),
  ) );

    register_sidebar( array(
    'name' => __( 'Footer Bar', 'meed network' ),
    'id' => 'footer-bar',
    'description' => __( 'This appears on the footer menu of all the pages', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );



    register_sidebar( array(
    'name' => __( 'Post Side Bar', 'meed network' ),
    'id' => 'post-widget',
    'description' => __( 'This is meant to display the most recent number of post', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
  register_sidebar( array(
    'name' => __( 'Contacts Bar', 'meed network' ),
    'id' => 'contact-sidebar',
    'description' => __( 'This displays your contact info ', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
    register_sidebar( array(
    'name' => __( 'About Members', 'meed network' ),
    'id' => 'about-members',
    'description' => __( 'This displays the members on the about page ', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
      register_sidebar( array(
    'name' => __( 'About Values Header', 'meed network' ),
    'id' => 'about-values-header',
    'description' => __( 'This displays the values header on the about page ', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
  register_sidebar( array(
    'name' => __( 'About Values', 'meed network' ),
    'id' => 'about-values',
    'description' => __( 'This displays the values on the about page ', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
      register_sidebar( array(
    'name' => __( 'About methods', 'meed network' ),
    'id' => 'about-methods',
    'description' => __( 'This displays the methods on the about page ', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
    register_sidebar( array(
    'name' => __( 'About methods Header', 'meed network' ),
    'id' => 'about-methods-header',
    'description' => __( 'This displays the methods header text on the about page ', 'meednetworks' ),
    //'before_widget' => '<div id="%1$s" class="panel text-center %2$s">',
    //'after_widget' => '</div><hr>',
    //'before_title' => '<div class="panel-heading"><h4>',
    //'after_title' => '</h4></div>',
  ) );
}

if ( ! function_exists( '_wp_render_title_tag' ) ) :
  add_action( 'wp_head', 'spi_render_title' );
  function spi_render_title() { 
    print "<title>" . wp_title( '|', true, 'right' ) . "</title>" ;
  } 
endif;


add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
  return 30;
}

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more( $more ) {
  return '...';
}

add_action( 'wp_head', 'add_facebook_metatags' );
function add_facebook_metatags() {
  if( is_single() ) {
?>
  <meta property="og:title" content="<?php the_title() ?>" />
  <meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>" />
  <meta property="og:url" content="<?php the_permalink() ?>" />
  <meta property="og:description" content="<?php the_excerpt() ?>" />
  <meta property="og:type" content="article" />
<?php
  if ( has_post_thumbnail() ) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
?>
  <meta property="og:image" content="<?php echo $image[0]; ?>"/>
<?php endif; ?>
<?php
  }
}

add_action( 'wp_head', 'add_twitter_metatags' );
function add_twitter_metatags() {
  if( is_single() ) {
?>
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php the_title() ?>">
  <meta name="twitter:url" content="<?php the_permalink() ?>">
  <meta name="twitter:description" content="<?php the_excerpt() ?>">
  <meta name="twitter:site" content="@inudun">
  <meta name="twitter:creator" content="@inudun">
<?php
  if ( has_post_thumbnail() ) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
?>
  <meta name="twitter:image" content="<?php echo $image[0]; ?>">
<?php endif; ?>
<?php
  }
}



function get_testimonial() {
  global $slider;
  if ( is_front_page() ):
    $slider = new WP_Query(array(
      'post_type'=>array('testimonial'), 
      'posts_per_page'=>3, 
      'paged'=>1
    ));
   if ($slider->have_posts()) get_template_part('tmpl/testimonial');
    wp_reset_query();
    endif;
}

function share_links() {
  global $post;
  ?>
  <div class="share">
    <a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" ><span><i class="fa fa-facebook"></i></span> Share</a>
    <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;via=meednetworks" target="_blank"><span><i class="fa fa-twitter"></i></span> Tweet</a>
    <a class="email" href="mailto:?Subject=Meeed%20Networks%20Trainings%20-%20<?php the_title(); ?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20%20<?php the_permalink(); ?>"><span><i class="fa fa-mail"></i></span> Email</a>
  </div>
  <?php 
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/*function get_popular(){
  global $popular;
    $popular = new WP_Query(array(
        //'meta_key' => 'post_views_count',
      'meta_key' => 'post_views_count', 
      'orderby'=> 'meta_value',
      'order' => 'DESC',
      'post_type' => 'course',
        //'orderby' => 'meta_value_num',
        'posts_per_page'=>6
        ));

    if ($popular->have_posts()) get_template_part('tmpl/sidebar-course');
      wp_reset_query();
   
} */
function body_name(){
if(isset($_POST['request']) && isset($_POST['submit'])){
 $request = $_POST['request'];
 $body = '';
 foreach($request as $param => $value){
      $body .= "$param: $value". "\n";

 }

                $my_post = array(
                  'post_title' => 'Form Request',
                  'post_content'  => $body,
                  'post_status'   => 'draft',
                  'post_type' =>'course_form',
                  'post_author'   => 1,
                );
                if(wp_insert_post($my_post)) echo "Your Request Has Been Successfully Submitted";
}
}
/* Extend default Walker Class to accomodate Meed Networks Primary Menu layout */
function cat_name(){


    return get_the_category()[0]->name;
}
function get_categories_listing(){
   $listing = "<ul class='list-unstyled'>";
      $category_ids = get_all_category_ids();
          foreach($category_ids as $cat_id) {
            $cat_name = get_cat_name($cat_id);
            $listing .= "<li class='mb5'><i class='icon icon-angle-right text-muted mr5'></i> <a href='".get_category_link( $cat_id)."'>".$cat_name."</a></li>";
  
              }
              $listing .= "</ul>";
              echo $listing;
}

require get_template_directory() . '/inc/customizer.php';

function get_footer_menu($menu_name){
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $menu_list = '<div class="col-sm-4 text-right">';
    $i=1;
    foreach ( (array) $menu_items as $key => $menu_item ) {
      $a = (array) $menu_items;

        $title = $menu_item->title;
        $url = $menu_item->url;
        $menu_list .= '<a href="' . $url . '" data-nav class="text-white">' . $title . '</a> ';
        if ($i !== count($a)) $menu_list .= '<span class="ml5 mr5">&#8226;</span>';
        $i++;
    }
    $menu_list .= '</div>';
    } else {
   // $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
    }

    return $menu_list;
   
}

//menu "Dont Touch This yet !!!!!"
class Meed_Walker_Nav_Menu extends Walker_Nav_Menu
{
  // add classes to ul sub-menus
function start_lvl( &$output, $depth ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}
?>