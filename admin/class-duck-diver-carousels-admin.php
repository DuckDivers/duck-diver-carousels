<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.howardehrenberg.com
 * @since      1.0.0
 *
 * @package    Duck_Diver_Carousels
 * @subpackage Duck_Diver_Carousels/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Duck_Diver_Carousels
 * @subpackage Duck_Diver_Carousels/admin
 * @author     Howard Ehrenberg <howard@howardehrenberg.com>
 */
class Duck_Diver_Carousels_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->includes();
		new DD_Carousel_Anything_Meta;	
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/duck-diver-carousels-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/duck-diver-carousels-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	private function includes(){
		include ('class-carousel-meta.php');
	}
	
	public function add_cpt(){
		$size_chart_labels = array(
			'name' => _x('Carousel', 'post type general name'),
			'singular_name' => _x('Carousel', 'post type singular name'),
			'menu_name' => _x('Carousels', 'admin menu'),
			'name_admin_bar' => _x('Carousels', 'add new on admin bar'),
			'add_new' => _x('Add New', 'Carousel'),
			'add_new_item' => __('Add New Carousel'),
			'new_item' => __('New Carousels'),
			'edit_item' => __('Edit Carousels'),
			'view_item' => __('View Carousels'),
			'all_items' => __('All Carousels'),
			'search_items' => __('Search Carousels'),
			'not_found' => __('No Carousels item found.'),
			'not_found_in_trash' => __('No Carousels items found in Trash.')
		);
		register_post_type('dd_carousel_anything', array(
			'labels' => $size_chart_labels,
			'has_archive' => false,
			'public' => true,
			'exclude_From_search' => true,
			'publicly_queryable' => false,
			'menu_icon' => 'dashicons-images-alt2',
			'supports' => array(
				'title',
				)
			)
		);	

	}

	public function owl_carousel_modify_columns($columns) {
		// new columns to be added
		$new_columns = array(
			'shortcode' => 'Shortcode',
		);
		$columns = array_slice($columns, 0, 2, true) + $new_columns + array_slice($columns, 2, NULL, true);
		return $columns;
    }
    
	// DEFINE OUTPUT FOR EACH CUSTOM COLUMN DISPLAYED FOR THIS CUSTOM POST TYPE WITHIN THE DASHBOARD
    public function owl_carousel_custom_column_content($column) {
        // get post object for this row
        global $post;

        $dd_owl_css_id = get_post_meta( $post->ID, 'dd_owl_css_id', true );

        // output for the 'Shortcode' column
        if ($column == 'shortcode') {
            $shortcode = "<span class='shortcode owl-carousel-2'><input type='text' onfocus='this.select();' readonly='readonly' value='[dd-carousel-anything id=&quot;{$post->ID}&quot; title=&quot;{$post->post_title}&quot;]' class='large-text code'></span>";
            echo ($shortcode);
        }
    
	}

}