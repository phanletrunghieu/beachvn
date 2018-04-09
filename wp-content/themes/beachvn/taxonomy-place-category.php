<?php get_header(); ?>

<?php
$term=get_queried_object();
$image = get_field("image", $term->taxonomy."_".$term->term_id);
?>

<div class="hero" style="background-image: url('<?php echo $image ?>')">
  <div class="grid-container">
    <div class="hero-content">
      <h1 class="hero-heading">Du Lịch <?php echo $term->name; ?></h1>
      <h4 class="hero-subheading">
      <span><a href="" style="color:#fff;"><?php echo $term->count ?> địa điểm</a></span>
      </h4>
    </div>
  </div>
</div>

<div class="list-place-container container">
  <?php
  /* Start the Loop */
  while ( have_posts() ):
    the_post();
    get_template_part( 'content', 'place' );
  endwhile; // End of the loop.
  ?>
</div>

<?php
the_posts_pagination(array(
  'prev_text' => '<i class="fas fa-arrow-left"></i>',
  'next_text' => '<i class="fas fa-arrow-right"></i>',
));
?>

<?php get_footer();
