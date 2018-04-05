<?php get_header(); ?>

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
