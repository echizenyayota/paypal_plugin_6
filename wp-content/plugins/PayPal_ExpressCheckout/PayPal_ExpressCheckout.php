<?php
/**
 * @package express
 */
/*
Plugin Name: PayPal Express Checkout
Plugin URI: https://example.com
Description: PayPal Express Checkout
Version: 0.0.0
Author: echizenya
Author URI: https://e-yota.com
License: GPLv2 or later
Text Domain: paypal_expresscheckout
*/

class PayPal_ExpressCheckout {

  // プロパティ
  private $options;

  // コンストラクタ
  public function __construct() {
    add_action( 'admin_menu', array($this, 'paypalexpresscheckout_add_admin_menu') );
    add_action( 'admin_init', array( $this, 'paypal_init' ) );
  }

  // ダッシュボードにサブメニューを表示するメソッド
  public function paypalexpresscheckout_add_admin_menu() {
      add_options_page(
        'Settings Admin',
        'PayPal ExpressCheckout',
        'manage_options',
        'my-setting-admin',
        array( $this, 'create_admin_page' )
    );
  }

  public function create_admin_page() {
    // paypl_option_nameをoptionsのプロパティとする
    $this->options = get_option( 'paypl_option_name' );
    ?>
    <div class="wrap">
       <h2>PayPal ExpressCheckout Settings</h2>
       <form method="post" action="options.php">
         <?php settings_fields( 'paypal-settings-group' ); ?>
         <?php do_settings_sections( 'paypal-settings-group' ); ?>
         <?php submit_button(); ?>
       </form>
    </div>
    <?php
  }

  public function paypal_init() {
    register_setting(
      'paypal-settings-group', // Option group
      'paypl_option_name', // Option name
      array( $this, 'sanitize' ) // Sanitize
    );

    add_settings_section(
      'setting_section_id', // ID
      'My Custom Settings', // Title
      array( $this, 'print_section_info' ), // Callback
      'paypal-settings-group' // Page
    );

  }

  public function print_section_info() {
    print 'Enter your settings below:';
  }


}

require(__DIR__ . '/PayPal_ExpressCheckout_admin.php');
