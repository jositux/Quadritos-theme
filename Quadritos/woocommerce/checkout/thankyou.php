<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="container container_flex">
	<div class="wrapper wrapper_sm air air_horz center">
		<?php
		if ( $order ) :

			do_action( 'woocommerce_before_thankyou', $order->get_id() );
			?>

			<?php if ( $order->has_status( 'failed' ) ) : ?>

				<img class="responseImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/faces-3.png" alt="">
				<h3 class="stepTitle primary">
					¡Oops! Algo salió mal
				</h3>
				<p class="text">
					<?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
				</p>
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="cta cta_icon pay"><i class="icon-imagen"></i>  Reintentar pedido</a>

			<?php else : ?>
			<img class="responseImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/faces-2.png" alt="">
			<h3 class="stepTitle primary">
				¡Gracias por tu compra!
			</h3>
			<p class="text">
				Recibimos tu pedido
			</p>
			<div class="card card_ticket">
				<div class="table">
					<div class="table__row">
						<div class="table__col">
							<span class="label">Número de pedido</span>
							<span class="value"><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						</div>
					</div>
					<div class="table__row">
						<div class="table__col">
							<span class="label">Fecha del pedido</span>
							<span class="value"><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						</div>
					</div>
					<div class="table__row">
						<?php if ( $order->get_payment_method_title() ) : ?>
						<div class="table__col table__col_md">
							<span class="label">Método de pago</span>
							<span class="value"><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></span>
						</div>
						<?php endif; ?>
						<div class="table__col table__col_md">
							<span class="label">Total</span>
							<span class="value"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						</div>
					</div>
				</div>
			</div>
			<p class="text">
				Vas a recibir un mail con el detalle de tu pedido al mail que cargaste.
			</p>
			<a href="<?php echo get_site_url(); ?>" class="cta cta_icon"><i class="icon-home"></i> Volver a la home</a>
			<?php endif; ?>
		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

		<?php endif; ?>
	</div>
</div>
