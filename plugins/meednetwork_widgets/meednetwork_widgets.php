<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * @package   Meed_Network Widgets
 * @author    Abiodun Shuaib <abiodun@golden0.com>
 * @license   GPL-2.0+
 * @link      http://ultractiv.com
 * @copyright 2015 Ultractiv LLC
 *
 * @wordpress-plugin
 * Plugin Name:       Meed Network Widgets
 * Plugin URI:        #
 * Description:       Widgets of home page posts blog
 * Version:           1.0.0
 * Author:            Abiodun Shuaib <abiodun@golden0.com>
 * Author URI:        http://ultractiv.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: #
 */
class Meed_Networks_Widgets {
 
    public $plugin_url;
 
    public function __construct() {
 
        $this->plugin_url = plugin_dir_url( __FILE__ );
 
        add_action( 'init', array( $this, 'wpq_add_custom_post_type' ) );

        add_action( 'widgets_init', array( $this, 'register_meednetwork_widgets' ) );
         register_activation_hook( __FILE__, array( $this, 'activated' ));
        register_deactivation_hook( __FILE__, array( $this, 'deactivated' ));
 
    }

    public function activated(){
        $this->create_page();
        flush_rewrite_rules();
    }

    protected function create_page() {
        // copy template file to themes directory
        copy( plugin_dir_path( __FILE__ ) .'/views/testimonial.php', get_template_directory().'/tmpl/testimonial.php' ); 
        copy( plugin_dir_path( __FILE__ ) .'/views/what-we-do.php', get_template_directory().'/tmpl/what-we-do.php' ); 
        copy( plugin_dir_path( __FILE__ ) .'/views/blog-post-home.php', get_template_directory().'/tmpl/blog-post-home.php' ); 
        copy( plugin_dir_path( __FILE__ ) .'/views/sidebar-course.php', get_template_directory().'/tmpl/sidebar-course.php' ); 
        //copy( plugin_dir_path( __FILE__ ) .'/views/footer.php', get_template_directory().'/tmpl/footer.php' );
        //copy( plugin_dir_path( __FILE__ ) .'/views/tagline-home.php', get_template_directory().'/tmpl/tagline-home.php' );
        copy( plugin_dir_path( __FILE__ ) .'/views/contact-sidebar.php', get_template_directory().'/tmpl/contact-sidebar.php' );
        copy( plugin_dir_path( __FILE__ ) .'/views/about-widget.php', get_template_directory().'/tmpl/about-widget.php' );
        copy( plugin_dir_path( __FILE__ ) .'/views/address-widget.php', get_template_directory().'/tmpl/address-widget.php' );
         copy( plugin_dir_path( __FILE__ ) .'/views/news-widget.php', get_template_directory().'/tmpl/news-widget.php' );
        // create a Questions page in the db
        /*$post = array(
            'post_title'    => 'INUDUN Q&As',
            'post_name'     => 'questions',
            'post_status'   => 'publish',
            'post_type'     => 'page'
        );
        if ($id = wp_insert_post($post))
          add_post_meta($id, '_wp_page_template', 'archive-question.php');*/
    }

