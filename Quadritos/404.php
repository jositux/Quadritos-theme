<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<div class="container container_flex container_ticket">
	<div class="wrapper wrapper_sm air air_horz center">
		<div class="error-404 not-found">
			<img class="responseImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/faces-3.png" alt="">
      <h3 class="stepTitle primary">No esperábamos verte por acá</h3>
			<p>No hay nada que ver acá pero podés ir a nuestra home y conocernos.</p>
		</div>
		<a href="" class="cta cta_icon"><i class="icon-home"></i> Volver a la home</a>
	</div>
</div>

<?php
get_footer();
