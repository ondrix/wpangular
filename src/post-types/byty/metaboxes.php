<?php
  function pt_metabox_byty($meta_boxes) {
    $meta_boxes[] = array(
      'id' => 'byty',
      'title' => esc_html__('Byt', 'Inoby'),
      'post_types' => array('byty'),
      'context' => 'after_title',
      'storage_type' => 'custom_table', 
      'table' => 'pt_byty',
      'priority' => 'default',
      'autosave' => 'false',
      'tab_style' => 'left',
      'tabs' => array(
        'main_info' => array(
          'label' => esc_html__( 'Hlavné informácie', 'inoby' ),
        ),
        'about_apartment' => array(
          'label' => esc_html__( 'O byte', 'inoby' ),
        ),
        'standard_apartments' => array(
          'label' => esc_html__( 'Štandard sekcia', 'inoby' ),
        ),
        'flat_form' => array(
          'label' => esc_html__( 'Formulár', 'inoby' ),
        ),
      ),
      'fields' => array(
        [
          'type' => 'heading',
          'name' => esc_html__( 'Informácie ktoré sa zobrazujú pri výbere bytu', 'inoby' ),
          'tab' => 'main_info',
        ],
        array(
          'name' => esc_html__( 'Celková plocha', 'inoby' ),
          'id'   => 'flat_total_size',
          'type' => 'number',
          'min'  => 0,
          'max'  => 10000,
          'step' => 0.01,
          'tab'  => 'main_info',
        ),
        //ABOUT APARTMENT
        [
          'id'   => 'about_apartment_total_area_number_apartments',
          'name' => esc_html__( 'Výmera interiéru', 'inoby' ),
          'type' => 'number',
          'tab'  => 'about_apartment',
      
          'min'  => 0.00,
          'step'  => 0.01,
          'max' => 400.00,
        ],
        [
          'id'   => 'about_apartment_terrace_number_apartments',
          'name' => esc_html__( 'Terasa 1NP', 'inoby' ),
          'type' => 'number',
          'tab'  => 'about_apartment',
      
          'min'  => 0.00,
          'step'  => 0.01,
          'max' => 400.00,
        ],
        [
          'id'   => 'about_apartment_parking_space_number_apartments',
          'name' => esc_html__( 'Parkovacie miesta', 'inoby' ),
          'type' => 'number',
          'tab'  => 'about_apartment',
      
          'min'  => 0.00,
          'step'  => 0.01,
          'max' => 400.00,
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Cena alebo text', 'inoby' ),
          'id'   => 'about_apartment_price_text_apartments',
          'tab'  => 'about_apartment',
        ],
        [
          'type' => 'image_advanced',
          'name' => esc_html__( 'Náhľad pôdorysu', 'inoby' ),
          'id'   => 'about_apartment_img_apartments',
          'force_delete'     => false,
          'max_file_uploads' => 1,
          'max_status'       => 'false',
          'image_size'       => 'thumbnail',
          'tab'  => 'about_apartment',
        ],
        [
          'id'               => 'about_apartment_pdf_apartments',
          'name'             => 'Pôdorys pdf',
          'type'             => 'file_advanced',
          'tab'  => 'about_apartment',
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
        //ABOUT APARTMENT


        //STANDARD APARTMENT
        [
          'type' => 'image_advanced',
          'name' => esc_html__( 'Obrázok v pozadí', 'inoby' ),
          'id'   => 'standard_apartments_bg',
          'force_delete'     => false,
          'max_file_uploads' => 1,
          'max_status'       => 'false',
          'image_size'       => 'thumbnail',
          'tab'  => 'standard_apartments',
        ],
        [
          'type' => 'divider',
          'tab'  => 'standard_apartments',
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Nadpis', 'inoby' ),
          'id'   => 'standard_apartments_heading',
          'tab'  => 'standard_apartments',
        ],
        [
          'type' => 'divider',
          'tab'  => 'standard_apartments',
        ],
        [
          'type' => 'textarea',
          'name' => esc_html__( 'Text', 'inoby' ),
          'id'   => 'standard_apartments_text',
          'tab'  => 'standard_apartments',
        ],

        //GALLERY
        [
          'type' => 'heading',
          'name' => esc_html__( 'Vizualizácie', 'inoby' ),
          'tab' => 'standard_apartments',
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Text tlačidla', 'inoby' ),
          'id'   => 'standard_apartments_gallery_btn_text',
          'tab'  => 'standard_apartments',
        ],
        [
          'type' => 'image_advanced',
          'name' => esc_html__( 'Obrázky', 'inoby' ),
          'id'   => 'standard_apartments_gallery_imgs',
          'force_delete'     => false,
          'max_file_uploads' => 10,
          'max_status'       => 'false',
          'image_size'       => 'thumbnail',
          'tab'  => 'standard_apartments',
        ],

        //CATALOG
        [
          'type' => 'heading',
          'name' => esc_html__( 'Katalóg', 'inoby' ),
          'tab' => 'standard_apartments',
        ],
        [
          'type' => 'text',
          'name' => esc_html__( 'Tlačidlo text', 'inoby' ),
          'id'   => 'standard_apartments_catalog_btn_text',
          'tab'  => 'standard_apartments',
        ],
        [
          'id'               => 'standard_apartments_catalog_document',
          'name'             => 'Katalóg štandartov',
          'type'             => 'file_advanced',
          'tab'              => 'standard_apartments',
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
          'id'   => 'flat_form_headline',
          'tab'  => 'flat_form',
        ],
      ),
    );

    return $meta_boxes;
  }
  add_filter( 'rwmb_meta_boxes', 'pt_metabox_byty' );
?>
