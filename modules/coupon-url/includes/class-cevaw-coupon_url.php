<?php
/**
 * Carregamento no site - módulo coupon_url
 */
if (!defined('ABSPATH'))
  exit;

class CEVAW_Coupon_URL {
	
	public $cevaw_coupon_url;
	public $cevaw_coupon_code;
	
	public function __construct()
	{
		$this->cevaw_coupon_url = get_option( 'cevaw_coupon_url', true );
		if (isset($this->cevaw_coupon_url['coupon_code'])) {
			$this->cevaw_coupon_code = $this->cevaw_coupon_url['coupon_code'];
		} else {
			$this->cevaw_coupon_code = 'cod_cupom';
		}
		
		add_action( 'init', array($this, 'get_custom_cevaw_coupon_code_to_session') );
		add_action( 'woocommerce_before_checkout_form', array($this, 'add_coupon'), 10, 0 );
		add_action( 'woocommerce_before_cart', array($this, 'add_coupon'), 10, 0 );
		add_action( 'woocommerce_removed_coupon', array($this, 'removed_coupon_session'), 10, 1 );
	}
	
	/**
	 * Guarda o código do cumpom em uma sessão quando recebe o parâmetro através da URL
	 */
	public function get_custom_cevaw_coupon_code_to_session() {	
		// Verifica se o parâmetro na URL foi passado
		if( isset($_GET[$this->cevaw_coupon_code]) ){
			
			// Certifica de que a sessão do cliente seja iniciada
			if( isset(WC()->session) && ! WC()->session->has_session() ) {
				WC()->session->set_customer_session_cookie(true);
			}
				
			// Verifique e registre o código do cupom em uma variável de sessão
			$cevaw_coupon_code = WC()->session->get('cevaw_coupon_code');
			if(empty($cevaw_coupon_code)){
				$cevaw_coupon_code = sanitize_text_field( $_GET[$this->cevaw_coupon_code] );
				WC()->session->set( 'cevaw_coupon_code', $cevaw_coupon_code ); // Guarda o código do cupom na sessão
			}
		}
	}
	
	// Remove o cupom da sessão
	public function removed_coupon_session($coupon_code) {
		$cevaw_coupon_code = WC()->session->get('cevaw_coupon_code');
		if ( !empty($cevaw_coupon_code) and $cevaw_coupon_code == $coupon_code){
			WC()->session->__unset('cevaw_coupon_code'); // Remove o código de cupom da sessão
		}
	}

	// Aplica o código do cupom no checkout ou carrinho
	public function add_coupon() {
		// Pega o código do cupom na sessão
		$cevaw_coupon_code = WC()->session->get('cevaw_coupon_code');
		if ( !empty( $cevaw_coupon_code )
			and WC()->cart->get_cart_contents_count() > 0
			and !WC()->cart->has_discount( $cevaw_coupon_code ) ){
			WC()->cart->add_discount( $cevaw_coupon_code ); // Aplica o cupom de desconto
			WC()->session->__unset('cevaw_coupon_code'); // Remove o código de cupom da sessão
		}
	}
	
}

new CEVAW_Coupon_URL();