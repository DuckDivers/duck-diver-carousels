<?php
class DD_Carousel_Anything_Meta {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );

	}

	public function add_metabox() {

    	add_meta_box('owl-shortcode-link',
            __('Shortcode', 'owl-carousel-2'),
            array($this, 'owl_carousel_shortcode_link'),
            'dd_carousel_anything',
            'side',
            'high');


	}

    public function owl_carousel_shortcode_link($post){
        $post_status = get_post_status($post->ID);
        $shortcode = '[dd-carousel-anything id="'.$post->ID.'"]';
        echo "<pre>".esc_html($shortcode)."</pre>\n";
    }

}
