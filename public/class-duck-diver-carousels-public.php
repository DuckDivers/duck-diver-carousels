<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.howardehrenberg.com
 * @since      1.0.0
 *
 * @package    Duck_Diver_Carousels
 * @subpackage Duck_Diver_Carousels/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Duck_Diver_Carousels
 * @subpackage Duck_Diver_Carousels/public
 * @author     Howard Ehrenberg <howard@howardehrenberg.com>
 */
class Duck_Diver_Carousels_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/duck-diver-carousels-public.css', array(), $this->version, 'all' );
        wp_register_style( 'owl-carousel-css', plugin_dir_url(__FILE__) . 'css/owl.carousel.min.css');
        wp_register_style( 'owl-theme-css', plugin_dir_url(__FILE__) . 'css/owl.theme.default.min.css');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/duck-diver-carousels-public.js', array( 'jquery' ), $this->version, false );
        wp_register_script ('owl-two', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array('jquery'), '2.3.4', true);

	}


    public function owl_carousel_shortcode($atts){
        
        wp_enqueue_script('owl-two');
        wp_enqueue_style('owl-carousel-css');
        wp_enqueue_style('owl-theme-css');
        
        $atts = shortcode_atts(
        array(
            'id'    => '',
        ), $atts, 'dd-carousel-anything' );

        $post = get_post($atts['id']);

        $postid = $post->ID;
        
        if (have_rows('carousel_content', $postid)):
            
            $output = '<div class="owl-wrapper"><div id="carousel-'.$atts['id'].'" class="owl-carousel owl-theme">';
            
            while(have_rows('carousel_content', $postid)): the_row();
                $class = (get_sub_field('slide_wrapper_extra_css')) ? ' '.get_sub_field('slide_wrapper_extra_css') : '';
                $output .= '<div class="item"><div class="item-inner'.$class.'">';
                $output .= apply_filters('the_content', get_sub_field('slide_content'));
                $output .= '</div></div>';
            endwhile;
        
            $output .= '</div></div>'; // End of Owl Carousel
        
        endif;

        // Get Owl Meta for Carousel Init
		$duration = intval(get_field( 'dd_carousel_duration', $postid ) . '000');
		$transition = get_field( 'dd_carousel_transition', $postid );
		$margin = intval(get_field( 'dd_carousel_margin', $postid ));
		// Booleans
        $loop = (get_field( 'dd_carousel_loop', $postid )) ? 'true' : 'false';
		$stop = (get_field( 'dd_carousel_stop', $postid )) ? 'true' : 'false';
		$navs = (get_field( 'dd_carousel_navs', $postid )) ? 'true' : 'false';
		$dots = (get_field( 'dd_carousel_dots', $postid )) ? 'true' : 'false';

        $items_width1 = intval(get_field('dd_owl_items_width1', $postid));
        $items_width2 = intval(get_field('dd_owl_items_width2', $postid));
        $items_width3 = intval(get_field('dd_owl_items_width3', $postid));
        $items_width4 = intval(get_field('dd_owl_items_width4', $postid));
        $items_width5 = intval(get_field('dd_owl_items_width5', $postid));
        $items_width6 = intval(get_field('dd_owl_items_width6', $postid));
 
        
        // Include Owl Carousel
        $output .= "
       <script type='text/javascript' async>
           jQuery(document).ready(function($){
            $('#carousel-{$atts['id']}').owlCarousel({
                loop:{$loop},
                autoplay : true,
                autoplayTimeout : {$duration},
                smartSpeed : {$transition},
                fluidSpeed : {$transition},
                autoplaySpeed : {$transition},
                navSpeed : {$transition},
                dotsSpeed : {$transition},
                margin: {$margin},
                autoplayHoverPause : {$stop},
                nav : {$navs},
                navText : ['',''],
                dots : {$dots},
                responsiveRefreshRate : 200,
                slideBy : 1,
                mergeFit : true,
                mouseDrag : true,
                touchDrag : true,
                responsive:{
                    0:{items:{$items_width1}},
                    480:{items:{$items_width2}},
                    768:{items:{$items_width3}},
                    991:{items:{$items_width4}},
                    1200:{items:{$items_width5}},
                    1500:{items:{$items_width6}},
                    }
                });

            });
        </script>";
        
        return $output;
    }

}
