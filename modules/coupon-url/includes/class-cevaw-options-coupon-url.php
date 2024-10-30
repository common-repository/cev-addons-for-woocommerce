<?php
/**
 * Opções para o módulo coupon-url
 */

if (!defined('ABSPATH'))
  exit;

class CEVAW_Options_Coupon_URL {
	
	public $cevaw_coupon_url;
	
	public function __construct()
	{
		if (isset($_GET['post'])) {
			$this->cevaw_coupon_url = get_option( 'cevaw_coupon_url', true );
			add_action( 'woocommerce_coupon_data_panels', array($this, 'add_help'), 10 );
			add_filter( 'woocommerce_coupon_data_tabs', array($this, 'coupon_data_tabs') );
		}
	}
	
	public function coupon_data_tabs($tabs) {
?>
<style>
	.cevaw_coupon-url_options a::before {
		font-family: "WooCommerce" !important;
		content: "\e030" !important;
	}
</style>
<?php
		$tabs['cevaw_coupon-url'] = array(
			'label'  => __( 'CEV URL', 'cev-addons-for-woocommerce' ),
			'target' => 'cevaw_coupon-url',
			'class'  => 'cevaw_coupon-url',
		);

		return $tabs;
	}
	
	// Adiciona ajuda na página de configuração de cupons
	public function add_help($post_id) {
		if (isset($this->cevaw_coupon_url['coupon_code'])) {
			$value = $this->cevaw_coupon_url['coupon_code'];
		} else {
			$value = 'cod_cupom';
		}
		
		$coupon = new \WC_Coupon( $_GET['post'] );
		$coupon_code = $coupon->code;
?>
<div id="cevaw_coupon-url" class="panel woocommerce_options_panel">
<div class="options_group">
<p class="form-field cevaw_coupon-url_field">
<label>Funcionamento</label>
<strong>
<?php echo wp_kses_post( __( 'Exemplo de uso<br>', 'cev-addons-for-woocommerce' ) ); ?>
</strong>
<?php echo wp_kses_post( __( 'Segue um exemplo de URL que aponta para a home e carrega o cupom automaticamente.', 'cev-addons-for-woocommerce' ) ); ?>
<br>
<a href="<?php echo esc_url( get_home_url() . '/?' . $value . '=' . $coupon_code ); ?>" target="_blank"><?php echo esc_url( get_home_url() . '/?' . $value . '=' . $coupon_code ); ?></a><br>
<?php echo wp_kses_post( __( 'Você pode usar o recurso em qualquer URL do site, basta adicionar <b>' . '/?' . $value . '=' . $coupon_code .'</b> ao final da URL.', 'cev-addons-for-woocommerce' ) ); ?><br>
</p>
</div>
</div>
<?php
	}
}

new CEVAW_Options_Coupon_URL();