<?php
add_action('wp_ajax_retail', 'retail_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_retail', 'retail_filter_function');

function retail_filter_function(){

	global $post;
    
	$args_retail = array(
        'post_type' => 'retail',
        'posts_per_page' => -1,
		'orderby' => 'name', // we will sort posts by date
		'order'	=> 'ASC', // ASC or DESC
	);

    if( isset( $_POST['filter_retail'] ) && !empty( $_POST['filter_retail'] ) )
		$args_retail['tax_query'][] = array(
			array(
				'taxonomy' => 'poschodia_retail',
				'field' => 'id',
				'terms' => $_POST['filter_retail']
			)
		);
    
    if( isset( $_POST['filter_pocet_izieb'] ) && !empty( $_POST['filter_pocet_izieb'] ) )
		$args_retail['tax_query'][] = array(
			array(
				'taxonomy' => 'pocet_izieb',
				'field' => 'id',
				'terms' => $_POST['filter_pocet_izieb']
			)
		);

    if( isset( $_POST['filter_celkova_plocha'] ) && !empty( $_POST['filter_celkova_plocha'] ) )
		$args_retail['tax_query'][] = array(
			array(
				'taxonomy' => 'celkova_plocha',
				'field' => 'id',
				'terms' => $_POST['filter_celkova_plocha']
			)
		);

    if( isset( $_POST['filter_dostupnost'] ) && !empty( $_POST['filter_dostupnost'] ) )
		$args_retail['tax_query'][] = array(
			array(
				'taxonomy' => 'dostupnost',
				'field' => 'id',
				'terms' => $_POST['filter_dostupnost']
			)
		);

 
	$query = new WP_Query( $args_retail );
	
    echo '<div class=filter-results>';
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
            echo '<a href="'. get_permalink($query->post->ID) .'">';
            echo '<div class="filter-result-row">';
			echo '<span class="flat-name">' . $query->post->post_title . '</span>';
            echo '<span class="flat-floor">' . strip_tags(get_the_term_list( $post->ID, 'poschodia_retail' )). '</span>';
            echo '<span class="flat-rooms">' . strip_tags(get_the_term_list( $post->ID, 'pocet_izieb' )). '</span>';
            //echo '<span class="flat-size">' . strip_tags(get_the_term_list( $post->ID, 'celkova_plocha' )). '</span>';
            echo '<span class="flat-size">' . str_replace('.',',', rwmb_meta('retail_total_size','',$post->ID)) . ' m²</span>';
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
		echo __('Žiadne priestory nezodpovedajú výberu.','inoby');
	endif;
    echo '</div>';
	
	die();
}


add_filter( 'rwmb_meta_boxes', 'prefix_register_taxonomy_meta_boxes' );
function prefix_register_taxonomy_meta_boxes( $meta_boxes ){
    $meta_boxes[] = array(
        'title'      => '',
        'taxonomies' => array('poschodia_retail'), // THIS: List of taxonomies. Array or string
		
		'fields' => array(
			array(
				'type' => 'heading',
				'name' => esc_html__( '1. poschodie retail', 'inoby' ),
				'desc' => esc_html__( 'Nižšie nájdete pôdorys poschodia', 'inoby' ),
				'visible' => array( 'slug', '1-poschodie' ),
			),
			array(
				'type' => 'custom_html',
				'std'  => '<img src="/wp-content/themes/treepark/assets/images/floor-plan/1-poschodie-retail-treepark.svg">',
				'visible' => array( 'slug', '1-poschodie' ),
			),
			array(
				'name' => esc_html__( 'NP1 oblasť', 'inoby' ),
				'id'         => 'retail-first-floor-select-1',
				'type'       => 'post',
				'post_type'   => 'retail',
				'field_type' => 'select',
				'visible' => array( 'slug', '1-poschodie' ),
				'placeholder' => esc_html__( 'Výber NP1 oblasti', 'inoby' ),
			),
			array(
				'name' => esc_html__( 'NP2 oblasť', 'inoby' ),
				'id'         => 'retail-first-floor-select-2',
				'type'       => 'post',
				'post_type'   => 'retail',
				'field_type' => 'select',
				'visible' => array( 'slug', '1-poschodie' ),
				'placeholder' => esc_html__( 'Výber NP2 oblasti', 'inoby' ),
			),



			array(
				'type' => 'heading',
				'name' => esc_html__( '2. poschodie retail', 'inoby' ),
				'desc' => esc_html__( 'Nižšie nájdete pôdorys poschodia', 'inoby' ),
				'visible' => array( 'slug', '2-poschodie' ),
			),
			array(
				'type' => 'custom_html',
				'std'  => '<img src="/wp-content/themes/treepark/assets/images/floor-plan/2-poschodie-retail-treepark.svg">',
				'visible' => array( 'slug', '2-poschodie' ),
			),
			array(
				'name' => esc_html__( 'B01 oblasť', 'inoby' ),
				'id'         => 'retail-second-floor-select-1',
				'type'       => 'post',
				'post_type'   => 'retail',
				'field_type' => 'select',
				'visible' => array( 'slug', '2-poschodie' ),
				'placeholder' => esc_html__( 'Výber B01 oblasti', 'inoby' ),
			),
			array(
				'name' => esc_html__( 'B02 oblasť', 'inoby' ),
				'id'         => 'retail-second-floor-select-2',
				'type'       => 'post',
				'post_type'   => 'retail',
				'field_type' => 'select',
				'visible' => array( 'slug', '2-poschodie' ),
				'placeholder' => esc_html__( 'Výber B02 oblasti', 'inoby' ),
			),
        ),
    );
    return $meta_boxes;
}
?>
