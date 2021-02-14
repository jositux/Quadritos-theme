<?php
get_header();
?>

<div class="container">
	<div class="wrapper wrapper_sm air air_horz">
		<?php	while ( have_posts() ): the_post(); ?>
			<h3 class="primary">
        <?php the_title(); ?>
      </h3>
			<?php the_content(); ?>
		<?php	endwhile; ?>
	</div>
</div>

<?php
get_footer();
