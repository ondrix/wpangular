<?php
function pt_register_persons()
{
  $labels = [
    "name" => _x("Persons", "Post Type General Name", "Inoby"),
    "singular_name" => _x("Person", "Post Type Singular Name", "Inoby"),
    "menu_name" => __("Persons", "Inoby"),
    "parent_item_colon" => __("Nadradený byt", "Inoby"),
    "all_items" => __("All persons", "Inoby"),
    "view_item" => __("Show person", "Inoby"),
    "add_new_item" => __("Add new person", "Inoby"),
    "add_new" => __("Add new", "Inoby"),
    "edit_item" => __("Edit person", "Inoby"),
    "update_item" => __("Update person", "Inoby"),
    "search_items" => __("Search person", "Inoby"),
    "not_found" => __("Not found", "Inoby"),
    "not_found_in_trash" => __("V koši sa nič nenašlo", "Inoby"),
  ];

  $args = [
    "label" => __("Persons", "Inoby"),
    "description" => __("Persons", "Inoby"),
    "labels" => $labels,
    "supports" => ["title", "excerpt", "thumbnail", "revisions"],
    "taxonomies" => ["genres"],
    "hierarchical" => false,
    "public" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "show_in_admin_bar" => true,
    "show_in_rest" => true,
    "menu_icon" => "dashicons-person",
    "menu_position" => 5,
    "can_export" => true,
    "has_archive" => true,
    "exclude_from_search" => false,
    "publicly_queryable" => true,
    "capability_type" => "page",
  ];

  register_post_type("persons", $args);
}

add_action("init", "pt_register_persons", 0);
?>
