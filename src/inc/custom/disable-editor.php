<?php

function remove_editor()
{
  if (isset($_GET["post"])) {
    $id = $_GET["post"];
    $template = get_post_meta($id, "_wp_page_template", true);
    remove_post_type_support("page", "editor");

    switch ($template) {
      case "page-templates/domov.php":
      case "page-templates/lokalita.php":
      case "page-templates/kontakt.php":
      case "page-templates/financovanie.php":
      case "page-templates/galeria.php":
      case "page-templates/vyber_bytu.php":
      case "page-templates/retail.php":
      case "page-templates/o_projekte.php":
        break;
      default:
        // Don't remove any other template.
        break;
    }
  }
}
add_action("init", "remove_editor");
