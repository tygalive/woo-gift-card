<?php

/**
 * Product general data panel.
 *
 * @package WooCommerce/Admin
 * @global \WGC_Product $product
 */
defined('ABSPATH') || exit;
?>
<div id="wgc-general" class="panel woocommerce_options_panel">
	<div class="options_group show_if_woo-gift-card">

		<?php
		woocommerce_wp_text_input(array(
			'id' => 'wgc-cart-min',
			'value' => $product->get_coupon_cart_min("edit"),
			'data_type' => 'price',
			'label' => __('Cart Total Minimum', $plugin_name) . ' (' . get_woocommerce_currency_symbol() . ') ',
			'description' => __('The minimum monetary value of customer\'s cart before gift voucher can be applied', $plugin_name),
			'desc_tip' => true
		));

		woocommerce_wp_text_input(array(
			'id' => 'wgc-cart-max',
			'value' => $product->get_coupon_cart_max("edit"),
			'data_type' => 'price',
			'label' => __('Cart Total Maximum', $plugin_name) . ' (' . get_woocommerce_currency_symbol() . ') ',
			'description' => __('The maximum monetary value of customer\'s cart the gift voucher can be applied to', $plugin_name),
			'desc_tip' => true
		));
		?>
	</div>
	<div class="options_group show_if_woo-gift-card">

		<?php
		woocommerce_wp_checkbox(array(
			'id' => 'wgc-individual',
			'label' => __('Individual use only', $plugin_name),
			'description' => __('Check this box if the coupon cannot be used in conjunction with other coupons.', $plugin_name),
			'value' => $product->get_coupon_individual("edit") ?: "no"
		));

		woocommerce_wp_checkbox(array(
			'id' => 'wgc-sale',
			'label' => __('Exclude sale items', $plugin_name),
			'description' => __('Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are items in the cart that are not on sale.', $plugin_name),
			'value' => $product->get_coupon_sale("edit") ?: "no"
		));

		woocommerce_wp_checkbox(array(
			'id' => 'wgc-free-shipping',
			'label' => __('Allow free shipping', $plugin_name),
			'description' => sprintf(__('Check this box if the coupon grants free shipping. A <a href="%s" target="_blank">free shipping method</a> must be enabled in your shipping zone and be set to require "a valid free shipping coupon" (see the "Free Shipping Requires" setting).', 'woocommerce'), 'https://docs.woocommerce.com/document/free-shipping/'),
			'value' => $product->get_coupon_free_shipping("edit") ?: "no"
		));
		?>
	</div>
	<div class="options_group show_if_woo-gift-card">
		<?php
		woocommerce_wp_text_input(array(
			'id' => 'wgc-limit-usage-to-x-items',
			'value' => $product->get_coupon_limit_usage_to_x_items('edit'),
			'label' => __('Limit usage to X items', $plugin_name),
			'description' => __('The maximum number of individual items this coupon can apply to when using product discounts. Leave blank to apply to all qualifying items in cart.', $plugin_name),
			'desc_tip' => true,
			'custom_attributes' => array(
				"min" => 0
			),
			'type' => "number",
		));

		woocommerce_wp_text_input(array(
			'id' => 'wgc-usage-limit',
			'value' => $product->get_coupon_usage_limit('edit'),
			'label' => __('Usage limit per coupon', $plugin_name),
			'description' => __('How many times a coupon can be used before its void.', $plugin_name),
			'desc_tip' => true,
			'custom_attributes' => array(
				"min" => 0
			),
			'type' => "number",
		));

		woocommerce_wp_text_input(array(
			'id' => 'wgc-usage-limit-per-user',
			'value' => $product->get_coupon_usage_limit_per_user('edit'),
			'label' => __('Usage limit per user', $plugin_name),
			'description' => __('How many times this coupon can be used by an individual user. Uses billing email for guests, and user ID for logged in users.', $plugin_name),
			'desc_tip' => true,
			'custom_attributes' => array(
				"min" => 0
			),
			'type' => "number",
		));
		?>
	</div>
	<div class="options_group show_if_woo-gift-card">
		<?php
		woocommerce_wp_checkbox(array(
			'id' => 'wgc-schedule',
			'label' => __('Gift Voucher Scheduling', $plugin_name),
			'description' => __('A customer can set a date to send coupon on front end during purchase.', $plugin_name),
			'value' => $product->get_coupon_schedule('edit')
		));

		woocommerce_wp_text_input(array(
			'id' => 'wgc-expiry-days',
			'value' => $product->get_coupon_expiry_days('edit') ?: 5,
			'label' => __('Expiry Days', $plugin_name),
			'description' => __('The number of days after purchase that a gift voucher will become invalid. Expiring at 00:00:00 of the last day.', $plugin_name),
			'desc_tip' => true,
			'custom_attributes' => array(
				"min" => 1
			),
			'type' => "number",
		));
		?>
	</div>

	<?php do_action('wgc_product_coupon_options'); ?>

</div>