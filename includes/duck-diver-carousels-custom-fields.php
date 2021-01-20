<?php
// Define path and URL to the ACF plugin.
define( 'DUCK_CAROUSEL_ACF_PATH', plugin_dir_path(__DIR__) . 'vendor/advanced-custom-fields/' );
define( 'DUCK_CAROUSEL_ACF_URL', plugin_dir_url(__DIR__) . 'vendor/advanced-custom-fields/' );

// Include the ACF plugin.
include_once( DUCK_CAROUSEL_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'duck_carousel_acf_settings_url');
function duck_carousel_acf_settings_url( $url ) {
    return DUCK_CAROUSEL_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'duck_carousel_acf_settings_show_admin');
function duck_carousel_acf_settings_show_admin( $show_admin ) {
    return false;
}

acf_add_local_field_group(array(
	'key' => 'group_5f6cb5bf60b35',
	'title' => 'Carousel Options',
	'fields' => array(
		array(
			'key' => 'field_5f6cb5ce23e18',
			'label' => 'Loop Carousel',
			'name' => 'dd_carousel_loop',
			'type' => 'true_false',
			'instructions' => 'Show carousel in continuous loop',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f6cb7eb23e19',
			'label' => 'Duration',
			'name' => 'dd_carousel_duration',
			'type' => 'number',
			'instructions' => 'Duration in seconds.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 5,
			'placeholder' => 5,
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f6cb85923e1a',
			'label' => 'Transition',
			'name' => 'dd_carousel_transition',
			'type' => 'number',
			'instructions' => 'Transition Speed in Milliseconds',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 400,
			'placeholder' => 400,
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
        array(
            'key' => 'field_600891ad213f3',
            'label' => 'Transition Type',
            'name' => 'transition_type',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'slide' => 'Slider',
                'fade' => 'Fade-In',
            ),
            'allow_null' => 0,
            'other_choice' => 0,
            'default_value' => 'slide',
            'layout' => 'vertical',
            'return_format' => 'value',
            'save_other_choice' => 0,
        ),
        array(
            'key' => 'field_5f6cb5ae24e12',
            'label' => 'Mouse Drag',
            'name' => 'mouse_drag',
            'type' => 'true_false',
            'instructions' => 'Enable Mouse Drag',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 1,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
		array(
			'key' => 'field_5f6cb8ba23e1b',
			'label' => 'Stop on Hover',
			'name' => 'dd_carousel_stop',
			'type' => 'true_false',
			'instructions' => 'Stop carousel on mouse hover?',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f6cb91da9428',
			'label' => 'Show Dots?',
			'name' => 'dd_carousel_dots',
			'type' => 'true_false',
			'instructions' => 'Show the dots (navigation)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f6cb97da9429',
			'label' => 'Margin',
			'name' => 'dd_carousel_margin',
			'type' => 'number',
			'instructions' => 'Margin-right for each carousel (if multiple items are shown)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => 0,
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f6cce0a6a86f',
			'label' => 'Show Navs (arrows)',
			'name' => 'dd_carousel_navs',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'dd_carousel_anything',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f6b7c226cd53',
	'title' => 'Custom Carousels',
	'fields' => array(
		array(
			'key' => 'field_5f6b7c2c00f10',
			'label' => 'Carousel Content',
			'name' => 'carousel_content',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add A Slide',
			'sub_fields' => array(
				array(
					'key' => 'field_5f6b7e0ba7b07',
					'label' => 'Slide Wrapper Extra CSS',
					'name' => 'slide_wrapper_extra_css',
					'type' => 'text',
					'instructions' => 'Include additional CSS Classes here.	No dots',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5f6b7c4b00f11',
					'label' => 'Slide Content',
					'name' => 'slide_content',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'dd_carousel_anything',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

class DD_SLIDE_ANYTHING_Meta {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

  add_meta_box(
    'owl-items-displayed',
    __('Items Displayed', 'owl-carousel-2'),
    array($this, 'owl_carousel_items_content'),
    'dd_carousel_anything',
    'side',
    'default');
	}

  public function owl_carousel_items_content($post){
        $items_width1 = intval(get_post_meta($post->ID, 'dd_carousel_anything_width1', true));
        $items_width2 = intval(get_post_meta($post->ID, 'dd_carousel_anything_width2', true));
        $items_width3 = intval(get_post_meta($post->ID, 'dd_carousel_anything_width3', true));
        $items_width4 = intval(get_post_meta($post->ID, 'dd_carousel_anything_width4', true));
        $items_width5 = intval(get_post_meta($post->ID, 'dd_carousel_anything_width5', true));
        $items_width6 = intval(get_post_meta($post->ID, 'dd_carousel_anything_width6', true));
        if ($items_width1 == 0) { $items_width1 = 1; }
        if ($items_width2 == 0) { $items_width2 = 1; }
        if ($items_width3 == 0) { $items_width3 = 1; }
        if ($items_width4 == 0) { $items_width4 = 1; }
        if ($items_width5 == 0) { $items_width5 = 1; }
        if ($items_width6 == 0) { $items_width6 = 1; }

        echo "<div id='items_displayed_metabox'>\n";
        echo '<p class="description">'.__('This setting determines the number of slides shown for specific css breakpoints.  Each must be set.', 'owl-carousel-2').'</p>';
        echo "<h4>Browser/Device Width:</h4>\n";
        // items for browser width category 1
        echo "<div class=\"items-displayed-div\"><em class='dd_owl_tooltip' href='#' title='Up to 479 pixels'></em><span>Mobile Portrait</span><select name='dd_carousel_anything_width1'>";
        for ($i = 1; $i <= 12; $i++) {
            if ($i == $items_width1) {
                echo "<option value='".esc_attr($i)."' selected>".esc_html($i)."</option>";
            } else {
                echo "<option value='".esc_attr($i)."'>".esc_html($i)."</option>";
            }
        }
        echo "</select></div>\n";
        // items for browser width category 2
        echo "<div class=\"items-displayed-div\"><em class='dd_owl_tooltip' href='#' title='480 to 767 pixels'></em><span>Mobile Landscape</span><select name='dd_carousel_anything_width2'>";
        for ($i = 1; $i <= 12; $i++) {
            if ($i == $items_width2) {
                echo "<option value='".esc_attr($i)."' selected>".esc_html($i)."</option>";
            } else {
                echo "<option value='".esc_attr($i)."'>".esc_html($i)."</option>";
            }
        }
        echo "</select></div>\n";
        // items for browser width category 3
        echo "<div class=\"items-displayed-div\"><em class='dd_owl_tooltip' href='#' title='768 to 979 pixels'></em><span>Tablet Portrait</span><select name='dd_carousel_anything_width3'>";
        for ($i = 1; $i <= 12; $i++) {
            if ($i == $items_width3) {
                echo "<option value='".esc_attr($i)."' selected>".esc_html($i)."</option>";
            } else {
                echo "<option value='".esc_attr($i)."'>".esc_html($i)."</option>";
            }
        }
        echo "</select></div>\n";
        // items for browser width category 4
        echo "<div class=\"items-displayed-div\"><em class='dd_owl_tooltip' href='#' title='980 to 1199 pixels'></em><span>Desktop Small</span><select name='dd_carousel_anything_width4'>";
        for ($i = 1; $i <= 12; $i++) {
            if ($i == $items_width4) {
                echo "<option value='".esc_attr($i)."' selected>".esc_html($i)."</option>";
            } else {
                echo "<option value='".esc_attr($i)."'>".esc_html($i)."</option>";
            }
        }
        echo "</select></div>\n";
        // items for browser width category 5
        echo "<div class=\"items-displayed-div\"><em class='dd_owl_tooltip' href='#' title='1200 to 1499 pixels'></em><span>Desktop Large</span><select name='dd_carousel_anything_width5'>";
        for ($i = 1; $i <= 12; $i++) {
            if ($i == $items_width5) {
                echo "<option value='".esc_attr($i)."' selected>".esc_html($i)."</option>";
            } else {
                echo "<option value='".esc_attr($i)."'>".esc_html($i)."</option>";
            }
        }
        echo "</select></div>\n";
        // items for browser width category 6
        echo "<div class=\"items-displayed-div\"><em class='dd_owl_tooltip' href='#' title='Over 1500 pixels'></em><span>Desktop X-Large</span><select name='dd_carousel_anything_width6'>";
        for ($i = 1; $i <= 12; $i++) {
            if ($i == $items_width6) {
                echo "<option value='".esc_attr($i)."' selected>".esc_html($i)."</option>";
            } else {
                echo "<option value='".esc_attr($i)."'>".esc_html($i)."</option>";
            }
        }
        echo "</select></div>\n";


        echo "</div>\n";
    }

    public function owl_carousel_shortcode_link($post){
        $post_status = get_post_status($post->ID);
        $allow_shortcodes = (metadata_exists('post', $post->ID, 'dd_owl_shortcodes')) ? get_post_meta($post->ID, 'dd_owl_shortcodes', true) : '1';
        $shortcode = '[dd-owl-carousel id="'.$post->ID.'"]';
        echo "<div id='dd_owl_shortcode'>".esc_html($shortcode)."</div>\n";
        echo "<div id='dd_shortcode_copy' class='button button-primary'>Copy to Clipboard</div>\n";
    }

	public function save_metabox( $post_id, $post ) {

    $dd_owl_new_items_width1 = isset( $_POST['dd_carousel_anything_width1']) ? abs(intval($_POST['dd_carousel_anything_width1'])) : '';
    $dd_owl_new_items_width2 = isset( $_POST['dd_carousel_anything_width2']) ? abs(intval($_POST['dd_carousel_anything_width2'])) : '';
    $dd_owl_new_items_width3 = isset( $_POST['dd_carousel_anything_width3']) ? abs(intval($_POST['dd_carousel_anything_width3'])) : '';
    $dd_owl_new_items_width4 = isset( $_POST['dd_carousel_anything_width4']) ? abs(intval($_POST['dd_carousel_anything_width4'])) : '';
    $dd_owl_new_items_width5 = isset( $_POST['dd_carousel_anything_width5']) ? abs(intval($_POST['dd_carousel_anything_width5'])) : '';
    $dd_owl_new_items_width6 = isset( $_POST['dd_carousel_anything_width6']) ? abs(intval($_POST['dd_carousel_anything_width6'])) : '';

    // Update Side Meta Fields
		update_post_meta( $post_id, 'dd_carousel_anything_width1', $dd_owl_new_items_width1 );
		update_post_meta( $post_id, 'dd_carousel_anything_width2', $dd_owl_new_items_width2 );
		update_post_meta( $post_id, 'dd_carousel_anything_width3', $dd_owl_new_items_width3 );
		update_post_meta( $post_id, 'dd_carousel_anything_width4', $dd_owl_new_items_width4 );
		update_post_meta( $post_id, 'dd_carousel_anything_width5', $dd_owl_new_items_width5 );
		update_post_meta( $post_id, 'dd_carousel_anything_width6', $dd_owl_new_items_width6 );

	}

}

new DD_SLIDE_ANYTHING_Meta;