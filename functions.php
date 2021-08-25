<?php 

function theme_main_asstes(){

wp_enqueue_style( 'mainsitestyle', get_template_directory_uri().'/css/site-style.css' );
wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/font-awesome-4.7.0/css/font-awesome.min.css' );
//wp_enqueue_style( 'owlcarousel', get_template_directory_uri().'/owl-carousel/assets/owl.carousel.min.css' );
wp_enqueue_style( 'mmenu', get_template_directory_uri().'/m-menu/mmenu-light.css' );
wp_enqueue_style( 'lightboxcss', get_template_directory_uri().'/lightbox2/css/lightbox.min.css' );
wp_enqueue_style( 'owlcarouselcss', get_template_directory_uri().'/OwlCarousel2-2.3.4/assets/owl.carousel.min.css' );
wp_enqueue_style( 'main-styleheet', get_stylesheet_uri() );





wp_enqueue_script( 'jquery3.5.1', get_template_directory_uri() . '/js/jquery.min3.5.1.js', array(), '3.5.1', true );

wp_enqueue_script( 'bootstrap-bundle-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '4.5', true );

wp_enqueue_script( 'mmenupoly', get_template_directory_uri() . '/m-menu/mmenu-light.polyfills.js', array(), '', true );

wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/m-menu/mmenu-light.js', array(), '', true );
//wp_enqueue_script( 'rellax', get_template_directory_uri() . '/js/rellax.min.js', array(), '', true );
//wp_enqueue_script( 'parallax', get_template_directory_uri() . '/parallax-js/parallax.min.js', array(), '', true );
wp_enqueue_script( 'simple-parallax', get_template_directory_uri() . '/js/simpleParallax.min.js', array(), '', true );
wp_enqueue_script( 'lightboxjs', get_template_directory_uri() . '/lightbox2/js/lightbox.min.js', array(), '', true );
wp_enqueue_script( 'onscreen_video', get_template_directory_uri() . '/js/onscreen_video.js', array(), false, true );
wp_enqueue_script( 'owlcarouseljs', get_template_directory_uri() . '/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), false, true );
wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), false, true );

}


add_action( 'wp_enqueue_scripts', 'theme_main_asstes' );


