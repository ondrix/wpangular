<?php
function pt_metabox_persons($meta_boxes)
{
  $meta_boxes[] = [
    "id" => "persons",
    "title" => esc_html__("Person", "Inoby"),
    "post_types" => ["persons"],
    "context" => "after_title",
    "storage_type" => "custom_table",
    "table" => "pt_persons",
    "priority" => "default",
    "autosave" => "false",
    "tab_style" => "left",
    "tabs" => [
      "main_info" => [
        "label" => esc_html__("Hlavné informácie", "inoby"),
      ],
    ],
    "fields" => [
      [
        "type" => "text",
        "name" => esc_html__("Name", "inoby"),
        "id" => "name",
        "tab" => "main_info",
      ],
    ],
  ];

  return $meta_boxes;
}
add_filter("rwmb_meta_boxes", "pt_metabox_persons");
?>