    public function deactivated(){
        // remove previously added actions
        remove_action( 'init', array( $this, 'wpq_add_custom_post_type' ) );
        remove_action( 'widgets_init', array( $this, 'register_meednetwork_widgets' ) );

        // unregister the widgets
                unregister_widget( 'MeedNetworks_Contact_SideBar');
                unregister_widget( 'MeedNetworks_Blog_Widget');
                unregister_widget( 'MeedNetworks_Testimonial_Widget');
                //unregister_widget( 'MeedNetworks_Footer' );
                unregister_widget( 'MeedNetworks_Popular_Course_Widget' );
                unregister_widget( 'MeedNetworks_Services');
               // unregister_widget( 'MeedNetworks_Home_Header');
                unregister_widget( 'MeedNetworks_About' );
                unregister_widget( 'MeedNetworks_News' );
                unregister_widget( 'MeedNetworks_Address' );
        flush_rewrite_rules();

        // delete custom posts template files from themes directory 
        if ( is_file( get_template_directory() . '/tmpl/testimonial.php' ) ) {
            unlink( get_template_directory() . '/tmpl/testimonial.php' );
        }

        if ( is_file( get_template_directory() . '/tmpl/what-we-do.php' ) ) {
            unlink( get_template_directory() . '/tmpl/what-we-do.php' );
        }
        if ( is_file( get_template_directory() . '/tmpl/blog-post-home.php' ) ) {
            unlink( get_template_directory() . '/tmpl/blog-post-home.php' );
        }
       if ( is_file( get_template_directory() . '/tmpl/sidebar-course.php' ) ) {
            unlink( get_template_directory() . '/tmpl/sidebar-course.php' );
        }
          /* if ( is_file( get_template_directory() . '/tmpl/footer.php' ) ) {
            unlink( get_template_directory() . '/tmpl/footer.php' );
        }
    if ( is_file( get_template_directory() . '/tmpl/tagline-home.php' ) ) {
            unlink( get_template_directory() . '/tmpl/tagline-home.php' );
        }*/
        if ( is_file( get_template_directory() . '/tmpl/contact-sidebar.php' ) ) {
            unlink( get_template_directory() . '/tmpl/contact-sidebar.php' );
        }
         if ( is_file( get_template_directory() . '/tmpl/about-widget.php' ) ) {
            unlink( get_template_directory() . '/tmpl/about-widget.php' );
        }
        if ( is_file( get_template_directory() . '/tmpl/address-widget.php' ) ) {
            unlink( get_template_directory() . '/tmpl/address-widget.php' );
        }
         if ( is_file( get_template_directory() . '/tmpl/news-widget.php' ) ) {
            unlink( get_template_directory() . '/tmpl/news-widget.php' );
        }
        // delete Questions Page from the db
        // Let's look up the automatically created page for INUDUN Q&As
        /*$post = array(
            'pagename'      => 'questions',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'meta_key'       => '_wp_page_template',
            'meta_value'     => 'archive-question.php'
        );
        
        $query = new WP_Query($post);
        if ( $query->have_posts() ):
        while ( $query->have_posts() ): 
          $query->the_post();
          wp_delete_post( get_the_ID(), true );
        endwhile;
        endif;
        wp_reset_query();*/

    }

    public function wpq_add_custom_post_type() {

        $labels= array(
            'name' => _x( 'Testimonials', 'testimonials' ),
            'singular_name' => _x( 'Testimonials', 'testimonials' ),
            'menu_name' => _x( 'Testimonials', 'testimonials' ),
           // 'add_new' => _x( 'Add New ', 'Course_form' ),
           // 'add_new_item' => _x( 'Add New Training Course', 'course' ),
            //'new_item' => _x( 'New Training course', 'course' ),
           // 'all_items' => _x( 'All Traning Courses', 'course' ),
            'edit_item' => _x( 'Edit Testimonials', 'testimonials' ),
            'view_item' => _x( 'View Testimonials', 'testimonials' ),
            'search_items' => _x( 'Search Testimonials', 'testimonials' ),
            'not_found' => _x( 'No Testimonials  Found', 'testimonials' ),
            'parent_item_colon' => _x( 'Testimonials', 'testimonials' )
        );
 
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'Meed Network Testimonials',
            'supports' => array( 'title','excerpt','custom-fields'),
            //'taxonomies' => array('category','post_tag'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            //'menu_icon' => plugin_dir_url(__FILE__).'img/networkaudit.png',
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => false,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            //'capability_type' => 'post'
        );



        $labels_three= array(
            'name' => _x( 'Members', 'member' ),
            'singular_name' => _x( 'Member', 'member' ),
            'menu_name' => _x( 'Members', 'member' ),
           // 'add_new' => _x( 'Add New ', 'Course_form' ),
           // 'add_new_item' => _x( 'Add New Training Course', 'course' ),
            //'new_item' => _x( 'New Training course', 'course' ),
           // 'all_items' => _x( 'All Traning Courses', 'course' ),
            'edit_item' => _x( 'Edit Members', 'member' ),
            'view_item' => _x( 'View Member', 'member' ),
            'search_items' => _x( 'Search Members', 'member' ),
            'not_found' => _x( 'No Member Found', 'member' ),
            'parent_item_colon' => _x( 'Member', 'member' )
        );
 
