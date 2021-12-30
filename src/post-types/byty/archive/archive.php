<?php
/**
 * Template Name: Byty
 */
Inoby_enqueue_parted_style('byty', 'partials/post-types/archives');
Inoby_enqueue_parted_script('byty', 'partials/post-types/archives');
get_header();
?>
  <div id="pt-byty-archive">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php
            while ( have_posts() ) :
              the_post();
              get_template_part('post-types/byty/parts/card');
            endwhile;
          ?>
          <?php the_posts_navigation(); ?>
        </div>
      </div>
    </div>
  </div>
<?php
get_footer();