if ( ! function_exists( 'theme_setup' ) ) :

	function theme_setup() {	
		// Add default posts and comments RSS feed links to head.

		add_theme_support( 'automatic-feed-links' );

		/*



		 * Let WordPress manage the document title.

		 * By adding theme support, we declare that this theme does not use a

		 * hard-coded <title> tag in the document head, and expect WordPress to

		 * provide it for us.

		 */



		add_theme_support( 'title-tag' );

		/*



		 * Enable support for Post Thumbnails on posts and pages.



		 *



		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/



		 */



		add_theme_support( 'post-thumbnails' );

				// This theme uses wp_nav_menu() in two locations.



		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'wdacs' ),

                'mob-menu' => __( 'Mobile Menu', 'wdacs' ),
			)
		);


		/*
		 * Switch default core markup for search form, comment form, and comments

		 * to output valid HTML5.

		 */
		add_theme_support(

			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);


		add_theme_support(
			'custom-logo',
			array(

				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.

		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

        add_theme_support( 'widgets' );

		add_theme_support( 'responsive-embeds' );

		// Enqueue editor styles.

		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.


	}


endif;

add_action( 'after_setup_theme', 'theme_setup' );


/* register sidebar */



function wpdocs_theme_slug_widgets_init() {

    register_sidebar( array(

        'name'          => __( 'Footer1', 'wdacs' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets in this area will be shown on footer.', 'wdacs' ),
        'before_widget' => '<div class="menuFooter">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(

        'name'          => __( 'Footer2', 'wdacs' ),

        'id'            => 'footer-2',

        'description'   => __( 'Widgets in this area will be shown on footer.', 'wdacs' ),
        'before_widget' => '<div class="menuFooter">',
        'after_widget'  => '</div>',

        'before_title'  => '<h4 class="widget-title mb-4">',
        'after_title'   => '</h4>',
    ) );


    register_sidebar( array(

        'name'          => __( 'Footer3a', 'wdacs' ),

        'id'            => 'footer-3a',
        'description'   => __( 'Widgets in this area will be shown on footer.', 'wdacs' ),
        'before_widget' => '<div class="menuFooter">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title mb-4">',
        'after_title'   => '</h4>',

    ) );

    register_sidebar( array(



        'name'          => __( 'Footer3b', 'wdacs' ),



        'id'            => 'footer-3b',



        'description'   => __( 'Widgets in this area will be shown on footer.', 'wdacs' ),



        'before_widget' => '<div class="menuFooter">',



        'after_widget'  => '</div>',



        'before_title'  => '<h4 class="widget-title">',



        'after_title'   => '</h4>',



    ) );







    register_sidebar( array(



        'name'          => __( 'Copyright', 'wdacs' ),



        'id'            => 'copyright',



        'description'   => __( 'Widgets in this area will be shown on footer.', 'wdacs' ),



        'before_widget' => '<div class="menuFooter">',



        'after_widget'  => '</div>',



        'before_title'  => '<h4 class="widget-title">',



        'after_title'   => '</h4>',



    ) );







    register_sidebar( array(



        'name'          => __( 'Front Page Event', 'wdacs' ),



        'id'            => 'page-event',



        'description'   => __( 'Widgets in this area will be shown on pages.', 'wdacs' ),



        'before_widget' => '<div class="eventWidget">',



        'after_widget'  => '</div>',



        'before_title'  => '<h4 class="widget-title">',



        'after_title'   => '</h4>',



    ) );







    register_sidebar( array(



        'name'          => __( 'Breadcrumb', 'wdacs' ),



        'id'            => 'breadcrumb',



        'description'   => __( 'Widgets in this area will be shown on pages Hero.', 'wdacs' ),



        'before_widget' => '<div class="eventWidget">',



        'after_widget'  => '</div>',



        'before_title'  => '<h4 class="widget-title">',



        'after_title'   => '</h4>',



    ) );







}



add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );







class Menu_With_Description extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 

{

    parent::start_el( $output, $item, $depth, $args );



    $output .= sprintf( 

        '<small class="itemDesc">%s</small>', 

        esc_html( $item->description ) 

    );

}



}







function create_post_type_center_services() {

    

    // You'll want to replace the values below with your own.

    register_post_type( 'community', // change the name

        array(

            'labels' => array(

                'name' => __( 'Community Center & Services' ), // change the name

                'singular_name' => __( 'Community Center & Services' ), // change the name

            ),

            'public' => true,

            'supports' => array ( 'title','excerpt'), // do you need all of these options?

            //'taxonomies' => array( 'category', 'post_tag' ), // do you need categories and tags?

            'hierarchical' => false,

            'menu_icon' => 'dashicons-welcome-learn-more',

            'rewrite' => array ( 'slug' => __( 'community-center-and-services' ) ) // change the name

        )

    );



}

add_action( 'init', 'create_post_type_center_services' );











function create_community_service_center_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)

    $labels = array(

        'name' => _x('Center Categories', 'taxonomy general name', 'textdomain'),

        'singular_name' => _x('Center Category', 'taxonomy singular name', 'textdomain'),

        'search_items' => __('Search Center Categories', 'textdomain'),

        'all_items' => __('All Center Categories', 'textdomain'),

        'parent_item' => __('Parent Center Category', 'textdomain'),

        'parent_item_colon' => __('Parent Center Category:', 'textdomain'),

        'edit_item' => __('Edit Center Category', 'textdomain'),

        'update_item' => __('Update Center Category', 'textdomain'),

        'add_new_item' => __('Add New Center Category', 'textdomain'),

        'new_item_name' => __('New Center Category Name', 'textdomain'),

        'menu_name' => __('Center Category', 'textdomain'),

    );



    $args = array(

        'hierarchical' => true,

        'labels' => $labels,

        'show_ui' => true,

        'show_admin_column' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'center_categories'),

    );



    register_taxonomy('center_categories', array('community'), $args);







    $labels = array(

        'name' => _x('Services Categories', 'taxonomy general name', 'textdomain'),

        'singular_name' => _x('Services Category', 'taxonomy singular name', 'textdomain'),

        'search_items' => __('Search Services Categories', 'textdomain'),

        'all_items' => __('All Services Categories', 'textdomain'),

        'parent_item' => __('Parent Services Category', 'textdomain'),

        'parent_item_colon' => __('Parent Services Category:', 'textdomain'),

        'edit_item' => __('Edit Services Category', 'textdomain'),

        'update_item' => __('Update Services Category', 'textdomain'),

        'add_new_item' => __('Add New Services Category', 'textdomain'),

        'new_item_name' => __('New Services Category Name', 'textdomain'),

        'menu_name' => __('Services Category', 'textdomain'),

    );



    $args = array(

        'hierarchical' => true,

        'labels' => $labels,

        'show_ui' => true,

        'show_admin_column' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'services_categories'),

    );

    register_taxonomy('services_categories', array('community'), $args);

}

