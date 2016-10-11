<?php
/*
 *  Author: Framework | @Framework
 *  URL: wordfly.com | @wordfly
 *  Custom functions, support, custom post types and more.
 */

// Theme setting
require_once('init/theme-init.php');
require_once('init/options/option.php');

//echo $_SERVER['HTTP_HOST']);

// Custom for theme
if(!is_admin()) {
  function wf_conditional_scripts() {
    wp_register_script('lib-matchHeight', get_template_directory_uri() . '/js/libs/jquery.matchHeight-min.js', array('jquery'), '0.7.0');
    wp_enqueue_script('lib-matchHeight');

    wp_register_script('lib-colorbox', get_template_directory_uri() . '/js/libs/jquery.colorbox.js', array('jquery'), '1.6.4');
    wp_enqueue_script('lib-colorbox');

    wp_register_script('lib-slickslider', get_template_directory_uri() . '/js/libs/slick.min.js', array('jquery'), '1.6.0');
    wp_enqueue_script('lib-slickslider');

    wp_register_script('lib-acf', get_template_directory_uri() . '/js/libs/acf.js', array('jquery'), '1.0.0');
    wp_enqueue_script('lib-acf');

    wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0');
    wp_enqueue_script('script');
  }
  add_action('wp_print_scripts', 'wf_conditional_scripts');

  function wf_styles() {
    wp_register_style('custom-style1', get_template_directory_uri() . '/stylesheet/css/customs.css', array(), '1.0', 'all');
    wp_enqueue_style('custom-style1');
  }
  add_action('wp_enqueue_scripts', 'wf_styles');
}

function wf_admin_scripts() {
  wp_register_script('lib-moment', get_template_directory_uri() . '/js/admin-libs/moment.js', array('jquery'), '2.13.0');
  wp_enqueue_script('lib-moment');

  wp_register_script('lib-datetimepicker', get_template_directory_uri() . '/js/admin-libs/bootstrap-datetimepicker.min.js', array('jquery'), '4.17.37');
  wp_enqueue_script('lib-datetimepicker');

  wp_register_script('admin-script', get_template_directory_uri() . '/js/admin-script.js', array('jquery'), '1.0.0');
  wp_enqueue_script('admin-script');
}
add_action('admin_init', 'wf_admin_scripts');

function wf_admin_styles() {
  wp_register_style('admin-style', get_template_directory_uri() . '/stylesheet/css/admin.css', array(), '1.0', 'all');
  wp_enqueue_style('admin-style');
}
add_action('admin_init', 'wf_admin_styles');



/* Add custom post type */
/*function wf_create_custom_post_types() {
  register_post_type( 'wf_product',
    array(
      'labels' => array(
        'name' => __( 'Product' ),
        'singular_name' => __( 'Product' )
      ),
      'supports' => array(
        'title'
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'wf_create_custom_post_types' );*/

/* Add custom Taxonomy */
/*function wf_create_custom_taxonomy() {
  $labels_product = array(
    'name' => 'Service',
    'singular' => 'Service',
    'menu_name' => 'Service'
  );
  $args_product = array(
    'labels'                     => $labels_product,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy('service_product', 'wf_product', $args_product);
}
add_action( 'init', 'wf_create_custom_taxonomy', 0 );*/


 add_shortcode( 'custom_shortcode', 'create_custom_shortcode' );
function create_custom_shortcode($attrs) {
  extract(shortcode_atts (array(
    'per_page' => -1
  ), $attrs));

  ob_start(); ?>

<ul class="cat_list">
<?php  $cats = get_categories('orderby=count&order=DESC');
// get all categories;
foreach ($cats as $cat) :

echo '<li class="cat_list_item">';
echo '<h2>'.$cat->name.'</h2>';

//echo '<h2>'.$cat->name.'</h2>';
//echo '<a href="' . get_category_link( $cat->term_id ) . '">' . $cat->name . '</a>';


$args = array(
'posts_per_page' => -1, // max number of post per category
'cat' => $cat->term_id
);
query_posts($args); // get all posts for category

if (have_posts()) :
echo '<ul class="post_list">'; //start the unordered list of posts

while (have_posts()) : the_post(); ?>

  <li>
  <div class="date-times"><?php the_time('Y/n/j') ?></div>
  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
  </li>

<?php endwhile;

echo '</ul>'; //end of unordered post list
endif;

wp_reset_query(); ?>

</li> <!--end of li cat_list_item -->
<?php endforeach; ?>
</ul>
<?php
    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}
?>

<?php
add_shortcode( 'polygon_simple_recent_posts', 'polygon_get_posts_by_shortcode' );
if (!function_exists('polygon_get_posts_by_shortcode')){
function polygon_get_posts_by_shortcode($atts ){

    extract( shortcode_atts(
    array(
      'num_posts' => '5',
    ), $atts )
  );
    ob_start();
    $the_query = new WP_Query( array(
        'posts_per_page' => $num_posts,
        'order' => 'DESC'
    ) );

    if ( $the_query->have_posts() ) { ?>

        <ul class="clothes-listing"><?php
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li class="clothes-listing__item">
            <div class="date"><?php the_time('Y.n.d') ?></div>
            <div class="category"><?php the_category( ', ' ); ?></div>
            <div class="post-title"><a href="<?php the_permalink() ?>">  <?php the_title(); ?>  </a><div>
            </li>
            <?php
            endwhile;?>
            </ul>
           <?php
    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}
}
}
?>

<?php
 add_shortcode( 'custom_shortcode1', 'create_custom_shortcode1' );
function create_custom_shortcode1($attrs) {
  extract(shortcode_atts (array(
    'per_page' => -1
  ), $attrs));

  ob_start(); ?>
<?php dynamic_sidebar( 'header-block' ); ?>
<?php
    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}
?>


