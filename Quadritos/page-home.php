<?php
get_header();
$encabezado = get_field('encabezado');
$feed = get_field('feed');
 ?>

	<div class="hero">
		<div class="hero__wrapper wrapper air">
			<div class="hero__column">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/logo-full.svg" alt="Quadritos logo" class="hero__logo hero__logo_desktop">
				<div class="text__container">
					<?php if($encabezado['titulo']):?><h2 class="text primary"><?php echo $encabezado['titulo']; ?></h2><?php endif; ?>
					<?php if($encabezado['bajada']): echo $encabezado['bajada']; endif; ?>
					<a href="<?php echo get_permalink(get_page_by_path( 'paso-1' )); ?>" class="cta cta_desktop">¡Pedí tus cuadros!</a>
				</div>
				<?php if($encabezado['beneficios']): echo $encabezado['beneficios']; endif; ?>
				<div class="hero__actions">
					<a href="<?php echo get_permalink(get_page_by_path( 'paso-1' )); ?>" class="cta">¡Pedí tus cuadros!</a>
				</div>
			</div>
			<div class="hero__column">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/logo.svg" alt="Quadritos logo" class="hero__logo hero__logo_mobile">
				<?php if($encabezado['video']):?>
				<div class="hero__video">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholder.png" alt="" class="bgImage">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ui/ic_play.png" alt="" class="hero__trigger">
				</div>
        <div class="hero__popup">
          <div class="hero__popupContainer">
            <div class="hero__popupClose"><i class="icon-close"></i></div>
            <iframe class="hero__iframe" src="https://www.youtube.com/embed/<?php echo $encabezado['video']; ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container container_swiper container_primary">
		<div class="wrapper air">
			<?php if($feed['titulo']):?><h2 style="max-width: 480px;"><?php echo $feed['titulo']; ?></h2><?php endif; ?>
			<?php if($feed['bajada']):?><p class="text text_xl"><?php echo $feed['bajada']; ?></p><?php endif; ?>
			<?php if ($feed['review']): ?>
				<div class="swiper-box">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php foreach ($feed['review'] as $review):?>
								<div class="swiper-slide feed">
									<div class="feed__img">
										<?php echo wp_get_attachment_image( $review['imagen'], 'large', false, array( 'class' => 'bgImage' ) ); ?>
									</div>
									<div class="feed__info">
										<span>@<?php echo $review['usuario']['nombre']; ?></span>
										<p><?php echo $review['usuario']['comentario']; ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-pagination pagination-white"></div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>