add_action('init', 'create_community_service_center_taxonomies', 0);




/* video post */

function videos_post() {

    // You'll want to replace the values below with your own.

    register_post_type( 'videos', // change the name

        array(

            'labels' => array(

                'name' => __( 'Videos' ), // change the name

                'singular_name' => __( 'Videos' ), // change the name

            ),

            'public' => true,

            'supports' => array ( 'title','excerpt','category'), // do you need all of these options?

            //'taxonomies' => array( 'post_tag' ), // do you need categories and tags?

            'hierarchical' => false,

            'menu_icon' => 'dashicons-format-video',

            'rewrite' => array ( 'slug' => __( 'videos' ) ) // change the name

        )

    );



}

add_action( 'init', 'videos_post' );



function create_video_category() {

    // Add new taxonomy, make it hierarchical (like categories)

    $labels = array(

        'name' => _x('Video Categories', 'taxonomy general name', 'textdomain'),

        'singular_name' => _x('Video Category', 'taxonomy singular name', 'textdomain'),

        'search_items' => __('Search Video Categories', 'textdomain'),

        'all_items' => __('All Video Video', 'textdomain'),

        'parent_item' => __('Parent Video Category', 'textdomain'),

        'parent_item_colon' => __('Parent Video Category:', 'textdomain'),

        'edit_item' => __('Edit Video Category', 'textdomain'),

        'update_item' => __('Update Video Category', 'textdomain'),

        'add_new_item' => __('Add New Video Category', 'textdomain'),

        'new_item_name' => __('New Video Category Name', 'textdomain'),

        'menu_name' => __('Video Category', 'textdomain'),

    );



    $args = array(

        'hierarchical' => true,

        'labels' => $labels,

        'show_ui' => true,

        'show_admin_column' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'videos-category'),

    );



    register_taxonomy('video_category', array('videos'), $args);





//creating custom tags

    $labels = array(

        'name' => _x('Video Tags', 'taxonomy general name', 'textdomain'),

        'singular_name' => _x('Video Tags', 'taxonomy singular name', 'textdomain'),

        'search_items' => __('Search Video Tags', 'textdomain'),

        'all_items' => __('All Video Video', 'textdomain'),

        'parent_item' => __('Parent Video Tags', 'textdomain'),

        'parent_item_colon' => __('Parent Video Tags:', 'textdomain'),

        'edit_item' => __('Edit Video Tags', 'textdomain'),

        'update_item' => __('Update Video Tags', 'textdomain'),

        'add_new_item' => __('Add New Video Tags', 'textdomain'),

        'new_item_name' => __('New Video Tags Name', 'textdomain'),

        'menu_name' => __('Video Tags', 'textdomain'),

    );



    $args = array(

        'hierarchical' => false,

        'labels' => $labels,

        'show_ui' => true,

        'show_admin_column' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'video-tags'),

    );

    register_taxonomy('video_tags', array('videos'), $args);

}

add_action('init', 'create_video_category', 0);

/* end of video post */





/* map post */

function maps_post() {   

    register_post_type( 'maps', // change the name
        array(

            'labels' => array(

                'name' => __( 'Maps' ), // change the name

                'singular_name' => __( 'Maps' ), // change the name

            ),

            'public' => true,

            'supports' => array ( 'title'), // do you need all of these options?

            //'taxonomies' => array( 'post_tag' ), // do you need categories and tags?

            'hierarchical' => false,

            'menu_icon' => 'dashicons-location-alt',

            'rewrite' => array ( 'slug' => __( 'maps' ) ) // change the name

        )

    );



}

