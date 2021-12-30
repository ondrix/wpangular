<?php
  function pt_metabox_retail($meta_boxes) {
    $meta_boxes[] = array(
      'id' => 'retail',
      'title' => esc_html__('Retail', 'Inoby'),
      'post_types' => array('retail'),
      'context' => 'after_title',
      // 'storage_type' => 'custom_table', 
      // 'table' => 'pt_retail',
      'priority' => 'default',
      'autosave' => 'false',
      'tab_style' => 'left',
      'tabs' => array(
        'main_info' => array(
          'label' => esc_html__( 'Hlavné informácie', 'inoby' ),
        ),
        'about_retail' => array(
          'label' => esc_html__( 'O retaile', 'inoby' ),
        ),
        'standard_retail' => array(
          'label' => esc_html__( 'Štandard sekcia', 'inoby' ),
        ),
        'flat_form' => array(
          'label' => esc_html__( 'Formulár', 'inoby' ),
        ),
      ),
      'fields' => array(
        [
          'type' => 'heading',
          'name' => esc_html__( 'Informácie ktoré sa zobrazujú pri výbere priestoru', 'inoby' ),
          'tab' => 'main_info',
        ],
        array(
          'name' => esc_html__( 'Celková plocha', 'inoby' ),
          'id'   => 'retail_total_size',
          'type' => 'number',
          'min'  => 0,
          'max'  => 10000,
          'step' => 0.01,
          'tab'  => 'main_info',
        ),
        //ABOUT RETAIL
        [
          'id'   => 'about_retail_total_area_number_retail',
          'name' => esc_html__( 'Celková výmera', 'inoby' ),
          'type' => 'number',
          'tab'  => 'about_retail',
      
          'min'  => 0.00,
          'step'  => 0.01,
          'max' => 400.00,
        ],
        [
          'id'   => 'about_retail_terrace_number_retail',
          'name' => esc_html__( 'Terasa 1NP', 'inoby' ),
          'type' => 'number',
          'tab'  => 'about_retail',
      
          'min'  => 0.00,
          'step'  => 0.01,
          'max' => 400.00,
        ],
        [
          'id'   => 'about_retail_parking_space_number_retail',
          'name' => esc_html__( 'Parkovacie miesta', 'inoby' ),
          'type' => 'number',
          'tab'  => 'about_retail',
      
          'min'  => 0.00,
          'step'  => 0.01,
          'max' => 400.00,
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Cena alebo text', 'inoby' ),
          'id'   => 'about_retail_price_text_retail',
          'tab'  => 'about_retail',
        ],
        [
          'type' => 'image_advanced',
          'name' => esc_html__( 'Náhľad pôdorysu', 'inoby' ),
          'id'   => 'about_retail_img_retail',
          'force_delete'     => false,
          'max_file_uploads' => 1,
          'max_status'       => 'false',
          'image_size'       => 'thumbnail',
          'tab'  => 'about_retail',
        ],
        [
          'id'               => 'about_retail_pdf_retail',
          'name'             => 'Pôdorys pdf',
          'type'             => 'file_advanced',
          'tab'  => 'about_retail',
          // Delete file from Media Library when remove it from post meta?
          // Note: it might affect other posts if you use same file for multiple posts
          'force_delete'     => false,
          // Maximum file uploads.
          'max_file_uploads' => 1,
          // File types.
          // 'mime_type'        => 'documents',
          // Do not show how many files uploaded/remaining.
          'max_status'       => 'false',
        ],
        //ABOUT RETAIL

        //STANDARD RETAIL
        [
          'type' => 'image_advanced',
          'name' => esc_html__( 'Obrázok v pozadí', 'inoby' ),
          'id'   => 'standard_retail_bg',
          'force_delete'     => false,
          'max_file_uploads' => 1,
          'max_status'       => 'false',
          'image_size'       => 'thumbnail',
          'tab'  => 'standard_retail',
        ],
        [
          'type' => 'divider',
          'tab'  => 'standard_retail',
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Nadpis', 'inoby' ),
          'id'   => 'standard_retail_heading',
          'tab'  => 'standard_retail',
        ],
        [
          'type' => 'divider',
          'tab'  => 'standard_retail',
        ],
        [
          'type' => 'textarea',
          'name' => esc_html__( 'Text', 'inoby' ),
          'id'   => 'standard_retail_text',
          'tab'  => 'standard_retail',
        ],

        //GALLERY
        [
          'type' => 'heading',
          'name' => esc_html__( 'Vizualizácie', 'inoby' ),
          'tab' => 'standard_retail',
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Text tlačidla', 'inoby' ),
          'id'   => 'standard_retail_gallery_btn_text',
          'tab'  => 'standard_retail',
        ],
        [
          'type' => 'image_advanced',
          'name' => esc_html__( 'Obrázky', 'inoby' ),
          'id'   => 'standard_retail_gallery_imgs',
          'force_delete'     => false,
          'max_file_uploads' => 10,
          'max_status'       => 'false',
          'image_size'       => 'thumbnail',
          'tab'  => 'standard_retail',
        ],

        //CATALOG
        [
          'type' => 'heading',
          'name' => esc_html__( 'Katalóg', 'inoby' ),
          'tab' => 'standard_retail',
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Tlačidlo text', 'inoby' ),
          'id'   => 'standard_retail_catalog_btn_text',
          'tab'  => 'standard_retail',
        ],
        [
          'id'               => 'standard_retail_catalog_document',
          'name'             => 'Katalóg štandartov',
          'type'             => 'file_advanced',
          'tab'              => 'standard_retail',
          // Delete file from Media Library when remove it from post meta?
          // Note: it might affect other posts if you use same file for multiple posts
          'force_delete'     => false,
          // Maximum file uploads.
          'max_file_uploads' => 1,
          // File types.
          // 'mime_type'        => 'documents',
          // Do not show how many files uploaded/remaining.
          'max_status'       => 'false',
        ],
        // flat_form
        [
          'type' => 'textarea',
          'name' => esc_html__( 'Nadpis nad formulárom', 'inoby' ),
          'id'   => 'retail_form_headline',
          'tab'  => 'flat_form',
        ],
        
      ),

    );

    return $meta_boxes;
  }
  add_filter( 'rwmb_meta_boxes', 'pt_metabox_retail' );
?>
