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
					<div class="nav-location">
						<button class="button dropdown hollow button-s1" type="button">TP. HCM</button>
					</div>
					<div class="nav-location">
						<button class="button dropdown hollow button-s1" type="button">Tham quan</button>
					</div>
					<div class="nav-search">
						<div class="search">
							<form>
								<input type="text" id="pkeywords" class="form-input" placeholder="Địa điểm, món ăn, loại hình...">
								<span class="input-group-btn">
									<button type="" class="btn btn-search">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</form>
						</div>
					</div>
					<div class="nav-user">
						<div class="nav-user-btn">
								<div class="nav-user-name">Đăng nhập</div>
						</div>
					</div>
					<div class="nav-functions">
						<div class="button-s2" >
							<span class="input-group-btn">
								<button type="" class="btn btnradius">
									<i class="fa fa-plus"></i>
								</button>
							</span>
						</div>
					</div>
					<div class="nav-language">
						<button class="button">
							<img src="<?php echo get_theme_file_uri("images/vn.png") ?>" width="20">
						</button>
					</div>
				</div>
			</div>
		</header>

		<div class="site-content-contain">
			<div id="content" class="site-content">
