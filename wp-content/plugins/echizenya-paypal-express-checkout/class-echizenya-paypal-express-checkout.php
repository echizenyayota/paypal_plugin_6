<?php
class Echizenya_PayPal_Express_Checkout {
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
        'paypal-settings-group',
        array( $this, 'create_admin_page' )
    );
  }
  public function create_admin_page() {
    // paypal_option_nameをoptionsのプロパティとする
    $this->options = get_option( 'echizenya_paypal_express_checkout' );
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
    // Option groupとOption nameの登録
    register_setting(
        'paypal-settings-group', // Option group
        'paypal_option_name', // Option name
        array( $this, 'sanitize' ) // Sanitize
    );
    add_settings_section(
      'setting_section_id', // ID
      'PayPal ExpressCheckout Settings', // Title
      array( $this, 'print_section_info' ), // Callback
      'paypal-settings-group' // Page
    );
    add_settings_field(
      'env', // ID
      'Enviroment', // Title
      array( $this, 'enviroment_callback' ), // Callback
      'paypal-settings-group', // Page
      'setting_section_id' // Section
    );
    add_settings_field(
      'client', // ID
      'cleint ID', // Title
      array( $this, 'client_callback' ), // Callback
      'paypal-settings-group', // Page
      'setting_section_id' // Section
    );
  }
  // 入力項目のサニタイズ
  public function sanitize( $input ) {
    $new_input = array();
    if( isset( $input['client'] ) ) {
      $new_input['client'] = sanitize_text_field( $input['client'] );
    }
    return $new_input;
  }
  // 記入案内の文字列を表示
  public function print_section_info() {
    print 'Enter your settings below:';
  }
  // 実行環境の選択
  public function enviroment_callback() {
    ?>
      <p>
        <select name="env" size="1">
          <option value="sandbox">sandbox</option>
          <option value="production">production</option>
        </select>
      </p>
    <?php
  }
  // client IDの入力
  public function client_callback() {
    printf(
            '<input type="text" id="title" name="paypal_option_name[client]" size="90" value="%s" />',
            isset( $this->options['client'] ) ? esc_attr( $this->options['client']) : ''
          );
  }
}
require(__DIR__ . '/PayPal_ExpressCheckout_admin.php');
