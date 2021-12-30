<?php
function pt_register_byty()
{
  $labels = [
    "name" => _x("Byty", "Post Type General Name", "Inoby"),
    "singular_name" => _x("Byt", "Post Type Singular Name", "Inoby"),
    "menu_name" => __("Byty", "Inoby"),
    "parent_item_colon" => __("Nadradený byt", "Inoby"),
    "all_items" => __("Všetky byty", "Inoby"),
    "view_item" => __("Zobraziť byt", "Inoby"),
    "add_new_item" => __("Pridať nový byt", "Inoby"),
    "add_new" => __("Pridať nový byt", "Inoby"),
    "edit_item" => __("Upraviť byt", "Inoby"),
    "update_item" => __("Aktualizovať byt", "Inoby"),
    "search_items" => __("Hľadať byt", "Inoby"),
    "not_found" => __("Nič sa nenašlo", "Inoby"),
    "not_found_in_trash" => __("V koši sa nič nenašlo", "Inoby"),
  ];

  $args = [
    "label" => __("Byty", "Inoby"),
    "description" => __("Byty", "Inoby"),
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
    "menu_icon" => "dashicons-building",
    "menu_position" => 5,
    "can_export" => true,
    "has_archive" => true,
    "exclude_from_search" => false,
    "publicly_queryable" => true,
    "capability_type" => "page",
  ];

  register_post_type("byty", $args);
}

add_action("init", "pt_register_byty", 0);
?>
