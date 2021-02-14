<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no">
  <meta name="format-detection" content="telephone=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Browsers -->
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <meta name="author" content="<?php wp_title('') ?>">
  <meta name="robots" content="index,follow">
  <meta name="geo.placename" content="Buenos Aires">
  <meta name="geo.region" content="AR">

  <!-- Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?php wp_title('') ?>">
  <meta property="og:title" content="<?php wp_title('') ?>">
  <meta property="og:description" content="<?php if (!is_single()): echo get_bloginfo('description'); else: echo wp_strip_all_tags( get_the_excerpt(), true ); endif; ?>">
  <meta property="og:image" content="<?php if (!is_single()): echo get_template_directory_uri() . '/metaimg.jpg'; else: echo the_post_thumbnail_url('large'); endif; ?>">
  <meta property="og:url" content="<?php echo get_site_url(); ?>">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="">
  <meta property="twitter:title" content="<?php wp_title('') ?>">
  <meta property="twitter:description" content="<?php if (!is_single()): echo get_bloginfo('description'); else: echo wp_strip_all_tags( get_the_excerpt(), true ); endif; ?>">
	<meta property="twitter:image" content="<?php if (!is_single()): echo get_template_directory_uri() . '/metaimg.jpg'; else: echo the_post_thumbnail_url('large'); endif; ?>">
  <meta property="twitter:url" content="<?php echo get_site_url(); ?>">

  <!-- NOTE: Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700;900&family=Source+Sans+Pro:wght@300;600&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if(!is_front_page()): ?>
  <nav class="navigation">
    <div class="navigation__wrapper wrapper air">
      <span <?php if(is_checkout()): ?>class="navigation__back modal__trigger" data-modal="backAlert"<?php else: ?>class="navigation__back" onclick="history.back();"<?php endif; ?>><i class="icon-arrow-back"></i></span>
      <a href="<?php echo get_site_url(); ?>" class="navigation__logo" title="Ir al inicio">
        <picture>
          <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/logo-sm.svg" media="(max-width: 640px)">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/logo.svg" alt="Quadritos logo" class="">
        </picture>
      </a>
      <span class="navigation__trigger"><i class="icon-bars"></i></span>
			<?php wp_nav_menu(array( 'menu' => 'Nav', 'container' => '', 'menu_class' => 'navigation__menu' )); ?>
    </div>
  </nav>

  <div class="space"></div>
<?php endif; ?>
