<?php get_header(); ?>

<?php
$term=get_queried_object();
$image = get_field("image", $term->taxonomy."_".$term->term_id);
var_dump($term);
var_dump($image);
?>



<div class="list-place-container container">
  <?php
  /* Start the Loop */
  while ( have_posts() ):
    the_post();
    get_template_part( 'content', 'place' );
  endwhile; // End of the loop.
  ?>
</div>

<?php get_footer();
