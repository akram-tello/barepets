<?php 

// ALL ACF FUNCTIONS

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Script Settings',
        'menu_title'    => 'Scripts',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Single Product Settings',
        'menu_title'    => 'Product Setting',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}

function custom_block_category( $categories, $post ) {
    $custom_block = array(
        'slug'  => 'impremis',
        'title' => __( 'Barepets Blocks', 'impremis' ),
    );

    $categories_sorted = array();
    $categories_sorted[0] = $custom_block;

    foreach ($categories as $category) {
        $categories_sorted[] = $category;
    }

    return $categories_sorted;
}
add_filter( 'block_categories', 'custom_block_category', 10, 2);