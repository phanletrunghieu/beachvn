<?php
if ( post_password_required() ) {
	return;
}
?>

<div class="comment-container" id="comment-container">
  <div class="comment-function">
    <a href="" class="comment-function-item comment-function-like">
      <i class="icon icon-heart v-a-10-m"></i>&nbsp;Thích
    </a>
  </div>

  <?php
  wp_list_comments( array(
    'max_depth'   => 1,
    'callback'    => function($comment, $args, $depth) {
			if (strpos($comment->comment_content, 'review:')===0) {
				return;
			}
  ?>
  <div id="comment-<?php echo $comment->comment_ID ?>" class="comment">
    <div class="comment-left">
      <div class="comment-avatar">
        <img alt="Phan Hiếu" class="img-fluid" src="<?php echo get_avatar_url($comment->comment_author_email, 35) ?>" />
      </div>
    </div>
    <div class="comment-right">
      <div class="comment-content">
        <a class="comment-author" href="<?php echo get_comment_author_link($comment->comment_ID) ?>"><?php echo $comment->comment_author ?></a>
        <span class="comment-text"><?php echo $comment->comment_content ?></span>
        <div class="comment-time-container">
          <span class="comment-time"><?php echo human_time_diff(get_comment_date('U', $comment->comment_ID), current_time('timestamp')) ?></span>
        </div>
				<?php
				if (wp_get_current_user()->user_email===$comment->comment_author_email) {
				?>
				<div class="comment-actions btn-group">
					<div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="dropdown-menu dropdown-menu-right">
						<button class="dropdown-item btn-delete-comment" type="button" data-comment-id="<?php echo $comment->comment_ID; ?>">Xoá</button>
					</div>
				</div>
				<?php
				}
				?>
      </div>
    </div>
  </div>
  <?php
    }
  ) );
  ?>

  <div class="comment">
    <div class="comment-left">
      <div class="comment-avatar">
        <img alt="Avatar" class="img-fluid" src="<?php echo get_avatar_url(null, 35) ?>" />
      </div>
    </div>
    <div class="comment-right">
			<form class="comment-form" action="<?php echo site_url( '/wp-comments-post.php' ) ?>" method="post" novalidate>
				<textarea rows="1" cols="1" id="comment" name="comment" class="comment-write form-input" placeholder="Viết thảo luận..."></textarea>
				<input type="hidden" name="comment_post_ID" value="<?php the_ID() ?>" id="comment_post_ID">
				<input type="hidden" name="comment_parent" id="comment_parent" value="0">
			</form>
    </div>
  </div>
</div>
