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

// checkout.jsの読み込み
function epec_paypal_scripts() {
  wp_enqueue_script( 'paypal-checkout', 'https://www.paypalobjects.com/api/checkout.js' );
}
add_action( 'wp_enqueue_scripts', 'epec_paypal_scripts' );
// ショートコードとオプションによるPayPalボタンの表示
function epec_paypaldiv_func( $atts ){
  $config = shortcode_atts( array(
    'id' => '',
    'total' => '0',
		'currency' => '',
    'color' => '',
		'size' => '',
	), $atts );
  // id、価格、通貨のいずれかがない場合は実行終了
  if ( !$config['id'] || $config['total'] === '0' || !$config['currency'] ) return;
  // 実行環境の切り替え
  if( 'sandbox' === get_option('env')) {
    // テスト環境
    $dev = "'sandbox'";
    $clientid = get_option('client');
    $token = "sandbox: '{$clientid}'";
  } elseif( 'production' === get_option('env')) {
    // 本番環境
    $dev = "'production'";
    $clientid = get_option('client');
    $token = "production: '{$clientid}'";
  } else {
    return;
  }
  $paypaldiv = '<div id="' . $config['id'] . '"></div>';
  $paypaldiv .= "<script>
		paypal.Button.render({
			env: {$dev},
			client: {
				{$token},
			},
			style: {
				color: '$config[color]',
				size: '$config[size]',
			},
			commit: true,
			payment: function(data, actions) {
				return actions.payment.create({
					payment: {
						transactions: [{
							amount: { total: '$config[total]', currency: '$config[currency]' }
						}]
					}
				});
			},
			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function() {
					window.alert('Payment Complete!');
				});git
			}
		}, '#$config[id]');
	</script>";
  // スクリプトの記述が表示される
  return $paypaldiv;
}
add_shortcode( 'paypaldiv', 'epec_paypaldiv_func' );
