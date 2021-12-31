<?php

function register_widget_areas() {

register_sidebar( array(
  'name'          => 'Footer - Column 1',
  'id'            => 'footer_area_one',
  'description'   => 'Obsah pre prvý stĺpec v pätičke webu',
  'before_widget' => '<section class="footer-area footer-area-one">',
  'after_widget'  => '</section>',
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
));

register_sidebar( array(
  'name'          => 'Footer - Column 2',
  'id'            => 'footer_area_two',
  'description'   => 'Obsah pre druhý stĺpec v pätičke webu',
  'before_widget' => '<section class="footer-area footer-area-two">',
  'after_widget'  => '</section>',
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
));

register_sidebar( array(
  'name'          => 'Footer - Column 3',
  'id'            => 'footer_area_three',
  'description'   => 'Obsah pre tretí stĺpec v pätičke webu',
  'before_widget' => '<section class="footer-area footer-area-three">',
  'after_widget'  => '</section>',
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
));

register_sidebar( array(
  'name'          => 'Footer - Column 4',
  'id'            => 'footer_area_four',
  'description'   => 'Obsah pre štvrtý stĺpec v pätičke webu',
  'before_widget' => '<section class="footer-area footer-area-four">',
  'after_widget'  => '</section>',
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
));

}

add_action( 'widgets_init', 'register_widget_areas' );