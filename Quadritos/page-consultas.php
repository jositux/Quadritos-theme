<?php
get_header();
?>

<div class="container">
	<div class="wrapper wrapper_sm air air_horz">
		<h3 class="stepTitle primary">
			Comunicate con nostros
		</h3>
		<p class="text">
			Te vamos a responder lo antes posible.
		</p>
		<?php echo do_shortcode('[contact-form-7 id="909" x4 title="Consultas form" html_class="form form_consultas"]'); ?>
		<div class="banner banner_sideImage">
			<div class="banner__content">
				<p class="title primary">
					También podés consultar las preguntas frecuentes
				</p>
				<p>
					Si tenés alguna duda sobre nuestro servicio ahí vas a encontrar más información.
				</p>
				<a href="<?php echo get_permalink( get_page_by_path( 'preguntas-frecuentes' ) ) ?>" class="banner__link"><i class="icon-question"></i> Ver FAQs</a>
			</div>
			<div class="banner__img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/illus-3.png" alt="¿Todavía tenés dudas?">
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
