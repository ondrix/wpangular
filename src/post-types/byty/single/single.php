<?php
/**
 * Template Name: Byty
 */
Inoby_enqueue_parted_style('byty', 'partials/post-types/singles');
Inoby_enqueue_parted_script('byty', 'partials/post-types/singles');
get_header();
?>

<?php
  $pages = get_pages(
    array(
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'page-templates/kontakt.php'
    )
  );
  foreach($pages as $page){
      $kontakt_page_id = $page->ID;
  }
?>

  <div id="pt-byty-single">

    <!-- ABOUT APARTMENT -->
    <?php

    $total_area = rwmb_meta('flat_total_size');
    $interior_area = rwmb_meta('about_apartment_total_area_number_apartments');
    $terrace = rwmb_meta('about_apartment_terrace_number_apartments');
    $parking_space = rwmb_meta('about_apartment_parking_space_number_apartments');
    $price = rwmb_meta('about_apartment_price_text_apartments');

    $img = rwmb_meta('about_apartment_img_apartments', array( 'limit' => 1, 'size' => 'right-img' ));
    $podorysy = rwmb_meta('about_apartment_pdf_apartments');

    if ( ! empty( $interior_area ) ) : 

    ?>

    <section class="about-apartment">
      <div class="container">
        <div class="row white-bg">
          <div class="col-lg-4 col-sm-12 about-apartment-wrap" data-aos="fade-in">
            <div class="apartmen-title">
              <h1><?php the_title() ?></h1>
                <?php
                //DOSTUPNOST
                $availability = get_the_terms( $post->ID, 'dostupnost' );
                $availability_slug = join(', ', wp_list_pluck($availability, 'slug'));
                $availability_name = join(', ', wp_list_pluck($availability, 'name'));

                echo '<div class="availability ' . $availability_slug . ' ">';
                  echo '<span data-aos="fade-in"  >'. $availability_name .'</span>';
                echo '</div>';
                
                ?>
            </div>
            <div class="apartment-info">                
              <?php
                //POSCHODIE
                $floors = get_the_terms( $post->ID, 'poschodia' );
                $floors_name = join(', ', wp_list_pluck($floors, 'name'));

                echo '<div class="rooms-wrap">';
                  echo '<p>'. esc_html__( 'Poschodie:', 'inoby') .'</p>';
                  echo '<p>'. $floors_name .'</p>';
                echo '</div>';

                //POCET IZIEB
                $rooms = get_the_terms( $post->ID, 'pocet_izieb' );
                $rooms_name = join(', ', wp_list_pluck($rooms, 'name'));

                echo '<div class="rooms-wrap">';
                  echo '<p>'. esc_html__( 'Počet izieb:', 'inoby') .'</p>';
                  echo '<p>'. $rooms_name .'</p>';
                echo '</div>';
      
              ?>
              <div class="total-area-wrap">
                <p><?= esc_html__( 'Celková výmera:', 'inoby')?></p><p><?= $total_area?> m<sup>2<sup></p>
              </div>
              <div class="interior-area-wrap">
                <p><?= esc_html__( 'Výmera interiéru:', 'inoby')?></p><p><?= $interior_area?> m<sup>2<sup></p>
              </div>
              <div class="terrace-wrap">
                <p><?= esc_html__( 'Terasa:', 'inoby')?></p><p><?= $terrace?> m<sup>2<sup></p>
              </div>
              <div class="parking-space-wrap">
                <p><?= esc_html__( 'Parkovacie miesta:', 'inoby')?></p><p><?= $parking_space?></p>
              </div>
              <div class="parking-space-wrap">
                <p><?= esc_html__( 'Cena s DPH:', 'inoby')?></p><p><?= $price?></p>
              </div>
              <?php foreach ( $podorysy as $podorys ) { ?>
                  <a data-aos="fade-in"   class="link" href="<?php echo $podorys['url'];?>" target="_blank"><?= esc_html__( 'Pôdorys PDF', 'inoby')?></a>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="col-lg-8 col-sm-12 right-img" data-aos="fade-in">
              <?= wp_get_attachment_image( $img[0]['ID'], 'right-img' ); ?>  
        </div>
        </div>
      </div>
    </section>

    <?php
      endif;
    ?>

    <!-- ABOUT APARTMENT -->
    <!-- STANDART SECTION -->
    <?php

    $standard_apartments_bg = rwmb_meta('standard_apartments_bg', array( 'limit' => 1, 'size' => 'byty-banner-bg' ));
    $standard_apartments_heading = rwmb_meta('standard_apartments_heading');
    $standard_apartments_text = rwmb_meta('standard_apartments_text');
    $catalog_btn_text = rwmb_meta('standard_apartments_catalog_btn_text');
    $catalogs = rwmb_meta('standard_apartments_catalog_document');

    $gallery_btn_text = rwmb_meta('standard_apartments_gallery_btn_text');
    $gallery_imgs = rwmb_meta('standard_apartments_gallery_imgs', array( 'limit' => 10, 'size' => 'gallery-thumbnail' ));

    if ( ! empty( $standard_apartments_heading ) ) : 

    ?>


    <section class="standard">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 standard-bg" style="background: center left / cover no-repeat url('<?= $standard_apartments_bg[0]['url'] ?>');">
            <div class="content-wrap">
              <h2 data-aos="fade-in"><?= $standard_apartments_heading?></h2>
              <p data-aos="fade-in"><?= $standard_apartments_text?></p>
              <div class="buttons-wrap">
                <a data-aos="fade-in"   class="link glightbox5" data-gallery="apartments-gallery" href="<?php echo $standard_apartments_bg[0]['url'] ?>"><?= $gallery_btn_text?></a>
                <?php
                  foreach ($gallery_imgs as $gallery_img) {?>
                    <?php echo '<a class=" glightbox5" data-gallery="apartments-gallery" href="'. $gallery_img['full_url'] .'"></a>';?>
                <?php
                  }
                ?>
                <?php foreach ( $catalogs as $catalog ) { ?>
                  <a data-aos="fade-in"   class="link" href="<?php echo $catalog['url'];?>" target="_blank"><?= $catalog_btn_text?></a>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      endif;
    ?>
    <!-- STANDART SECTION -->

    <!-- CONTACT INFO -->
    <?php
    $contact_info_group = rwmb_meta('contact_info_group', '', $kontakt_page_id);
    $contact_info_group_bg = rwmb_meta('contact_info_group_bg', array( 'limit' => 1, 'size' => 'half-column' ), $kontakt_page_id);
    $contact_info_group_background = reset( $contact_info_group_bg );
    $contact_info_head = rwmb_meta('flat_form_headline');

    $contact_form_shortcode = rwmb_meta('contact_form_shortcode', '', $kontakt_page_id);
    ?>
    <section class="contact-info">
      <div class="container">
        <?php
          if ( ! empty( $contact_info_head ) ) : 
        ?>
        <div class="row contact-info-head">
          <h2><?= $contact_info_head ?></h2>
        </div>
        <?php
            endif;
        ?>
        <div class="row">
          <?php
            if ( ! empty( $contact_info_group ) ) : 
          ?>
          <div class="col-lg-6 contact-text-column" style="background: center center / cover no-repeat url('<?= $contact_info_group_background['url'] ?>');">
            <div class="contact-text">
              <?php
                foreach ($contact_info_group as $contact_info){
                  echo '<div class="contact-text-wrap">';
                  echo '<h4>'. $contact_info['contact_info_group_headline'] .'</h4>';
                  foreach ($contact_info['contact_info_group_text'] as $contact_row){
                    echo '<span>'. $contact_row .'</span>';
                  }
                  echo '</div>';
                }
              ?>
            </div>
          </div>
          <?php
            endif;
          ?>
          <?php
            if ( ! empty( $contact_form_shortcode ) ) : 
          ?>
          <div class="col-lg-6" style="background: #fff;">
            <div class="contact-form">
              <?= do_shortcode( $contact_form_shortcode ) ?>
            </div>
          </div>
          <?php
            endif;
          ?>
        </div>
      </div>
    </section>
    <!-- CONTACT INFO -->

  </div>
<?php
get_footer();
