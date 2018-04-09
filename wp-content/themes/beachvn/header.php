<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">

		<header>
			<div class="grid-container">
				<div class="nav">
					<div class="nav-logo">
						<a href="/"><span class="logo"></span></a>
					</div>
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<select class="custom-select" name="place_category">
							<?php
							$terms=get_place_categories();
							foreach ($terms as $term) {
							?>
							<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
							<?php
							}
							?>
						</select>
						<div class="search">
							<input type="text" id="search-input" name="s" class="form-input" placeholder="Địa điểm...">
							<input type="hidden" name="post_type" value="place">
							<span class="input-group-btn">
								<button type="" class="btn btn-search">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
					<div class="nav-user">
						<?php
						if (!is_user_logged_in()) {
						?>
							<div class="nav-user-btn">
								<a href="<?php echo wp_login_url( get_permalink() ); ?>" class="nav-user-name">Đăng nhập</a>
							</div>
						<?php
						} else {
							$user = wp_get_current_user();
						?>
							<div class="nav-user-btn" id="dropdown-menu-login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="nav-user-name"><?php echo $user->display_name; ?></div>
								<div class="avatar">
									<img src="<?php echo get_user_avatar($user->user_email) ?>" alt="Phan Hiếu">
								</div>
							</div>
							<div class="dropdown-menu" aria-labelledby="dropdown-menu-login">
						    <a class="dropdown-item" href="<?php echo wp_logout_url( get_permalink() ); ?>">Đăng xuất</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</header>

		<div id="content" class="site-content">