        $args_three = array(
            'labels' => $labels_three,
            'hierarchical' => true,
            'description' => 'Members',
            'supports' => array( 'title','excerpt','image','custom-fields','thumbnail'),
            //'taxonomies' => array('category','post_tag'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            //'menu_icon' => plugin_dir_url(__FILE__).'img/networkaudit.png',
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => false,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            //'capability_type' => 'post'
        );
 
        register_post_type( 'testimonials', $args );
      //  register_post_type( 'members', $args_three );
    }




              public function register_meednetwork_widgets() {

                register_widget( 'MeedNetworks_Contact_SideBar');
                register_widget( 'MeedNetworks_Blog_Widget');
                register_widget( 'MeedNetworks_Testimonial_Widget');
                register_widget( 'MeedNetworks_About' );
                register_widget( 'MeedNetworks_News' );
                register_widget( 'MeedNetworks_Address' );
                register_widget( 'MeedNetworks_Popular_Course_Widget' );
                register_widget( 'MeedNetworks_Services');
               // register_widget( 'MeedNetworks_Home_Header');
              }

}

//Popular Courses Widget 

class MeedNetworks_Popular_Course_Widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-popular-course',
            // name of the widget
            __('Meed Network Popular Courses', 'meed-network-popular-course' ),
            // widget options
            array (
                'description' => __( 'Displays a maximum of 5 most popular Courses on the courses page.', 'meed-network-popular-course' )
            )
        );
    }
     
    function form( $instance ) {
        $defaults = array(
          'title' => 'Popular Courses',
          'limit' => 5
        );
        $limit = $instance[ 'limit' ] ? $instance[ 'limit' ] : $defaults[ 'limit' ];
        $title = $instance[ 'title' ] ? $instance[ 'title' ] : $defaults[ 'title' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Heading Text:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'limit' ); ?>">Limit Posts:</label>
            <input class="widefat" type="number" max="5" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo esc_attr( $limit ); ?>">
        </p>
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'limit' ] = strip_tags( $new_instance[ 'limit' ] );
      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      global $heading;
      $heading = $instance[ 'title' ];
      global $popular;
      extract( $args );
      $popular = new WP_Query( 
        array( 
          'post_type' => 'course',
          'posts_per_page' => $instance['limit'], 
          'meta_key' => 'post_views_count', 
          'orderby'=> 'meta_value',
          'orderby' => 'meta_value_num', 
          'order' => 'DESC',
          //'paged' => 1 
        ) 
      );
      if ( $popular->have_posts() )  get_template_part('tmpl/sidebar-course');
      wp_reset_query();
  }
}

// Testimonial Widget 
class MeedNetworks_Testimonial_Widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-testimonials',
            // name of the widget
            __('Meed Network Testimonials', 'meed-network-testimonials' ),
            // widget options
            array (
                'description' => __( 'Displays a maximum of 10 most testimonials on the home page.', 'meed-network-testimonials' )
            )
        );
    }
     
    function form( $instance ) {
        $defaults = array(
          'title' => 'Popular Courses',
          'limit' => 5
        );
        $limit = $instance[ 'limit' ] ? $instance[ 'limit' ] : $defaults[ 'limit' ];
        $title = $instance[ 'title' ] ? $instance[ 'title' ] : $defaults[ 'title' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Heading Text:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'limit' ); ?>">Limit Posts:</label>
            <input class="widefat" type="number" max="10" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo esc_attr( $limit ); ?>">
        </p>
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'limit' ] = strip_tags( $new_instance[ 'limit' ] );
      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      extract( $args );
      
      global $testimonial;
      $testimonial = new WP_Query( 
        array( 
          'post_type' => 'testimonials',
          'posts_per_page' => $instance['limit'], 
          'orderby'=> 'date',
          'order' => 'DESC',
          //'paged' => 1 
        ) 
      );
      if ( $testimonial->have_posts() )  get_template_part('tmpl/testimonial');
            wp_reset_query();
  }
}




