<?php
  function pt_create_table_retail() {
    if (!class_exists('MB_Custom_Table_API')) {
        return;
    }
    MB_Custom_Table_API::create('pt_retail', array(
      'retail_total_size' => 'TEXT NOT NULL',

      //ABOUT RETAIL

      //CELKOVA VYMERA
      'about_retail_total_area_number_retail' => 'TEXT NOT NULL',

      //TERASA
      'about_retail_terrace_number_retail' => 'TEXT NOT NULL',

      //PARKOVANIE
      'about_retail_parking_space_number_retail' => 'TEXT NOT NULL',

      //CENA
      'about_retail_price_text_retail' => 'TEXT NOT NULL',

      //OBRAZOK
      'about_retail_img_retail' => 'TEXT NOT NULL',

      // PODORYS
      'about_retail_pdf_retail' => 'TEXT NOT NULL',
      
      // END ABOUT RETAIL

      //STANDARD RETAIL
      'standard_retail_bg' => 'TEXT NOT NULL',
      'standard_retail_heading' => 'TEXT NOT NULL',
      'standard_retail_text' => 'TEXT NOT NULL',

      'standard_retail_catalog_btn_text' => 'TEXT NOT NULL',
      'standard_retail_catalog_document' => 'TEXT NOT NULL',

      'standard_retail_gallery_btn_text' => 'TEXT NOT NULL',
      'standard_retail_gallery_imgs' => 'TEXT NOT NULL',
      //END STANDARD RETAIL

      // flat_form
      'retail_form_headline' => 'TEXT NOT NULL',
      // flat_form

    ));
  }

  add_action('init', 'pt_create_table_retail');
?>
