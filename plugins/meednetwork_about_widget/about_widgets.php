<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * @package   Meed_Network Widgets
 * @author    Yemi Agbetunsin <yemi@ultractiv.com>
 * @license   GPL-2.0+
 * @link      http://ultractiv.com
 * @copyright 2015 Ultractiv LLC
 *
 * @wordpress-plugin
 * Plugin Name:       Meed Network About Page Widgets
 * Plugin URI:        #
 * Description:       Widgets of about page mmeed network blog
 * Version:           1.0.0
 * Author:            Yemi Agbetusnin <yemi@ultractiv.com>
 * Author URI:        http://ultractiv.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: #
 */
class Meed_Networks_About_Widgets {
 
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
        copy( plugin_dir_path( __FILE__ ) .'/views/values.php', get_template_directory().'/tmpl/values.php' ); 
        copy( plugin_dir_path( __FILE__ ) .'/views/members.php', get_template_directory().'/tmpl/members.php' ); 
        copy( plugin_dir_path( __FILE__ ) .'/views/methods.php', get_template_directory().'/tmpl/methods.php' ); 
        copy( plugin_dir_path( __FILE__ ) .'/views/about-header.php', get_template_directory().'/tmpl/about-header.php' ); 

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
                unregister_widget( 'MeedNetworks_Values_Widget');
                unregister_widget( 'Meed_Networks_About_Widgets');
                unregister_widget( 'MeedNetworks_Methods_Widget');

        flush_rewrite_rules();

        // delete custom posts template files from themes directory 
        if ( is_file( get_template_directory() . '/tmpl/values.php' ) ) {
            unlink( get_template_directory() . '/tmpl/values.php' );
        }
        if ( is_file( get_template_directory() . '/tmpl/methods.php' ) ) {
            unlink( get_template_directory() . '/tmpl/methods.php' );
        }
        if ( is_file( get_template_directory() . '/tmpl/members.php' ) ) {
            unlink( get_template_directory() . '/tmpl/members.php' );
        }
     if ( is_file( get_template_directory() . '/tmpl/about-header.php' ) ) {
            unlink( get_template_directory() . '/tmpl/about-header.php' );
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
 
        $args = array(
            'labels' => $labels,
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
        register_post_type( 'members', $args );
    }




    public function register_meednetwork_widgets() {

                register_widget( 'MeedNetworks_Values_Widget');
                register_widget( 'MeedNetworks_Methods_Widget');
                register_widget( 'MeedNetworks_Members_Widget');
                 register_widget( 'MeedNetworks_Header_Widget');

              }

}
class MeedNetworks_Header_Widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-about-header',
            // name of the widget
            __('Meed Network Header for about topics', 'meed-network-about-header' ),
            // widget options
            array (
                'description' => __( 'Header for About topcis', 'meed-network-about-header' )
            )
        );
    }
     
    function form( $instance ) {
        $defaults = array(
          'title' => '',
          'text' => '',
          
        );
      
        $title = $instance[ 'title' ] ? $instance[ 'title' ] : $defaults[ 'title' ];
         $text = $instance[ 'text' ] ? $instance[ 'text' ] : $defaults[ 'text' ];
        // markup for form ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>">Text:</label>
            <textarea class="widefat" type="text" rows="20"  cols="16" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" ><?php echo esc_attr( $text );?></textarea>
        </p>
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
        global $header_text;
        $header_text = $instance;
        get_template_part('tmpl/about-header');
  }
}

class MeedNetworks_Values_Widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-values',
            // name of the widget
            __('Meed Network Values', 'meed-network-values' ),
            // widget options
            array (
                'description' => __( 'Displays the values on the page', 'meed-network-popular-values' )
            )
        );
    }
     
    function form( $instance ) {
        $defaults = array(
          'title' => '',
          'text' => '',
          'icon' => '',
        );
        $icon = $instance[ 'icon' ] ? $instance[ 'icon' ] : $defaults[ 'icon' ];
        $title = $instance[ 'title' ] ? $instance[ 'title' ] : $defaults[ 'title' ];
         $text = $instance[ 'text' ] ? $instance[ 'text' ] : $defaults[ 'text' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Icons:</label>
            <select class="widefat" type="text" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo esc_attr( $icon ); ?>">
            <option value="icon-compass" <?php if (esc_attr( $icon ) == 'icon-compass') echo "selected";?>>Compass</option>
            <option value="icon-users" <?php if (esc_attr( $icon ) == 'icon-users') echo "selected";?>>User</option>
            <option value="icon-thumbs-up" <?php if (esc_attr( $icon ) == 'icon-thumbs-up') echo "selected";?>>Thumbs Up</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>">Text:</label>
            <textarea class="widefat" type="text" rows="20"  cols="16" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" ><?php echo esc_attr( $text );?></textarea>
        </p>
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'icon' ] = strip_tags( $new_instance[ 'icon' ] );
      $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
        global $values;
        $values = $instance;
        get_template_part('tmpl/values');
  }
}

