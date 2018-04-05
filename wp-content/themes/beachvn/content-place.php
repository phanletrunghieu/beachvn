<?php
$reviews=beachvn_get_review(get_the_ID());
$images = get_field('album');
$place_link = get_permalink();
?>
<div class="place-container">
  <div class="place-content">
    <a href="<?php echo esc_url( get_permalink() ) ?>">
      <div class="placebox-img" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
      <div class="placebox-heading">
        <div class="score-circle"><?php echo $reviews['summary']['point'] ?></div>
        <div class="placebox-name"><?php the_title() ?></div>
      </div>
    </a>
    <div class="placebox-meta">
      <ul>
        <li><a href="<?php echo esc_url( $place_link."#comment-container" ) ?>">
          <i class="fas fa-comment"></i>
          <span><?php echo $reviews['summary']['comment_count'] ?></span>
        </a></li>
        <li><a href="<?php echo esc_url( $place_link."#comment-container" ) ?>">
          <i class="fas fa-camera"></i>
          <span><?php echo count($images) ?></span>
        </a></li>
      </ul>
    </div>
  </div>
</div>