//Services Widget
class MeedNetworks_Services extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-services',
            // name of the widget
            __('Meed Network  Services', 'meed-network-services' ),
            // widget options
            array (
                'description' => __( 'Displays on the home page ', 'meed-network-home-services' )
            )
        );
    }
     
    function form( $instance ) {
       
        $defaults = array(
          'heading' => 'What We Do',
          'sub_text' => 'How we use technology to improve business processes',
         
        );
         $heading = $instance[ 'heading' ] ? $instance[ 'heading' ] : $defaults[ 'heading' ];
         $sub_text = $instance[ 'sub_text' ] ? $instance[ 'sub_text' ] : $defaults[ 'sub_text' ];
        
       
        // markup for form ?>
       <p>
            <label for="<?php echo $this->get_field_id( 'about_title' ); ?>">Header:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'heading' ); ?>" name="<?php echo $this->get_field_name( 'heading' ); ?>" value="<?php echo esc_attr( $heading ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'about_text' ); ?>">Sub Text:</label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'sub_text' ); ?>" name="<?php echo $this->get_field_name( 'sub_text'); ?>"><?php echo esc_attr( $sub_text); ?></textarea>
        </p>
        
       

<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'heading' ] = strip_tags( $new_instance[ 'heading' ] );
    



      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      extract( $args );
      global $services;
      $services = $instance;
      global $service;
      $service = new WP_Query( 
        array( 
          'post_type' => 'page',
       'posts_per_page' => 4, 
         //'orderby'=> 'date',
          'order' => 'ASC',
        'meta_query' => array( 
        array(
            'key'   => '_wp_page_template', 
            'value' => 'page-templates/services-page.php'
                )
             )
          //'paged' => 1 
        ) 
      );
      if ( $service->have_posts() )  get_template_part('tmpl/what-we-do');
            wp_reset_query();
      
    }
}
class MeedNetworks_Blog_Widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-blog',
            // name of the widget
            __('Meed Network Blog Widget', 'meed-network-blog' ),
            // widget options
            array (
                'description' => __( 'Displays a maximum of 10 most recent blog on the home page.', 'meed-network-blog' )
            )
        );
    }
     
    function form( $instance ) {
        $defaults = array(
          'title' => 'Blog Posts',
          'sub_head' => 'Latest blog posts',
          'sub' => "We use the Meed Blog as a medium to articulate and share some of the knowledge and experiences we gain from the field. The objective is simply to improve the industry.",
          'limit' => 5,
          'button_text' => 'View All Blog Post',
        );
        $limit = $instance[ 'limit' ] ? $instance[ 'limit' ] : $defaults[ 'limit' ];
        $title = $instance[ 'title' ] ? $instance[ 'title' ] : $defaults[ 'title' ];
        $sub_head = $instance[ 'sub_head' ] ? $instance[ 'sub_head' ] : $defaults[ 'sub_head' ];
        $sub = $instance[ 'sub' ] ? $instance[ 'sub' ] : $defaults[ 'sub' ];
        $button_text = $instance[ 'button_text' ] ? $instance[ 'button_text' ] : $defaults[ 'button_text' ];
      
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Heading Text:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Sub Heading:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'sub_head' ); ?>" name="<?php echo $this->get_field_name( 'sub_head' ); ?>" value="<?php echo esc_attr( $sub_head ); ?>">
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Description:</label>
            <textarea class="widefat" rows="20" cols="16" id="<?php echo $this->get_field_id( 'sub' ); ?>" name="<?php echo $this->get_field_name( 'sub' ); ?>" ><?php echo esc_attr( $sub ); ?></textarea>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Button Text:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo esc_attr( $button_text ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'limit' ); ?>">Limit Posts:</label>
            <input class="widefat" type="number" max="10" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo esc_attr( $limit ); ?>">
        </p>
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'sub_head' ] = strip_tags( $new_instance[ 'sub_head' ] );
      $instance[ 'sub' ] = strip_tags( $new_instance[ 'sub' ] );
      $instance[ 'button_text' ] = strip_tags( $new_instance[ 'button_text' ] );
      $instance[ 'limit' ] = strip_tags( $new_instance[ 'limit' ] );
      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      extract( $args );
      global $bloginfo;
      $bloginfo = $instance;
      global $blog;
      $blog = new WP_Query( 
        array( 
          'post_type' => 'post',
          'posts_per_page' => $instance['limit'], 
          'orderby'=> 'date',
          'order' => 'DESC',
          //'paged' => 1 
        ) 
      );
      if ( $blog->have_posts() )  get_template_part('tmpl/blog-post-home');
            wp_reset_query();
  }
}
class MeedNetworks_Contact_SideBar extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-contact-sidebar',
            // name of the widget
            __('Meed Contact SideBar', 'meed-network-contact-sidebar' ),
            // widget options
            array (
                'description' => __( 'Displays by the right side of the contact sidebar ', 'meed-network-contact-sidebar' )
            )
        );
    }
     
    function form( $instance ) {
        
        $defaults = array(
          
          'address_title' => 'Address',
          'address_line_1' => '34 Burundi Street',
          'address_line_2' =>  'Off Damba Close',
          'city' => 'Wuse Zone 5',
          'state' => 'Abuja',       
          'country' =>'Nigeria',
          'phone'  => '(+234) 92 918 976',    
          'email' => 'info@meednetworks.com',
          'working_days'=>'8am - 5pm',
          'saturdays' => '11am - 4pm',
         
        );
       
          $address_title = $instance[ 'address_title' ] ? $instance[ 'address_title' ] : $defaults[ 'address_title' ];
           $address_line_1 = $instance[ 'address_line_1' ] ? $instance[ 'address_line_1' ] : $defaults[ 'address_line_1' ];
           $address_line_2 = $instance[ 'address_line_2' ] ? $instance[ 'address_line_2' ] : $defaults[ 'address_line_2' ];
           $city = $instance[ 'city' ] ? $instance[ 'city' ] : $defaults[ 'city' ];
           $state = $instance[ 'state' ] ? $instance[ 'state' ] : $defaults[ 'state' ];
           $country = $instance[ 'country' ] ? $instance[ 'country' ] : $defaults[ 'country' ];
           $phone = $instance[ 'phone' ] ? $instance[ 'phone' ] : $defaults[ 'phone' ];
           $email = $instance[ 'email' ] ? $instance[ 'email' ] : $defaults[ 'email' ];
           $saturdays = $instance[ 'saturdays' ] ? $instance[ 'saturdays' ] : $defaults[ 'saturdays' ];
           $working_days = $instance[ 'working_days' ] ? $instance[ 'working_days' ] : $defaults[ 'working_days' ];
        // markup for form ?>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'address_title' ); ?>">Address Heading:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_title' ); ?>" name="<?php echo $this->get_field_name( 'address_title' ); ?>" value="<?php echo esc_attr( $address_title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Address line 1:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_line_1' ); ?>" name="<?php echo $this->get_field_name( 'address_line_1' ); ?>" value="<?php echo esc_attr( $address_line_1 ); ?>">       
        </p>
          <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Address line 2:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_line_2' ); ?>" name="<?php echo $this->get_field_name( 'address_line_2' ); ?>" value="<?php echo esc_attr( $address_line_2 ); ?>">       
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">City:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" value="<?php echo esc_attr( $city ); ?>">       
        </p>
                 <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">State:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'state' ); ?>" name="<?php echo $this->get_field_name( 'state' ); ?>" value="<?php echo esc_attr( $state ); ?>">       
        </p>
                         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Country:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'country' ); ?>" name="<?php echo $this->get_field_name( 'country' ); ?>" value="<?php echo esc_attr( $country ); ?>">       
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Phone:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo esc_attr( $phone ); ?>">       
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Email:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $email ); ?>">       
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Working Hours Working Days:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'working_days' ); ?>" name="<?php echo $this->get_field_name( 'working_days' ); ?>" value="<?php echo esc_attr( $working_days ); ?>">       
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Working Hours Weekends Day:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'saturdays' ); ?>" name="<?php echo $this->get_field_name( 'saturdays' ); ?>" value="<?php echo esc_attr( $saturdays ); ?>">       
        </p>
        <hr>