class MeedNetworks_Methods_Widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-methods',
            // name of the widget
            __('Meed Network Methods', 'meed-network-methods' ),
            // widget options
            array (
                'description' => __( 'Displays the methods on the about page', 'meed-network-popular-methods' )
            )
        );
    }
     
    function form( $instance ) {
        $defaults = array(
          'title' => '',
          'text' => '',
          'icon' => '',
        );
        $text = $instance[ 'text' ] ? $instance[ 'text' ] : $defaults[ 'text' ];
        $title = $instance[ 'title' ] ? $instance[ 'title' ] : $defaults[ 'title' ];
         $icon = $instance[ 'icon' ] ? $instance[ 'icon' ] : $defaults[ 'icon' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Icons:</label>
            <select class="widefat" type="text" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo esc_attr( $icon ); ?>">
            <option value="icon-eye-slash" <?php if (esc_attr( $icon ) == 'icon-eye-slash') echo "selected";?>>Eye Slash</option>
            <option value="icon-sliders" <?php if (esc_attr( $icon ) == 'icon-sliders') echo "selected";?>>Slider</option>
            <option value="icon-edit" <?php if (esc_attr( $icon ) == 'icon-edit') echo "selected";?>>Edit</option>
             <option value="icon-cogs" <?php if (esc_attr( $icon ) == 'icon-cogs') echo "selected";?>>Cogs</option>
              <option value="icon-lifebuoy" <?php if (esc_attr( $icon ) == 'icon-lifebuoy') echo "selected";?>>Life Buoy</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>">Text:</label>
            <textarea class="widefat" rows="20" cols="15" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_attr( $text ); ?></textarea>
        </p>
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'icon' ] = strip_tags( $new_instance[ 'icon' ] );
      $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
        global $methods;
        $methods = $instance;
        get_template_part('tmpl/methods');
  }
}

class MeedNetworks_Members_Widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'meed-network-popular-members',
            // name of the widget
            __('Meed Network Members Widgets', 'meed-network-popular-members' ),
            // widget options
            array (
                'description' => __( 'Displays a memebers on the about page.', 'meed-network-popular-members' )
            )
        );
    }
     
    function form( $instance ) {
        $defaults = array(
          'title' => 'Management Team',
          'excerpt' => 'Meet Our Awesome Team Members',
          'limit' => 4
        );
        $limit = $instance[ 'limit' ] ? $instance[ 'limit' ] : $defaults[ 'limit' ];
        $title = $instance[ 'title' ] ? $instance[ 'title' ] : $defaults[ 'title' ];
        $excerpt = $instance[ 'excerpt' ] ? $instance[ 'excerpt' ] : $defaults[ 'excerpt' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Heading Text:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Excerpt:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="<?php echo esc_attr( $excerpt ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'limit' ); ?>">Limit Posts:</label>
            <input class="widefat" type="number" max="4" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo esc_attr( $limit ); ?>">
        </p>
<?php
    }
     
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'limit' ] = strip_tags( $new_instance[ 'limit' ] );
      $instance[ 'excerpt' ] = strip_tags( $new_instance[ 'excerpt' ] );
      return $instance;       
    }
     
    function widget( $args, $instance ) {
      // kick things off
      global $members;
      $members = $instance;
      global $member;
      extract( $args );
      $member = new WP_Query( 
        array( 
          'post_type' => 'members',
          'posts_per_page' => $members['limit'],
          //'paged' => 1 
        ) 
      );
      if ( $member->have_posts() )  get_template_part('tmpl/members');
      wp_reset_query();
  }
}

new Meed_Networks_About_Widgets;

?>