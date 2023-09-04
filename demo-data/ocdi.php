<?php
/*
* This theme is using the One Click Demo Import Plugin (optional) for 
* importing demo data
*/
function ibsf_import_files() {
    return array(
        array(
            'import_file_name'           => 'Christmas',
            'categories'                 => array( 'Category 1', 'Category 2' ),
            'import_file_url'            => 'http://www.your_domain.com/ocdi/demo-content2.xml',
            'import_widget_file_url'     => 'http://www.your_domain.com/ocdi/widgets2.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer2.dat',
            'import_preview_image_url'   => 'http://www.your_domain.com/ocdi/preview_import_image2.jpg',
            'import_notice'              => __( 'This theme works best with WooCommerce installed.', 'boom-festive' ),
            'preview_url'                => 'http://www.your_domain.com/my-demo-1',
        ),
        array(
            'import_file_name'           => 'New Demo Coming Soon',
            'categories'                 => array( 'New category', 'Old category' ),
            'import_file_url'            => 'http://www.your_domain.com/ocdi/demo-content2.xml',
            'import_widget_file_url'     => 'http://www.your_domain.com/ocdi/widgets2.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer2.dat',
            
            'import_preview_image_url'   => 'http://www.your_domain.com/ocdi/preview_import_image2.jpg',
            'import_notice'              => __( 'A special note for this import.', 'boom-festive' ),
            'preview_url'                => 'http://www.your_domain.com/my-demo-2',
        ),
    );
}
add_filter( 'ocdi/import_files', 'ibsf_import_files' );



function ibsf_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Boom Festive Main Menu', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Boom Festive Footer Menu', 'nav_menu' );


    set_theme_mod( 'nav_menu_locations', array(
            'boom_festive_main_menu' => $main_menu->term_id, 
            'boom_festive_footer_menu' => $footer_menu->term_id, 


        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'ocdi/after_import', 'ibsf_after_import_setup' );