<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

        $instance[ 'address_title' ] = strip_tags( $new_instance[ 'address_title' ] );
         $instance[ 'address_line_1' ] = strip_tags( $new_instance[ 'address_line_1' ] );
          $instance[ 'address_line_2' ] = strip_tags( $new_instance[ 'address_line_2' ] );
           $instance[ 'city' ] = strip_tags( $new_instance[ 'city' ] );
           $instance[ 'state' ] = strip_tags( $new_instance[ 'state' ] );
           $instance[ 'country' ] = strip_tags( $new_instance[ 'country' ] );
           $instance[ 'phone' ] = strip_tags( $new_instance[ 'phone' ] );
           $instance[ 'email' ] = strip_tags( $new_instance[ 'email' ] );
           $instance[ 'working_days' ] = strip_tags( $new_instance[ 'working_days' ] );
            $instance[ 'saturdays' ] = strip_tags( $new_instance[ 'saturdays' ] );
          


      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      extract( $args );
      global $contactinfo;
      $contactinfo = $instance;
      get_template_part('tmpl/contact-sidebar');
    }
}
class MeedNetworks_About extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-about',
            // name of the widget
            __('Meed Network  About', 'meed-network-about' ),
            // widget options
            array (
                'description' => __( 'Displays the About Excerpt of the home page ', 'meed-network-home-about' )
            )
        );
    }
     
    function form( $instance ) {
        $page = get_page_by_title('About');
        $the_excerpt = $page->post_excerpt;
        $defaults = array(
          'about_title' => 'About',
          'about_text' => $the_excerpt ? $the_excerpt : 'Enter About Page',
          
        );
        $about_title = $instance[ 'about_title' ] ? $instance[ 'about_title' ] : $defaults[ 'about_title' ];
         $about_text = $instance[ 'about_text' ] ? $instance[ 'about_text' ] : $defaults[ 'about_text' ];
         
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'about_title' ); ?>">About Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'about_title' ); ?>" name="<?php echo $this->get_field_name( 'about_title' ); ?>" value="<?php echo esc_attr( $about_title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'about_text' ); ?>">About Text:</label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'about_text' ); ?>" name="<?php echo $this->get_field_name( 'about_text'); ?>"><?php echo esc_attr( $about_text); ?></textarea>
        </p>
       

