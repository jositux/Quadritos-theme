<?php
get_header();
?>

<div class="container container_gray">
	<div class="wrapper wrapper_sm air air_horz">
		<span class="steper">1/4</span>
		<h3 class="stepTitle primary">
			¿Para quién es?
		</h3>
		<div class="card__container">
			<a href="<?php echo get_permalink(get_page_by_path( 'paso-2' )); ?>?regalo=0" class="card card_md">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/illus-1.png" alt="Ilustración de mujer colgando sus Quadritos">
				<span class="card__text">
					<span class="title primary">Para mí</span>
					<p class="text">Estoy decorando mis paredes.</p>
				</span>
			</a>
			<a href="<?php echo get_permalink(get_page_by_path( 'paso-2' )); ?>?regalo=1" class="card card_md">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/illus-2.png" alt="Ilustración de mujer colgando sus Quadritos">
				<span class="card__text">
					<span class="title primary">Para otra persona</span>
					<p class="text">Quiero hacer un regalo.</p>
				</span>
			</a>
		</div>
	</div>
</div>

<?php
get_footer();