add_action( 'init', 'maps_post' );


/* end of map post */




function stories_post() {

    register_post_type( 'stories', // change the name

        array(

            'labels' => array(

                'name' => __( 'Stories' ), // change the name

                'singular_name' => __( 'Stories' ), // change the name

            ),

            'public' => true,

            'has_archive' => true,

            'supports' => array ( 'title','editor'), // do you need all of these options?

            //'taxonomies' => array( 'category', 'post_tag' ), // do you need categories and tags?

            'hierarchical' => false,

            'menu_icon' => 'dashicons-tag',

            'rewrite' => array ( 'slug' => __( 'stories' ), 'with_front' => false ) // change the name

        )

    );



}

add_action( 'init', 'stories_post' );








function creat_stories_tags() {

    // Add new taxonomy, make it hierarchical (like categories)

/*
    $labels = array(

        'name' => _x('Video Categories', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Video Category', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Video Categories', 'textdomain'),
        'all_items' => __('All Video Video', 'textdomain'),
        'parent_item' => __('Parent Video Category', 'textdomain'),
        'parent_item_colon' => __('Parent Video Category:', 'textdomain'),
        'edit_item' => __('Edit Video Category', 'textdomain'),
        'update_item' => __('Update Video Category', 'textdomain'),
        'add_new_item' => __('Add New Video Category', 'textdomain'),
        'new_item_name' => __('New Video Category Name', 'textdomain'),
        'menu_name' => __('Video Category', 'textdomain'),
    );


    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'videos-category'),
    );
    register_taxonomy('video_category', array('videos'), $args);

*/


//creating custom tags

    $labels = array(
        'name' => _x('Stories Tags', 'taxonomy general name', 'wdacs'),
        'singular_name' => _x('Stories Tags', 'taxonomy singular name', 'wdacs'),
        'search_items' => __('Search Stories Tags', 'wdacs'),
        'all_items' => __('All Stories Stories', 'wdacs'),
        'parent_item' => __('Parent Stories Tags', 'wdacs'),
        'parent_item_colon' => __('Parent Stories Tags:', 'wdacs'),
        'edit_item' => __('Edit Stories Tags', 'wdacs'),
        'update_item' => __('Update Stories Tags', 'wdacs'),
        'add_new_item' => __('Add New Stories Tags', 'wdacs'),
        'new_item_name' => __('New Stories Tags Name', 'wdacs'),
        'menu_name' => __('Stories Tags', 'wdacs'),
    );



    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'stories-tags', 'with_front' => false),
    );

    register_taxonomy('stories-tags', array('stories'), $args);

}

add_action('init', 'creat_stories_tags', 0);































// load more local event on button click



function more_news_ajax() {

    $centerId = $_POST["centerId"];

    $serviceId = $_POST["serviceId"];

    $args = array(

        'post_type' => 'community',

        'post_status' => 'publish',

        'tax_query' => array(

        array(

            'taxonomy' => 'center_categories',

            'field' => 'id',

            'terms' => $centerId,

        ),

        array(

            'taxonomy' => 'services_categories',

            'field' => 'id',

            'terms' => $serviceId,

        ),

    ),



    );



    $ar_posts = '';



    global $post;



    $loop = new WP_Query($args);



    $totalpost = $loop->found_posts;



    if ($loop->have_posts()) {



        while ($loop->have_posts()) {



            $loop->the_post();



$ar_posts .=      '<div class="rRow d-flex">';

$ar_posts .= '<div class="programName">'.get_the_title().'</div>';

$ar_posts .= '<div class="description">'.get_the_excerpt().'</div>';

$ar_posts .= '</div>';                            



        }



    }

    else{

        $ar_posts .= '<div>No Data Found</div>';

    }



    $response['load_more'] = ($totalpost > $ppp * $page ? TRUE : FALSE);



    $response['posts'] = $ar_posts != '' ? '<div class="" >' . $ar_posts . '</div>' : '';



    echo json_encode($response);



    exit;



}



add_action('wp_ajax_nopriv_more_news_ajax', 'more_news_ajax');



