<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.3
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>
	<?php if ( WC()->cart->needs_payment() ) : ?>
    <div id="paymentCard" class="card card_loadable">
      <i class="icon-credit-card"></i>
      <div class="card__value">
        <span class="label">Método de pago</span>
        <span class="value"></span>
      </div>
      <a href="" class="card__trigger modal__trigger" data-modal="paymentForm"><i class="icon-edit"></i> <span>Cambiar</span></a>
    </div>

		<div id="paymentForm" class="modal__container">
	    <div class="modal modal_form">
	      <div class="modal__header">
	        <span class="modal__action modal__action_close"><i class="icon-close"></i></span>
	        <h4>Método de pago</h4>
	        <span class="modal__action modal__action_ok"><i class="icon-ok"></i></span>
	      </div>
	      <div class="modal__body">
					<div class="modal__content">
						<ul class="wc_payment_methods payment_methods methods">
							<?php
							if ( ! empty( $available_gateways ) ) {
								foreach ( $available_gateways as $gateway ) {
									wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
								}
							} else {
								echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
							}
							?>
						</ul>
					</div>
	      </div>
	    </div>
	  </div>
	<?php endif; ?>
	<div class="fixedActions fixedActions_reverse">
		<div class="fixedActions__wrapper wrapper wrapper_sm">
			<noscript>
				<?php
				/* translators: $1 and $2 opening and closing emphasis tags respectively */
				printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
				?>
				<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
			</noscript>
			<div class="fixedActions__col">
				<a href="" class="cta cta_icon modal__trigger" data-modal="deleteCart"><i class="icon-delete"></i> Borrar pedido</a>
			</div>
			<div class="fixedActions__col">
				<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

				<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="cta cta_toChekout is-disabled" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

				<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

				<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
			</div>
		</div>
	</div>

	<div id="deleteCart" class="modal__container">
    <div class="modal">
      <div class="modal__header">
        <h4>Cancelar pedido</h4>
      </div>
      <div class="modal__body">
        <div class="modal__content">
					<img class="responseImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/faces-1.png" alt="">
          <p>
						Vas cancelar tu pedido, esto eliminará las fotos que cargaste y vas a tener que volver a empezar desde el principio la próxima vez. <br><br>
            <b>¿Estás seguro?</b>
          </p>
        </div>
        <div class="modal__buttons">
          <a href="#" class="cta cta_icon modal__action_close"><i class="icon-arrow-back"></i> Continuar el pedido</a>
          <a id="remove__all" href="#" class="cta">Borrar todo</a>
        </div>
      </div>
    </div>
  </div>
<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
