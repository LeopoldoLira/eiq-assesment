<?
add_action( 'admin_init', function () {
    $front_page_id = get_option( 'page_on_front' );

    // Only run if editing the front page
    if ( isset( $_GET['post'] ) && (int) $_GET['post'] === (int) $front_page_id ) {
        remove_post_type_support( 'page', 'editor' );
    }
});
