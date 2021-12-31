<?php
function pg_metabox_domov($meta_boxes)
{
  $meta_boxes[] = [
    "id" => "domov",
    "title" => esc_html__("Domov", "Inoby"),
    "post_types" => ["page"],
    "show" => [
      "template" => ["page-templates/domov.php"],
    ],
    "context" => "normal",
    "priority" => "default",
    "autosave" => "false",
    "tabs" => [
      "banner" => [
        "label" => esc_html__("Banner", "inoby"),
      ],
    ],
    "tab_style" => "left",
    "fields" => [
      [
        "type" => "text",
        "name" => esc_html__("Nadpis", "inoby"),
        "id" => "banner_heading",
        "tab" => "banner",
      ],
      [
        "type" => "text",
        "name" => esc_html__("Tlačidlo text", "inoby"),
        "id" => "banner_btn_text",
        "tab" => "banner",
      ],
      [
        "type" => "text",
        "name" => esc_html__("Tlačidlo odkaz", "inoby"),
        "id" => "banner_btn_url",
        "tab" => "banner",
      ],
      [
        "type" => "image_advanced",
        "name" => esc_html__("Obrázok v pozadí", "inoby"),
        "id" => "banner_bg",
        "force_delete" => false,
        "max_file_uploads" => 1,
        "max_status" => "false",
        "image_size" => "thumbnail",
        "tab" => "banner",
      ],
    ],
  ];

  return $meta_boxes;
}
add_filter("rwmb_meta_boxes", "pg_metabox_domov");
?>
