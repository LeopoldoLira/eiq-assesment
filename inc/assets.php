<?

function eiq_enqueue_styles() {
    // Get theme version for cache busting (optional)
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'eiq-main-css',                      // Handle
        get_template_directory_uri() . '/css/main.min.css', // File path
        array(),                                     // Dependencies
        $theme_version,                              // Version
        'all'                                        // Media
    );
}
add_action('wp_enqueue_scripts', 'eiq_enqueue_styles');




?>