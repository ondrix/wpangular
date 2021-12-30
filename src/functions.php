<?php

include get_template_directory() . "/inc/rest.php";
include get_template_directory() . "/plugins/index.php";
include get_template_directory() . "/post-types/index.php";

// Enable Featured Images
function wpangular_post_thumbnails()
{
  add_theme_support("post-thumbnails");
}
add_action("after_setup_theme", "wpangular_post_thumbnails");

// Add Main Menu
add_action("after_setup_theme", "register_custom_nav_menus");
function register_custom_nav_menus()
{
  register_nav_menus([
    "main_menu" => "Main menu",
    "footer_menu" => "Footer Menu",
  ]);
}
