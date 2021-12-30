<?php
  function pt_create_table_byty() {
    if (!class_exists('MB_Custom_Table_API')) {
        return;
    }
    MB_Custom_Table_API::create('pt_byty', array(

      'flat_total_size' => 'TEXT NOT NULL',

      //ABOUT APARTMANT

      //CELKOVA VYMERA
      'about_apartment_total_area_number_apartments' => 'TEXT NOT NULL',

      //TERASA
      'about_apartment_terrace_number_apartments' => 'TEXT NOT NULL',

      //PARKOVANIE
      'about_apartment_parking_space_number_apartments' => 'TEXT NOT NULL',

      //CENA
      'about_apartment_price_text_apartments' => 'TEXT NOT NULL',

      //OBRAZOK
      'about_apartment_img_apartments' => 'TEXT NOT NULL',

      // PODORYS
      'about_apartment_pdf_apartments' => 'TEXT NOT NULL',
      
      
      // END ABOUT APARTMANT

      //STANDARD APARTMENT
      'standard_apartments_bg' => 'TEXT NOT NULL',
      'standard_apartments_heading' => 'TEXT NOT NULL',
      'standard_apartments_text' => 'TEXT NOT NULL',

      'standard_apartments_catalog_btn_text' => 'TEXT NOT NULL',
      'standard_apartments_catalog_document' => 'TEXT NOT NULL',

      'standard_apartments_gallery_btn_text' => 'TEXT NOT NULL',
      'standard_apartments_gallery_imgs' => 'TEXT NOT NULL',
      //END STANDARD APARTMENT

      // flat_form
      'flat_form_headline' => 'TEXT NOT NULL',
      // flat_form

    ));
  }

  add_action('init', 'pt_create_table_byty');
?>