add_action('wp_ajax_more_news_ajax', 'more_news_ajax');











function my_excerpt_length($length){

return 300;

}

add_filter('excerpt_length', 'my_excerpt_length');







function more_video_ajax() {

    $category = $_POST["category"];

    $offset = $_POST["offset"];

    $ppp = $_POST["ppp"];

    $page = $_POST["page"] + 1;



    //print_r($args);

    $ar_posts = '';



    $args = array(

        'post_type' => 'videos',

        'post_status' => 'publish',

        'showposts' => $ppp,

        'paged' => $page,

    );

    if ($category > 0) {

        $args['tax_query'] = array(

            array(

                'taxonomy' => 'video_category',

                'field' => 'term_id',

                'terms' => $category,

            ),

        );

    }



    $loop = new WP_Query($args);

    global $post;

    $totalpost = $loop->found_posts;

    if ($loop->have_posts()) {

        while ($loop->have_posts()) {

            $loop->the_post();

            $ar_posts .= '<div class="col-md-4 col-sm-6 mb-4">';

            $ar_posts .= ' <div class="article">';

            $ar_posts .= '<div class="videoWrapper" >';

            $iframe = get_field('video_link');

            preg_match('/src="(.+?)"/', $iframe, $matches);

            $src = $matches[1];

            $params = array(

                'controls' => 0,

                'hd' => 1,

                'autohide' => 1,

            );

            $new_src = add_query_arg($params, $src);

            $iframe = str_replace($src, $new_src, $iframe);

            $attributes = 'frameborder="0"  id="iframe' . get_the_ID() . '" ';

            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

            $ar_posts .= $iframe;

            $ar_posts .= '<img src="' . get_template_directory_uri() . '/images/play-btn.png" class="playbtnv img-fluid" data-videoid="' . get_the_ID() . '" data-videotitle="' . get_the_title() . '" >';

            $ar_posts .= '</div>';

            $ar_posts .= '<div class="my-3">';

            $post_tags = wp_get_post_terms(get_the_ID(), "video_tags", array("fields" => "all"));



            /*$cats = wp_get_object_terms(get_the_ID(), 'video_category');

                foreach ($cats as $key => $cat) {

                    $ar_posts .= $cat->name . '/';

            */

            if ($post_tags):

                $ar_posts .= '<ul class="tags list-unstyled mb-2 d-flex">';

                $i = 0;

                $tagLength = count($post_tags);

                foreach ($post_tags as $tag):

                    $i++;

                    $ar_posts .= '<li>';

                    $ar_posts .= '<a class="d-flex align-items-center" href="' . home_url() . '/tag/' . $tag->slug . '"><i class="fa fa-tag mr-2" aria-hidden="true"></i> ' . $tag->name . '</a>';

                    $ar_posts .= '</li>';

                endforeach;

                $ar_posts .= '</ul>';

            endif;

            $ar_posts .= '<h3 class="articleTitle" data-videoid="' . get_the_ID() . '" data-videotitle="' . get_the_title() . '" >' . mb_strimwidth(get_the_title(), 0, 55, '...') . '</h3>';

            $ar_posts .= '</div>';

            $ar_posts .= '</div>';

            $ar_posts .= '</div>';

        }

    }

    $response['load_more'] = ($totalpost > $ppp * $page ? TRUE : FALSE);

    $response['posts'] = $ar_posts != '' ? $ar_posts : '';

    echo json_encode($response);

    exit;

}

add_action('wp_ajax_nopriv_more_video_ajax', 'more_video_ajax');

add_action('wp_ajax_more_video_ajax', 'more_video_ajax');



if( function_exists('acf_add_options_page') ) {

    

    acf_add_options_page(array(

        'page_title'    => 'Theme General Settings',

        'menu_title'    => 'Theme Settings',

        'menu_slug'     => 'theme-general-settings',

        'capability'    => 'edit_posts',

        'redirect'      => false

    ));

    

}



add_image_size( 'gallery-thumb', 554, 364, false );



