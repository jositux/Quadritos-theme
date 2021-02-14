	<?php
	$homeID = get_option('page_on_front');
	$redes_sociales = get_field('redes_sociales', $homeID);

	if (is_front_page()): ?>
    <footer class="footer">
      <div class="footer__wrapper wrapper air">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/logo-sm.svg" alt="" class="footer__logo">
				<?php wp_nav_menu(array( 'menu' => 'Nav', 'container' => '', 'menu_class' => 'footer__menu' )); ?>
        <div class="footer__social">
          <?php if($redes_sociales['facebook']): ?><a href="<?php echo $redes_sociales['facebook']; ?>" target="_blank"><i class="icon-facebook"></i></a><?php endif; ?>
          <?php if($redes_sociales['instagram']): ?><a href="<?php echo $redes_sociales['instagram']; ?>" target="_blank"><i class="icon-instagram"></i></a><?php endif; ?>
        </div>
      </div>
    </footer>
	<?php endif; wp_footer();?>

  </body>
</html>
