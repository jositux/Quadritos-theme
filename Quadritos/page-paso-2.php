<?php
get_header();
?>

<div class="container container_gray">
	<div class="wrapper wrapper_sm air air_horz">
		<span class="steper">2/4</span>
		<h3 class="stepTitle primary">
			Contanos un poco de vos
		</h3>
		<div class="card__container">
			<div class="card card_desktop">
				<?php echo do_shortcode('[contact-form-7 id="401" title="Quadritos form" html_class="form"]'); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
