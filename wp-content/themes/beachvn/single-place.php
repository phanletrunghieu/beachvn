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
					<div class="place-score-item">
						<div class="place-score-number green">
							8.0
						</div>
						<div class="place-score-label">
							Không gian
						</div>
					</div>

					<div class="place-score-item">
						<div class="place-score-number green">
							8.2
						</div>
						<div class="place-score-label">
							Vị trí
						</div>
					</div>

					<div class="place-score-item">
						<div class="place-score-number green">
							7.2
						</div>
						<div class="place-score-label">
							Chất lượng
						</div>
					</div>

					<div class="place-score-item">
						<div class="place-score-number green">
							7.0
						</div>
						<div class="place-score-label">
							Phục vụ
						</div>
					</div>

					<div class="place-score-item">
						<div class="place-score-number green">
							6.7
						</div>
						<div class="place-score-label">
							Giá cả
						</div>
					</div>

					<div class="place-score-item">
						<div class="place-score-number green">
							7.4/<span class="black">93</span>
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
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-620-636426389108241934.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-404-636426389110117105.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-479-636426389111210930.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-824-636418541355833586.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-620-636426389108241934.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-404-636426389110117105.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-479-636426389111210930.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
									<li class="story-gallery-item">
										<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-824-636418541355833586.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
									</li>
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
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-620-636426389108241934.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-404-636426389110117105.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-479-636426389111210930.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-824-636418541355833586.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-620-636426389108241934.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-404-636426389110117105.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-479-636426389111210930.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
								<li class="story-gallery-item">
									<img src="https://media.tripnow.vn/res/g1/4888/t180x180/tripnow-lan-rung-resort-spa-restaurant-824-636418541355833586.jpg" class="img-fluid" alt="Lan Rừng - Resort Spa Restaurant" title="Lan Rừng - Resort Spa Restaurant" />
								</li>
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
								<span>93</span>
								<strong>bình luận đã chia sẻ</strong>
							</div>
							<div class="place-chart-item">
								<span class="color-pink">4</span> Tuyệt vời
							</div>
							<div class="place-chart-item">
								<span class="color-green">68</span> Khá tốt
							</div>
							<div class="place-chart-item">
								<span class="">17</span> Trung bình
							</div>
							<div class="place-chart-item">
								<span class="color-red">4</span> Kém
							</div>
						</div>
						<div class="story-place-score">
							<div class="story-score-info row align-middle">
								<div class="col-md-4 text-left">
									<strong>Tiêu chí</strong>
								</div>
							</div>
							<div class="story-score-info row align-middle">
								<div class="col-md-4 text-left">
									Vị trí
								</div>
								<div class="col-md-6">
									<div class="progress">
										<div class="progress-bar" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-md-2 text-right">
									<strong>8.2</strong>
								</div>
							</div>

							<div class="story-score-info row align-middle">
								<div class="col-md-4 text-left">
									Giá cả
								</div>
								<div class="col-md-6">
									<div class="progress">
										<div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-md-2 text-right">
									<strong>6.7</strong>
								</div>
							</div>

							<div class="story-score-info row align-middle">
								<div class="col-md-4 text-left">
									Chất lượng
								</div>
								<div class="col-md-6">
									<div class="progress">
										<div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="7.2" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-md-2 text-right">
									<strong>7.2</strong>
								</div>
							</div>
						</div>
						<div class="place-total text-center">
							<span class="place-total-score color-green">7.4</span> điểm -
							<span class="place-total-rate">Khá tốt</span>
						</div>
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

	<?php
	endwhile; // End of the loop.
	?>
</div>

<?php get_footer();
