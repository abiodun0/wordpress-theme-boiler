<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * @package  Meed Networks Training Course Series
 * @author    Yemi Agbetunsin <yemi@ultractiv.com>
 * @license   GPL-2.0+
 * @link      http://ultractiv.com
 * @copyright 2015 Ultractiv LLC
 *
 * @wordpress-plugin
 * Plugin Name:       Meed Network Course
 * Plugin URI:        #
 * Description:       Post Custom courses
 * Version:           1.0.0
 * Author:            Yemi Agbetusnin <yemi@ultractiv.com>
 * Author URI:        http://ultractiv.com
 * Text Domain:       photo
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: #
 */
class MEED_COURSE {
 
    public $plugin_url;
 
    public function __construct() {
 
        $this->plugin_url = plugin_dir_url( __FILE__ );
 
        add_action( 'init', array( $this, 'wpq_add_custom_post_type' ) );
        add_action( 'save_post', array( $this, 'wpq_save_photos' ) );
       // add_action( 'add_meta_boxes', array( $this,'wpq_photo_meta_boxes' ) );
        add_filter( 'template_include', array($this, 'include_template_function'), 1 );
      //  add_action( 'wp_ajax_poll_options_vote' , array( $this, 'poll_options_vote' ) );
       // add_action( 'wp_ajax_nopriv_poll_options_vote' , array( $this, 'poll_options_vote' ) );
        //add_action( 'wp_enqueue_scripts', array( $this, 'wpq_frontend_scripts' ) );
        register_activation_hook( __FILE__, array( $this, 'activated' ));
        register_deactivation_hook( __FILE__, array( $this, 'deactivated' ));
             //$this->request_form();
    }
    //$this->request_form();
    public function activated(){
        copy( plugin_dir_path( __FILE__ ) . '/view/single-course.php',  get_template_directory() . '/single-course.php' ); 
        //copy( plugin_dir_path( __FILE__ ) . '/view/sidebar-course.php',  get_template_directory() . '/tmpl/sidebar-course.php' ); 
        flush_rewrite_rules();
   
    }
    public function deactivated(){
        // remove previously added actions
        remove_action( 'init', array( $this, 'wpq_add_custom_post_type' ) );
        remove_action( 'save_post', array( $this, 'wpq_save_photos' ) );
        //remove_action( 'add_meta_boxes', array( $this,'wpq_photo_meta_boxes' ) );
        remove_filter( 'template_include', array( $this, 'include_template_function'), 1 );
        //remove_action( 'wp_ajax_poll_options_vote' , array( $this, 'poll_options_vote' ) );
        //remove_action( 'wp_ajax_nopriv_poll_options_vote' , array( $this, 'poll_options_vote' ) );
        //remove_action( 'wp_enqueue_scripts', array( $this, 'wpq_frontend_scripts' ) );
        flush_rewrite_rules();
        // delete custom posts template files from themes directory 
        if ( is_file( get_template_directory() . '/single-course.php' ) ) {
            unlink( get_template_directory() . '/single-course.php' );
        }
        if ( is_file( get_template_directory() . 'tmpl/sidebar-course.php' ) ) {
            unlink( get_template_directory() . 'tmpl/sidebar-course.php' );
        }
    }
    
 
    public function wpq_add_custom_post_type() {
 
        $labels = array(
            'name' => _x( 'Course', 'course' ),
            'singular_name' => _x( 'Course', 'course' ),
            'menu_name' => _x( 'Course', 'course' ),
            'add_new' => _x( 'Add New ', 'Course' ),
            'add_new_item' => _x( 'Add New Training Course', 'course' ),
            'new_item' => _x( 'New Training course', 'course' ),
            'all_items' => _x( 'All Traning Courses', 'course' ),
            'edit_item' => _x( 'Edit Course', 'course' ),
            'view_item' => _x( 'View Post', 'course' ),
            'search_items' => _x( 'Search Course', 'course' ),
            'not_found' => _x( 'No Courses Post Found', 'course' ),
            'parent_item_colon' => _x( 'Parent training course:', 'course' )
        );
 
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'Meed Network Training Courses',
            'supports' => array( 'title','aside','image','editor', 'thumbnail', 'revisions', 'excerpt', 'custom-fields','author'),
            'taxonomies' => array('category','post_tag'),
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

        $labels_two= array(
            'name' => _x( 'Course Form', 'course_form' ),
            'singular_name' => _x( 'Course Form', 'course_form' ),
            'menu_name' => _x( 'Course Form', 'course_form' ),
           // 'add_new' => _x( 'Add New ', 'Course_form' ),
           // 'add_new_item' => _x( 'Add New Training Course', 'course' ),
            //'new_item' => _x( 'New Training course', 'course' ),
           // 'all_items' => _x( 'All Traning Courses', 'course' ),
            'edit_item' => _x( 'Edit Course Form', 'course_form' ),
            'view_item' => _x( 'View Course Form', 'course_form' ),
            'search_items' => _x( 'Search Course Form', 'course_form' ),
            'not_found' => _x( 'No Courses Form  Found', 'course_form' ),
            'parent_item_colon' => _x( 'Course Form', 'course_form' )
        );
 
        $args_two = array(
            'labels' => $labels_two,
            'hierarchical' => true,
            'description' => 'Meed Network Course Forms',
            'supports' => array( 'title','author','editor'),
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




 
        register_post_type( 'course', $args );
        register_post_type('course_form',$args_two);
        //
    }



    public function wpq_photo_meta_boxes() {
        //add_meta_box( 'photos-info', 'Opinion Poll', array( $this, 'wpq_photos_info' ), 'photo', 'normal', 'high' );
    }
     
    public function wpq_photos_info() {
     
        global $post;
        $has_poll = get_post_meta( $post->ID, '_has_poll', true );   
     
        $subject = get_post_meta( $post->ID, '_poll_subject', true ); 
     
        $html = '<input type="hidden" name="photo_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
     
        $html .= '<table class="form-table">';
     
        $html .= '<tr><th><label for="has_poll">Include opinion polls</label></th><td><input type="checkbox" name="has_poll" id="has_poll" value="1" '. ( $has_poll ? 'checked="checked"' : '' ) .'>';
     
        $html .= '<span>Check to include polls in this post.</span></td></tr>';
        $html .= '<tr><th><label for="poll_subject">Subject of Poll</label></th><td><input type="text" class="widefat" placeholder="Enter some text here, e.g, Who wears it better?" name="poll_subject" id="poll_subject" value="'. esc_attr( $subject ) .'">';
     
        $html .= '</td></tr>';
        for ($i=1; $i <= 2; $i++) {
            $option_key = get_post_meta( $post->ID, '_poll_option_'.$i, true );
            $option_value = get_post_meta( $post->ID, '_poll_option_'.$i.'_votes', true );
            $option_value = $option_value ? $option_value : 0;
            $html .= '<tr><th><label for="option_'.$i.'">Option #'.$i.'</label></th>';
            $html .= '<td><input class="widefat" type="text" placeholder="Enter some text here..." name="poll_option_'.$i.'" id="option_'.$i.'" value="'. esc_attr( $option_key ) .'"></td></tr>';
            $html .= '<tr><th><label for="option_'.$i.'_votes">Option #'.$i.' Votes</label></th>';
            $html .= '<td><input type="number" name="poll_option_'.$i.'_votes" id="option_'.$i.'_votes" value="'. esc_attr( $option_value ) .'"></td></tr>';
        }
        $html .= '</table>';
     
        echo $html;
    }
    public function wpq_save_photos( $post_id ) {
 
        if ( ! wp_verify_nonce( $_POST['photo_box_nonce'], basename( __FILE__ ) ) ) {
     
            return $post_id;
     
        }
     
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
     
            return $post_id;
     
        }
     
        if ( 'photo' == $_POST['post_type'] && current_user_can( 'edit_post', $post_id ) ) {
     
            if ( isset( $_POST['has_poll'] ) ) {
              $subject = isset( $_POST['poll_subject'] ) ? sanitize_text_field( trim( $_POST['poll_subject'] ) ) : "";
              if (!$subject) return;
         
              for ($i=1; $i <= 2; $i++) {
         
                $option = isset( $_POST['poll_option_'.$i] ) ? sanitize_text_field( trim( $_POST['poll_option_'.$i] ) ) : "";
                $votes = isset( $_POST['poll_option_'.$i.'_votes'] ) ? sanitize_text_field( trim ($_POST['poll_option_'.$i.'_votes'] ) ) : 0;
                if (!$option || !$subject) break;
                update_post_meta( $post_id, "_poll_option_".$i, $option );
                update_post_meta( $post_id, "_poll_option_".$i.'_votes', $votes );
         
              }
              update_post_meta( $post_id, "_poll_subject", $subject );
              update_post_meta( $post_id, "_has_poll", true );
            }
            else {
                update_post_meta( $post_id, "_has_poll", false );
            }
     
        }
        else {
     
            return $post_id;
     
        }
    }
    public function include_template_function( $template_path ) {
        if ( get_post_type() == 'course' ) {
            if ( is_single() ) {
                // checks if the file exists in the theme first,
                // otherwise serve the file from the plugin
                if ( $theme_file = locate_template( array ( 'single-course.php' ) ) ) {
                    $template_path = $theme_file;
                } else {
                    $template_path = plugin_dir_path( __FILE__ ) . 'view/single-course.php';
                }
            }
        }
        return $template_path;
    }