<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'about_title' ] = strip_tags( $new_instance[ 'about_title' ] );
       $instance[ 'about_text' ] = strip_tags( $new_instance[ 'about_text' ] );


      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      extract( $args );
      global $about;
      $about = $instance;
      get_template_part('tmpl/about-widget');
    }
}

class MeedNetworks_Address extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-address',
            // name of the widget
            __('Meed Network Address', 'meed-network-address' ),
            // widget options
            array (
                'description' => __( 'Displays The Address ', 'meed-network-address' )
            )
        );
    }
     
    function form( $instance ) {
        
        $defaults = array(
          
          'address_title' => 'Address',
          'address_line_1' => '34 Burundi Street',
          'address_line_2' =>  'Off Damba Close',
          'city' => 'Wuse Zone 5',
          'state' => 'Abuja',       
          'country' =>'Nigeria',
          'phone'  => '(+234) 92 918 976',
          'email' => 'info@meednetworks.com',
          'facebook' =>'meednetworks',
          'twitter'  => 'meednetworks',  
          'google' =>'+MeedNetworks', 
          'linkedin' =>'meednetworks', 
        );
       
          $address_title = $instance[ 'address_title' ] ? $instance[ 'address_title' ] : $defaults[ 'address_title' ];
           $address_line_1 = $instance[ 'address_line_1' ] ? $instance[ 'address_line_1' ] : $defaults[ 'address_line_1' ];
           $address_line_2 = $instance[ 'address_line_2' ] ? $instance[ 'address_line_2' ] : $defaults[ 'address_line_2' ];
           $city = $instance[ 'city' ] ? $instance[ 'city' ] : $defaults[ 'city' ];
           $state = $instance[ 'state' ] ? $instance[ 'state' ] : $defaults[ 'state' ];
           $country = $instance[ 'country' ] ? $instance[ 'country' ] : $defaults[ 'country' ];
           $phone = $instance[ 'phone' ] ? $instance[ 'phone' ] : $defaults[ 'phone' ];
           $email = $instance[ 'email' ] ? $instance[ 'email' ] : $defaults[ 'email' ];
           
        // markup for form ?>
       
        <p>
            <label for="<?php echo $this->get_field_id( 'address_title' ); ?>">Address Heading:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_title' ); ?>" name="<?php echo $this->get_field_name( 'address_title' ); ?>" value="<?php echo esc_attr( $address_title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Address line 1:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_line_1' ); ?>" name="<?php echo $this->get_field_name( 'address_line_1' ); ?>" value="<?php echo esc_attr( $address_line_1 ); ?>">       
        </p>
          <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Address line 2:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_line_2' ); ?>" name="<?php echo $this->get_field_name( 'address_line_2' ); ?>" value="<?php echo esc_attr( $address_line_2 ); ?>">       
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">City:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" value="<?php echo esc_attr( $city ); ?>">       
        </p>
                 <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">State:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'state' ); ?>" name="<?php echo $this->get_field_name( 'state' ); ?>" value="<?php echo esc_attr( $state ); ?>">       
        </p>
                         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Country:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'country' ); ?>" name="<?php echo $this->get_field_name( 'country' ); ?>" value="<?php echo esc_attr( $country ); ?>">       
        </p>
                              <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Phone:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo esc_attr( $phone ); ?>">       
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'addresss' ); ?>">Email:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $email ); ?>">       
        </p>
        <hr>
              
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
     
        $instance[ 'address_title' ] = strip_tags( $new_instance[ 'address_title' ] );
         $instance[ 'address_line_1' ] = strip_tags( $new_instance[ 'address_line_1' ] );
          $instance[ 'address_line_2' ] = strip_tags( $new_instance[ 'address_line_2' ] );
           $instance[ 'city' ] = strip_tags( $new_instance[ 'city' ] );
           $instance[ 'state' ] = strip_tags( $new_instance[ 'state' ] );
           $instance[ 'country' ] = strip_tags( $new_instance[ 'country' ] );
           $instance[ 'phone' ] = strip_tags( $new_instance[ 'phone' ] );
           $instance[ 'email' ] = strip_tags( $new_instance[ 'email' ] );
          $instance[ 'news_title' ] = strip_tags( $new_instance[ 'news_title' ] );
           


      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      extract( $args );
      global $address;
      $address = $instance;
      get_template_part('tmpl/address-widget');
    }
}

