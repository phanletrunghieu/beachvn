<?php get_header(); ?>

<div class="place-container">
	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();
	?>

	<div class="grid-container">
		<div class="place-hero border">
			<div class="place-media">
				<img src="https://media.tripnow.vn/res/g1/4888/prof/s460x300/foody-mobile-lan-rung.jpg" class="img-fluid" alt="Lan Rừng" />
			</div>
			<div class="place-info">
				<h1 class="place-name"><?php the_title() ?></h1>
				<div class="place-type">Nhà hàng, Tiệc cưới/Hội nghị, Khu nghỉ dưỡng</div>
				<div class="place-score">
					<?php
					$reviews = beachvn_get_review(get_the_ID());
					foreach ($reviews as $alias=>$review):
						if ($alias==='summary') {
							continue;
						}
					?>
					<div class="place-score-item">
						<div class="place-score-number green">
							<?php echo $review['point'] ?>
						</div>
						<div class="place-score-label">
							<?php echo $review['name'] ?>
						</div>
					</div>
					<?php
					endforeach;
					?>

					<div class="place-score-item">
						<div class="place-score-number green">
							<?php echo $reviews['summary']['point'] ?>/<span class="black"><?php echo $reviews['summary']['comment_count'] ?></span>
						</div>
						<div class="place-score-label">
							Bình luận
						</div>
					</div>
				</div>

				<div class="place-meta">
					<div class="place-meta-item">
						<i class="icon icon-location-arrow"></i> 3 - 6 Hạ Long, Bãi Dứa, Tp. Vũng Tàu
					</div>

					<div class="place-meta-item">
						<i class="icon icon-phone-old"></i>
						<a href="" class="link-gray">
							<strong id="initPhone" onclick="ShowPhone()">Bấm vào để xem</strong>
							<strong id="ShowPhone"></strong>
						</a>
					</div>

					<div class="place-meta-item">
						<i class="icon icon-time"></i>
						<span class="itsclosed" title="Nhà hàng | 09:00 AM - 11:00 PM" style="color:red;">
							Chưa mở cửa
						</span>
						<span style="margin-left: 5px;"><label> Resort: </label><span><span>12:30 AM</span> - <span>11:30 PM</span></span><span> | </span><label>Nhà hàng: </label><span><span>09:00 AM</span> - <span>11:00 PM</span></span>
						</span>

					</div>

					<div class="place-meta-item">
						<i class="icon icon-tag"></i> Đang cập nhật
					</div>
				</div>
			</div>
		</div>

		<ul class="nav nav-tabs border place-nav">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#tab-description">Giới thiệu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#tab-image-video">Hình ảnh - Videos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="tab-google-map" data-toggle="modal" data-target="#modal-map">Bản đồ</a>
			</li>
		</ul>
		<div class="row">
			<div class="col-md-8">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab-description">
						<article class="story border">
							<div class="story-body">
								<h3 class="story-name"><?php the_title() ?></h3>

								<div class="story-desc ng-binding active">
									<?php the_content() ?>
								</div>
							</div>

							<div class="story-gallery-container">
								<ul class="story-gallery clearfix">
									<?php
									$images = get_field('album');
									foreach( $images as $image ): ?>
										<li class="story-gallery-item">
											<div class="story-gallery-image" style="background-image: url(<?php echo $image['url'] ?>);"></div>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>

							<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>
						</article>
					</div>
					<div role="tabpanel" class="tab-pane fade in" id="tab-image-video">
						<div class="story-gallery-container porlet border">
							<ul class="story-gallery clearfix">
								<?php
								foreach( $images as $image ): ?>
									<li class="story-gallery-item">
										<div class="story-gallery-image" style="background-image: url(<?php echo $image['url'] ?>);"></div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="porlet border">
					<div class="porlet-content">
						<div class="place-chart">
							<div class="place-chart-item">
								<span><?php echo $reviews['summary']['comment_count'] ?></span>
								<strong>bình luận đã chia sẻ</strong>
							</div>
							<div class="place-chart-item">
								<span class="color-pink"><?php echo $reviews['summary']['great'] ?></span> Tuyệt vời
							</div>
							<div class="place-chart-item">
								<span class="color-green"><?php echo $reviews['summary']['good'] ?></span> Khá tốt
							</div>
							<div class="place-chart-item">
								<span class=""><?php echo $reviews['summary']['average'] ?></span> Trung bình
							</div>
							<div class="place-chart-item">
								<span class="color-red"><?php echo $reviews['summary']['bad'] ?></span> Kém
							</div>
						</div>
						<div class="story-place-score">
							<div class="story-score-info row align-middle">
								<div class="col-md-4 text-left">
									<strong>Tiêu chí</strong>
								</div>
							</div>
							<?php
							foreach ($reviews as $alias=>$review):
								if ($alias==='summary') {
									continue;
								}
							?>
							<div class="story-score-info row align-middle">
								<div class="col-md-4 text-left">
									<?php echo $review['name'] ?>
								</div>
								<div class="col-md-6">
									<div class="progress">
										<div class="progress-bar" role="progressbar" style="width: <?php echo $review['point']*10 ?>%" aria-valuenow="<?php echo $review['point']*10 ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-md-2 text-right">
									<strong><?php echo $review['point'] ?></strong>
								</div>
							</div>
							<?php
							endforeach;
							?>
						</div>
						<div class="place-total text-center">
							<span class="place-total-score color-green"><?php echo $reviews['summary']['point'] ?></span> điểm -
							<span class="place-total-rate"><?php echo $reviews['summary']['comment_text'] ?></span>
						</div>
						<button type="button" class="btn btn-primary btn-review" data-toggle="modal" data-target="#modal-review">
							<i class="fas fa-comment"></i> &nbsp; Viết bình luận
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-map" tabindex="-1" role="dialog" aria-labelledby="modalMapTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMapTitle">Thông tin bản đồ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3918.1176978297617!2d106.80647799360486!3d10.878651776727285!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d8afb027ed19%3A0xbe5f002aebd8bf4d!2sMini+Stop!5e0!3m2!1svi!2s!4v1521818568687" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

	<div class="modal fade" id="modal-review" tabindex="-1" role="dialog" aria-labelledby="modalReviewTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalReviewTitle">Đánh giá</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
					<form class="review-form" action="<?php echo site_url( '/wp-comments-post.php' ) ?>" method="post" novalidate>
						<input type="hidden" name="comment_post_ID" class="comment_post_ID" value="<?php the_ID() ?>">
						<div class="review-item">
							<b class="review-name">Không gian</b>
							<input
								id="review-space"
								type="text"
								class="slider"
								data-provide="slider"
								data-slider-min="1"
								data-slider-max="10"
								data-slider-step="1"
								data-slider-value="10"
								data-slider-tooltip="hide"
								data-slider-handle="round"
							/>
							<span class="review-value">10</span>
						</div>
						<div class="review-item">
							<b class="review-name">Vị trí tốt</b>
							<input
								id="review-location"
								type="text"
								class="slider"
								data-provide="slider"
								data-slider-min="1"
								data-slider-max="10"
								data-slider-step="1"
								data-slider-value="10"
								data-slider-tooltip="hide"
								data-slider-handle="round"
							/>
							<span class="review-value">10</span>
						</div>
						<div class="review-item">
							<b class="review-name">Giá cả</b>
							<input
								id="review-price"
								type="text"
								class="slider"
								data-provide="slider"
								data-slider-min="1"
								data-slider-max="10"
								data-slider-step="1"
								data-slider-value="10"
								data-slider-tooltip="hide"
								data-slider-handle="round"
							/>
							<span class="review-value">10</span>
						</div>
						<div class="review-item">
							<b class="review-name">Chất lượng</b>
							<input
								id="review-quality"
								type="text"
								class="slider"
								data-provide="slider"
								data-slider-min="1"
								data-slider-max="10"
								data-slider-step="1"
								data-slider-value="10"
								data-slider-tooltip="hide"
								data-slider-handle="round"
							/>
							<span class="review-value">10</span>
						</div>
					</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
	        <button type="button" class="btn btn-primary btn-submit-review" data-dismiss="modal">Lưu</button>
	      </div>
	    </div>
	  </div>
	</div>

	<?php
	endwhile; // End of the loop.
	?>
</div>

<?php get_footer();
