<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>
<div class="woocommerce-form-coupon-toggle wrapper wrapper_sm air air_horz">
	<div class="woocommerce-form-coupon-card">
		<?php wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', '<b class="title">¿Tenés un cupón?</b><br> <a href="#" class="showcoupon">Hacé click acá para usarlo.</a>' ), 'notice' ); ?>
		<form class="checkout_coupon woocommerce-form-coupon form" method="post" style="display:none">

			<p class="form__group form__group_first">
				<label for="coupon_code"><?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?></label>
				<input type="text" name="coupon_code" class="input-text form__input" id="coupon_code" value="" />
			</p>

			<p class="form__group form__group_last">
				<button type="submit" class="button cta" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">Aplicar</button>
			</p>

			<div class="clear"></div>
		</form>
	</div>
</div>
