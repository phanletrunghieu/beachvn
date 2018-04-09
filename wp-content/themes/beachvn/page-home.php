<?php get_header(); ?>

<section id="slider" class="clearfix">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo get_theme_file_uri("images/foody-18-636352829980339902.png") ?>" alt="Slider">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo get_theme_file_uri("images/foody-6-636352828379621090.png") ?>" alt="">
      </div>
    </div>

    <!-- Controls -->
    <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
</section>

<section class="feature section top">
  <div class="container">
    <div>
      <div class="tripnow-quote text-center">
        <a href="/">GoNow.vn</a> - Điểm khởi đầu của mọi hành trình
      </div>
      <h2 class="section-title text-center">
            Địa điểm nổi bật
        </h2>
    </div>
    <div class="row">
        <?php
        $terms=get_place_categories();
        foreach ($terms as $term) {
          $term_link = get_term_link( $term );
          $image = get_field("image", $term->taxonomy."_".$term->term_id);
        ?>
          <div class="col-sm-3">
            <div class="feature-item embed">
                <a href="<?php echo esc_url($term_link) ?>" class="link-absolute"></a>
                <div class="embed-item">
                  <img src="<?php echo $image; ?>" alt="">
                </div>
                <div class="feature-info">
                  <div class="text-center">
                    <div class="feature-name"><?php echo $term->name; ?></div>
                    <div class="feature-meta"><?php echo $term->count ?> địa điểm</div>
                  </div>
                </div>
              </div>
          </div>
        <?php
        }
        ?>
    </div>
    <div class="feature-place">
      <div class="row">
        <div class="col-md-5 cell">
            <a class="feature-place-tag">Địa điểm hot trong tháng</a>
            <h3 class="feature-place-name">Tháng bốn đưa nhau đi trốn 10 địa điểm hot nhất Việt Nam</h3>
            <p>
                Tháng 4 đến là tháng báo hiệu mùa hè, cũng là tháng tuyệt vời cho những chuyến đi. Tháng 4 này bạn đi đâu? Cùng Tripnow tham khảo danh sách những địa điểm hot nhất trong tháng 4 này nhé!
            </p>
            <div>
                <a href="/bai-viet/thang-bon-dua-nhau-di-tron-10-dia-diem-hot-nhat-viet-nam-10025" class="button btnxemthem primary large warning">Xem thêm</a>
            </div>
        </div>
        <div class="col-md-6">
          <div class="feature-place-video">
                    <div class="embed video">
                        <iframe width="560" height="315"
                          src="https://www.youtube.com/embed/0Z-DnpbtKsU?rel=0&controls=0&showinfo=0">
                        </iframe>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="topmember-container">
  <div class="container">
    <h3 class="topmember-title">Top Thành viên</h3>
    <div class="topmenber">
      <?php
      $top_users=get_top_users();
      foreach ($top_users as $user) {
      ?>
      <div class="topmember-item">
        <a class="link-absolute"></a>
        <div class="topmember-img">
          <i class="fa fa-check icon"></i>
          <div class="topmember-img-place">
            <img alt="<?php echo $user->data->display_name ?>" src="<?php echo get_user_avatar($user->data->user_email, 60) ?>">
          </div>
        </div>
        <div><?php echo $user->data->display_name ?></div>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>

<section class="road-container">
  <div class="road">
    <div class="road-bg"></div>
    <div class="road-vehicle">
      <img src="<?php echo get_theme_file_uri("images/bus.png") ?>" alt=""/>
      <div class="road-vehicle-wheel">
        <img src="<?php echo get_theme_file_uri("images/wheel.png") ?>" alt="">
      </div>
      <div class="road-vehicle-wheel right">
        <img src="<?php echo get_theme_file_uri("images/wheel.png") ?>" alt="">
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
