<?php
/**
 * @package Echizenya PayPal Express Checkout
 */
/*
Plugin Name: Echizenya PayPal Express Checkout
Plugin URI: https://example.com
Description: PayPal Express Checkout
Version: 0.0.0
Author: echizenya
Author URI: https://e-yota.com
License: GPLv2 or later
Text Domain: echizenya_paypal_express_checkout
*/

require(__DIR__ . '/class-echizenya-paypal-express-checkout.php');

if( is_admin() ){
  $pypl_expr = new Echizenya_PayPal_Express_Checkout();
}
