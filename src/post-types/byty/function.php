<?php

  add_action('wp_ajax_byty', 'byty_filter_function'); // wp_ajax_{ACTION HERE} 
  add_action('wp_ajax_nopriv_byty', 'byty_filter_function');

  function byty_filter_function(){

    global $post;
      
    $args = array(
          'post_type' => 'byty',
          'posts_per_page' => -1,
      'orderby' => 'name', // we will sort posts by date
      'order'	=> 'ASC', // ASC or DESC
    );

      if( isset( $_POST['filter_poschodia'] ) && !empty( $_POST['filter_poschodia'] ) )
      $args['tax_query'][] = array(
        array(
          'taxonomy' => 'poschodia',
          'field' => 'id',
          'terms' => $_POST['filter_poschodia']
        )
      );
      
      if( isset( $_POST['filter_pocet_izieb'] ) && !empty( $_POST['filter_pocet_izieb'] ) )
      $args['tax_query'][] = array(
        array(
          'taxonomy' => 'pocet_izieb',
          'field' => 'id',
          'terms' => $_POST['filter_pocet_izieb']
        )
      );

      if( isset( $_POST['filter_celkova_plocha'] ) && !empty( $_POST['filter_celkova_plocha'] ) )
      $args['tax_query'][] = array(
        array(
          'taxonomy' => 'celkova_plocha',
          'field' => 'id',
          'terms' => $_POST['filter_celkova_plocha']
        )
      );

      if( isset( $_POST['filter_dostupnost'] ) && !empty( $_POST['filter_dostupnost'] ) )
      $args['tax_query'][] = array(
        array(
          'taxonomy' => 'dostupnost',
          'field' => 'id',
          'terms' => $_POST['filter_dostupnost']
        )
      );

  
    $query = new WP_Query( $args );
    
      echo '<div class=filter-results>';
    if( $query->have_posts() ) :
      while( $query->have_posts() ): $query->the_post();
              echo '<a href="'. get_permalink($query->post->ID) .'">';
              echo '<div class="filter-result-row">';
        echo '<span class="flat-name">' . $query->post->post_title . '</span>';
              echo '<span class="flat-floor">' . strip_tags(get_the_term_list( $post->ID, 'poschodia' )). '</span>';
              echo '<span class="flat-rooms">' . strip_tags(get_the_term_list( $post->ID, 'pocet_izieb' )). '</span>';
              //echo '<span class="flat-size">' . strip_tags(get_the_term_list( $post->ID, 'celkova_plocha' )). '</span>';
              echo '<span class="flat-size">' . str_replace('.',',', rwmb_meta('flat_total_size','',$post->ID)) . ' m²</span>';
              //echo '<span class="flat-status">' . strip_tags(get_the_term_list( $post->ID, 'dostupnost' )). '</span>';
              if(strip_tags(get_the_term_list( $post->ID, 'dostupnost' )) == 'Predaný'){
                  echo '<span class="flat-status flat-status-sold">'. __('Predaný','inoby') .'</span>';
              }
              else if(strip_tags(get_the_term_list( $post->ID, 'dostupnost' )) == 'Rezervovaný'){
                  echo '<span class="flat-status flat-status-reserve">'. __('Rezervovaný','inoby') .'</span>';
              }
              else if(strip_tags(get_the_term_list( $post->ID, 'dostupnost' )) == 'Na prenájom'){
                  echo '<span class="flat-status flat-status-rent">'. __('Na prenájom','inoby') .'</span>';
              }
              else if(strip_tags(get_the_term_list( $post->ID, 'dostupnost' )) == 'Voľný'){
                  echo '<span class="flat-status flat-status-free">'. __('Voľný','inoby') .'</span>';
              }
              echo '</div>';
              echo '</a>';

      endwhile;
      wp_reset_postdata();
    else :
      echo __('Žiadne byty nezodpovedajú výberu.','inoby');
    endif;
      echo '</div>';
    
    die();
  }


add_filter( 'rwmb_meta_boxes', 'poschodia_taxonomy_meta_boxes' );
function poschodia_taxonomy_meta_boxes( $meta_boxes ){
    $meta_boxes[] = array(
        'title'      => '',
        'taxonomies' => array('poschodia'), // THIS: List of taxonomies. Array or string
		
		'fields' => array(
			
      array(
          'type' => 'heading',
          'name' => esc_html__( '2. poschodie byty', 'inoby' ),
          'desc' => esc_html__( 'Nižšie nájdete pôdorys poschodia', 'inoby' ),
          'visible' => array( 'slug', '2-poschodie' ),
        ),
        array(
          'type' => 'custom_html',
          'std'  => '<img src="/wp-content/themes/treepark/assets/images/floor-plan/2-poschodie-byty-treepark.svg">',
          'visible' => array( 'slug', '2-poschodie' ),
        ),
        array(
          'name' => esc_html__( 'B01 oblasť', 'inoby' ),
          'id'         => 'byty-second-floor-select-1',
          'type'       => 'post',
          'post_type'   => 'byty',
          'field_type' => 'select',
          'visible' => array( 'slug', '2-poschodie' ),
          'placeholder' => esc_html__( 'Výber B01 oblasti', 'inoby' ),
        ),
        array(
          'name' => esc_html__( 'B02 oblasť', 'inoby' ),
          'id'         => 'byty-second-floor-select-2',
          'type'       => 'post',
          'post_type'   => 'byty',
          'field_type' => 'select',
          'visible' => array( 'slug', '2-poschodie' ),
          'placeholder' => esc_html__( 'Výber B02 oblasti', 'inoby' ),
        ),
        array(
          'name' => esc_html__( 'B03 oblasť', 'inoby' ),
          'id'         => 'byty-second-floor-select-3',
          'type'       => 'post',
          'post_type'   => 'byty',
          'field_type' => 'select',
          'visible' => array( 'slug', '2-poschodie' ),
          'placeholder' => esc_html__( 'Výber B03 oblasti', 'inoby' ),
        ),



        array(
          'type' => 'heading',
          'name' => esc_html__( '3. poschodie byty', 'inoby' ),
          'desc' => esc_html__( 'Nižšie nájdete pôdorys poschodia', 'inoby' ),
          'visible' => array( 'slug', '3-poschodie' ),
        ),
        array(
          'type' => 'custom_html',
          'std'  => '<img src="/wp-content/themes/treepark/assets/images/floor-plan/3-poschodie-byty-treepark.svg">',
          'visible' => array( 'slug', '3-poschodie' ),
        ),
        array(
          'name' => esc_html__( 'B04 oblasť', 'inoby' ),
          'id'         => 'byty-third-floor-select-1',
          'type'       => 'post',
          'post_type'   => 'byty',
          'field_type' => 'select',
          'visible' => array( 'slug', '3-poschodie' ),
          'placeholder' => esc_html__( 'Výber B04 oblasti', 'inoby' ),
        ),
        array(
          'name' => esc_html__( 'B05 oblasť', 'inoby' ),
          'id'         => 'byty-third-floor-select-2',
          'type'       => 'post',
          'post_type'   => 'byty',
          'field_type' => 'select',
          'visible' => array( 'slug', '3-poschodie' ),
          'placeholder' => esc_html__( 'Výber B05 oblasti', 'inoby' ),
        ),

      ),
    );
    return $meta_boxes;
}
  
?>
