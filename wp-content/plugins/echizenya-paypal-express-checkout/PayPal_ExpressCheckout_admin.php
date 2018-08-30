<?php
/**
 * @package express
 */
/*
Plugin Name: Echizenya PayPal Express Checkout
Plugin URI: https://example.com
Description: PayPal Express Checkout
Version: 0.0.0
Author: echizenya
Author URI: https://e-yota.com
License: GPLv2 or later
Text Domain: paypal_expresscheckout
*/
if( is_admin() ){
  $pypl_expr = new PayPal_ExpressCheckout();
}