    public function wpq_frontend_scripts() {
      
        wp_register_script( 'photo', plugins_url( 'js/photo.js', __FILE__ ), array( 'jquery' ) );
     
        wp_enqueue_script( 'photo' );
     
        $config_array = array(
     
            'ajaxURL' => admin_url( 'admin-ajax.php' ),
     
            'photoNonce' => wp_create_nonce( 'photo-nonce' ),
     
            'plugin_url' => $this->plugin_url
     
        );
     
        wp_localize_script( 'photo', 'photo', $config_array );
     
    }
    public function poll_options_vote() {
 
        $post = $_POST["data"];
     
        if ( !isset($post['post_id']) || !isset($post['post_type']) || $post['post_type'] != 'photo' )
            { echo json_encode( array('error'=>'something is amiss!') ); exit; }
        $post_id = sanitize_text_field( trim( $post['post_id'] ) );
        $option = sanitize_text_field( trim( $post['vote'] ) );
        $old_value = get_post_meta($post_id, $option, true);
        update_post_meta($post_id, $option, $old_value + 1);
        $option1 = get_post_meta($post_id, '_poll_option_1_votes', true);
        $option2 = get_post_meta($post_id, '_poll_option_2_votes', true);
        $sum = $option1 + $option2;
        echo json_encode( array(
            'option1' => ceil(100 * $option1 / $sum) . '%',
            'option2' => ceil(100 * $option2 / $sum) . '%'
        ) );
     
        exit;
        
    }

}



                // Insert the post into the database
               /*$post_id = wp_insert_post($my_post);
               if($post_id) echo "success";
               else echo "failed";*/


new MEED_COURSE;