class MeedNetworks_News extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-news',
            // name of the widget
            __('Meed Network  NewsLetter', 'meed-network-news' ),
            // widget options
            array (
                'description' => __( 'Displays under the news of the home page ', 'meed-network-news' )
            )
        );
    }
     
    function form( $instance ) {
        
        $defaults = array(
          'news_title' => 'News Letter',
          'description' => 'Subscribe to our newsletter and stay up to date with the latest news, case studies and offers from our company!',
        );
        
           $news_title = $instance[ 'news_title' ] ? $instance[ 'news_title' ] : $defaults[ 'news_title' ];
           $description = $instance[ 'description' ] ? $instance[ 'description' ] : $defaults[ 'description' ];
           
        // markup for form ?>
      
          <p>
            <label for="<?php echo $this->get_field_id( 'news_title' ); ?>">News Letter Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'news_title' ); ?>" name="<?php echo $this->get_field_name( 'news_title' ); ?>" value="<?php echo esc_attr( $news_title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>">Description:</label>
            <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description'); ?>"><?php echo esc_attr( $description); ?></textarea>
        </p>

<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      
          $instance[ 'news_title' ] = strip_tags( $new_instance[ 'news_title' ] );
          
           $instance[ 'description' ] = strip_tags( $new_instance[ 'description' ] );


      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      extract( $args );
      global $news;
      $news = $instance;
      get_template_part('tmpl/news-widget');
    }
}



new Meed_Networks_Widgets;
//add_action( 'widgets_init', 'register_meednetwork_widgets' );
