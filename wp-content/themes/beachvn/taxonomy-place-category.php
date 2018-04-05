<?php get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) : the_post();
?>
  <h2><?php the_title() ?></h2>
  <div><?php the_content() ?></div>
<?php
endwhile; // End of the loop.
?>

<?php get_footer();
