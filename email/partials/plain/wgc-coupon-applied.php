<?php

/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/customer-new-account.php.
 *
 * HOWEVER, on occasion WooGiftCard will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package Woo_gift_card/Emails/Partials
 * @version 1.0
 */
defined('ABSPATH') || exit;

echo str_repeat("=-", 20) . "=" . PHP_EOL;
echo esc_html(wp_strip_all_tags($email_heading));
echo PHP_EOL . str_repeat("=-", 20) . "=" . str_repeat(PHP_EOL, 2);

echo sprintf(esc_html__('Hi %s,', $plugin_name), esc_html($recipient)) . str_repeat(PHP_EOL, 2);
/* translators: %1$s: Coupon Sender, %2$s: Site title, %3$s: My account link */
echo sprintf(esc_html__('Just to let you know &mdash; your gift voucher %1$s has been applied on %2$s and you can view more details at %3$s', $plugin_name), '<strong>' . esc_html(wc_format_coupon_code($coupon_code)) . '</strong>', esc_html($blogname), make_clickable(esc_url(wc_get_page_permalink('myaccount'))));

echo str_repeat(PHP_EOL, 2) . str_repeat("-", 40) . str_repeat(PHP_EOL, 2);

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ($additional_content) {
    echo esc_html(wp_strip_all_tags(wptexturize($additional_content)));
    echo str_repeat(PHP_EOL, 2) . str_repeat("-", 40) . str_repeat(PHP_EOL, 2);
}

echo wp_kses_post(apply_filters('woocommerce_email_footer_text', get_option('woocommerce_email_footer_text')));