function get_tag_stories_ajax() {
    
    $category = $_POST["story_tag"];

    $offset = $_POST["offset"];

    $ppp = $_POST["ppp"];

    // $page = $_POST["page"] + 1;
    $page = $_POST["page"];



    //print_r($args);

    $ar_posts = '';



    $args = array(

        'post_type' => 'stories',

        'post_status' => 'publish',

        // 'showposts' => $ppp,
        'posts_per_page'=>$ppp,
        'paged' => $page,

    );

    if ($category !='') {

        $args['tax_query'] = array(

            array(

                'taxonomy' => 'stories-tags',

                'field' => 'slug',

                'terms' => $category,

            ),

        );

    }



    $loop = new WP_Query($args);
    // $response['t_q']=$args['tax_query'];

    global $post;

    $totalpost = $loop->found_posts;

    if ($loop->have_posts()) {

        while ($loop->have_posts()) {

                    $loop->the_post();

                    $ar_posts .= '<div class="col-md-6 col-lg-4 px-lg-2 mb-5">';

                    $ar_posts .= ' <div class="box borderBottomRed storyBox">';




                    $group = get_field('featured_image_or_video');

                    if( $group )
                    {

                        $img_or_vid = $group['image__video'];
                        
                        if( $img_or_vid == 'Image' )
                        {
                            $image=wp_get_attachment_image( $group['image'], array("535","349",true), "", array( "class" => "img-fluid" ) );
                            if(!$image)
                            {
                                $image='<img src="'.home_url().'/wp-content/uploads/2021/01/stories-thumb.jpg" alt="'.get_the_title().'" class="img-fluid">';
                            }
                            $ar_posts .= '<div class="storyFeaturedImage"><a href="'.get_the_permalink().'" >'.$image.'</a></div>';
                        }
                        else
                        {

                            $ar_posts .= '<div class="iframeClick">'. wp_get_attachment_image( $group['video_thumbnail'], 'full', "", array( "class" => "img-fluid" ) ).'<button class="btn playbtn" onclick="play_tag_video(this)"
                                data-src="';

                                    $vidLink = $group['video'];
                                    preg_match('/src="(.+?)"/', $vidLink, $matches);
                                    $src = $matches[1];
                                    $params = array(
                                    
                                        'controls'  => 1,                        
                                        'hd'        => 1,                        
                                        'autohide'  => 1,                        
                                        'loop'      => 1,
                                        'autoplay'  => 1
                                    
                                    );
                                    
                                    $onlySrc = add_query_arg($params, $src);                        
                                    $ar_posts .= $onlySrc;  
                                    $ar_posts .= '" ><img src="';
                                    $ar_posts .= site_url().'/wp-content/uploads/2020/12/play-btn.png" loading="lazy" class="img-fluid" alt=""><span class="sr-only">Click to play video</span>
                                </button>
                            </div>

                            <div class="iframeWrpr d-none">
                                <p class="alert-gray text-center">Loading...</p>
                                <iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            </div>';
                        }
                    }
                    else
                    {

                        $ar_posts .= '<a href="'.get_the_permalink().'" ><img src="'.home_url().'/wp-content/uploads/2021/01/stories-thumb.jpg" alt="'.get_the_title().'" class="img-fluid"></a>
    ';
                    }



                    $ar_posts .= '<div class="storyDescWrapper"><h3 class="title"><a href="'.get_the_permalink().'" >'.wp_trim_words( get_the_title(),7,'...').'</a></h3>';
                    $ar_posts .= '<div class="excerpts">'.mb_strimwidth( get_the_excerpt(),0,200,'...' ).'</div>';

                    $ar_posts .= '</div>
                    <p class="readMoreBtnStory"><a class="readmoreLinkNorm" href="'.get_the_permalink().'" >Read Full Story</a></p>
                </div>
                
            </div>';



            $ar_posts .= '</div>';

            $ar_posts .= '</div>';

        }

    }

    $response['load_more'] = ($totalpost > $ppp * $page ? TRUE : FALSE);

    $response['posts'] = $ar_posts != '' ? $ar_posts : '';

    
    echo json_encode($response);

    exit;

}

add_action('wp_ajax_nopriv_get_tag_stories_ajax', 'get_tag_stories_ajax');

add_action('wp_ajax_get_tag_stories_ajax', 'get_tag_stories_ajax');