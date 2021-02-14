<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20 );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="container container_flex">
	<div class="wrapper wrapper_sm air air_horz">
		<span class="steper">4/4</span>
		<h3 class="stepTitle primary">
			Confirmá tu pedido
		</h3>
	</div>

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

		<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div class="card__container card__container_order">
      <div class="wrapper wrapper_sm air air_horz">
        <div  id="order_review" class="woocommerce-checkout-review-order card card_desktop">
          <p class="title">
            Detalle de tu pedido
          </p>
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
		</div>

		<?php if ( $checkout->get_checkout_fields() ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="card__container card__container_payment">
	      <div class="wrapper wrapper_sm air air_horz">
	        <div id="addressCard" class="card card_loadable">
	          <i class="icon-truck"></i>
	          <div class="card__value">
	            <span class="label">Información de envío</span>
	            <span class="value"></span>
	          </div>
	          <a href="#" class="card__trigger modal__trigger" data-modal="addressForm"><i class="icon-edit"></i> <span>Cambiar</span></a>
	        </div>
					<div id="addressForm" class="modal__container">
  					<div class="modal modal_form">
  						<div class="modal__header">
  							<span class="modal__action modal__action_close"><i class="icon-close"></i></span>
  							<h4>Información de envío</h4>
  							<span class="modal__action modal__action_ok"><i class="icon-ok"></i></span>
  						</div>
  						<div class="modal__body">
  							<div class="modal__content">
  							    <div class="shipping-options">
									<?php wc_cart_totals_shipping_html(); ?>
								</div>
  								<?php do_action( 'woocommerce_checkout_billing' ); ?>
                                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
  							</div>
  						</div>
  					</div>
  				</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	      </div>
	    </div>

		<?php endif; ?>

	</form>

	<div id="backAlert" class="modal__container">
    <div class="modal">
      <div class="modal__header">
        <h4>Atención</h4>
      </div>
      <div class="modal__body">
        <div class="modal__content">
					<img class="responseImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/faces-3.png" alt="">
          <p>
						Si volvés al paso anterior, el proceso de compra se reiniciará y deberás volver a elegir las imágenes.<br><br>
            <b>¿Estás seguro?</b>
          </p>
        </div>
        <div class="modal__buttons">
          <a class="cta cta_icon modal__action_close"><i class="icon-arrow-back"></i> Continuar con el pedido</a>
          <a onclick="history.back();" class="cta">Volver</a>
        </div>
      </div>
    </div>
  </div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

</div>
