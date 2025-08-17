<?
add_action( 'admin_init', function () {
    $front_page_id = get_option( 'page_on_front' );

    // Only run if editing the front page
    if ( isset( $_GET['post'] ) && (int) $_GET['post'] === (int) $front_page_id ) {
        remove_post_type_support( 'page', 'editor' );
    }
});


require_once get_template_directory() . '/inc/custom_post_types/project.php';

require_once get_template_directory() . '/inc/assets.php';


add_action('wp_enqueue_scripts', function () {
  $ver = wp_get_theme()->get('Version');

  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.1.0');
  wp_enqueue_style('theme', get_stylesheet_directory_uri().'/assets/css/theme.css', ['swiper'], $ver);

  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11.1.0', true);
  wp_enqueue_script('theme', get_stylesheet_directory_uri().'/assets/js/theme.js', ['swiper'], $ver, true);
});
