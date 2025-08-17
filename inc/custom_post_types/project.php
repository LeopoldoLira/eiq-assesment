<?

add_theme_support( 'post-thumbnails' );
function eiq_register_projects_cpt() {
    // -------------------------
    // 1. Custom Post Type: Coffee
    // -------------------------
    $labels = array(
        'name'                  => 'Projects',
        'singular_name'         => 'Project',
        'menu_name'             => 'Projects',
        'name_admin_bar'        => 'Project',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Project',
        'new_item'              => 'New Project',
        'edit_item'             => 'Edit Project',
        'view_item'             => 'View Project',
        'all_items'             => 'All Projects',
        'search_items'          => 'Search Projects',
        'not_found'             => 'No projects found',
        'not_found_in_trash'    => 'No projects found in Trash',
        'featured_image'        => 'Project Image',
        'set_featured_image'    => 'Set project image',
        'remove_featured_image' => 'Remove project image',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'project'),
        'show_in_rest'       => true, //useful if later using block or JS filtering
        'supports'           => array('title', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio', // dashicon
        'capability_type'    => 'post',
        'show_in_nav_menus'  => true,
    );

    register_post_type('project', $args);
}

// Hook into init
add_action('init', 'eiq_register_projects_cpt');