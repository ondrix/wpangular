<?php
  function pt_register_retail() {
    $labels = array(
        'name'                => _x('Retail', 'Post Type General Name', 'Inoby'),
        'singular_name'       => _x('Priestor', 'Post Type Singular Name', 'Inoby'),
        'menu_name'           => __('Retail', 'Inoby'),
        'parent_item_colon'   => __('Nadradený priestor', 'Inoby'),
        'all_items'           => __('Všetky priestory', 'Inoby'),
        'view_item'           => __('Zobraziť priestor', 'Inoby'),
        'add_new_item'        => __('Pridať nový priestor', 'Inoby'),
        'add_new'             => __('Pridať nový priestor', 'Inoby'),
        'edit_item'           => __('Upraviť priestor', 'Inoby'),
        'update_item'         => __('Aktualizovať priestor', 'Inoby'),
        'search_items'        => __('Hľadať priestor', 'Inoby'),
        'not_found'           => __('Nič sa nenašlo', 'Inoby'),
        'not_found_in_trash'  => __('V koši sa nič nenašlo', 'Inoby'),
    );
        
    $args = array(
        'label'               => __('Retail', 'Inoby'),
        'description'         => __('Retail', 'Inoby'),
        'labels'              => $labels,
        'supports'            => array('title', 'excerpt', 'thumbnail', 'revisions'),
        'taxonomies'          => array('genres'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-building',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite' => array( 
          'slug' => 'retail',
          'with_front' => FALSE,
        ),
    );
        
    register_post_type('retail', $args);
  }

  add_action('init', 'pt_register_retail', 0);
?>
