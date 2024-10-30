<?php
/**
 * Carregamento no site - módulo auto_apply_coupon
 */
if (!defined('ABSPATH'))
  exit;

class CEVAW_Auto_Apply_Coupon {
	
	public $cevaw_auto_apply_coupon_cod;
	
	public function __construct()
	{
		$this->cevaw_auto_apply_coupon_cod = get_option( 'cevaw_auto_apply_coupon_cod', true );
		if (!empty($this->cevaw_auto_apply_coupon_cod)) {
			add_action( 'woocommerce_before_checkout_form', array($this, 'add_coupon'), 10, 0 );
			add_action( 'woocommerce_before_cart', array($this, 'add_coupon'), 10, 0 );
			add_action( 'woocommerce_before_cart', array($this, 'cart_notice') );
			add_action( 'woocommerce_before_checkout_form', array($this, 'cart_notice') );
			add_action( 'woocommerce_removed_coupon', array($this, 'removed_coupon_session'), 10, 1 );
		}

	}
	
	public function cart_notice() {
		// Verifica se o cupom já foi incluído
		$cevaw_auto_apply_removed = WC()->session->get('cevaw_auto_apply_removed');
		if(empty($cevaw_auto_apply_removed)){
			
			$coupon = new \WC_Coupon( $this->cevaw_auto_apply_coupon_cod );
			$cevaw_custom_bar_text = $coupon->get_meta('cevaw_custom_bar_text');
			
			// Se tiver mensagem para ser exibida
			if ( !empty($cevaw_custom_bar_text) ) {
				$cevaw_custom_bar_text = str_replace( '[coupon_code]',
					'<b>' . $this->cevaw_auto_apply_coupon_cod . '</b>', $cevaw_custom_bar_text );
				$cevaw_custom_bar_text = str_replace( '[mbr]', ' ', $cevaw_custom_bar_text );
				$cevaw_custom_bar_text = str_replace( '[dbr]', '<br>', $cevaw_custom_bar_text );
				wc_print_notice( wp_kses_post( $cevaw_custom_bar_text ), 'notice' );
			}
		}
	}

	// Aplica o código do cupom no checkout ou carrinho
	public function add_coupon() {
		
		// Verifica se o cupom já foi incluído
		$cevaw_auto_apply_removed = WC()->session->get('cevaw_auto_apply_removed');
		if(empty($cevaw_auto_apply_removed)) {

			// Verifica se deve aplicar o cupom
			if ( WC()->cart->get_cart_contents_count() > 0
				and !WC()->cart->has_discount( $this->cevaw_auto_apply_coupon_cod ) ){
					
				// Aplica o cupom de desconto
				WC()->cart->add_discount( $this->cevaw_auto_apply_coupon_cod );
				
				// Certifica de que a sessão do cliente seja iniciada
				if( isset(WC()->session) && ! WC()->session->has_session() ) {
					WC()->session->set_customer_session_cookie(true);
				}
				
				// Grava na sessão para permitir que a exclusão do cupom funcione corretamente
				WC()->session->set( 'cevaw_auto_apply_coupon_cod', $this->cevaw_auto_apply_coupon_cod );
			}
		}
	}
	
	// Remove o cupom da sessão
	public function removed_coupon_session($coupon_code) {
		$cevaw_auto_apply_coupon_cod = WC()->session->get('cevaw_auto_apply_coupon_cod');
		if ( !empty($cevaw_auto_apply_coupon_cod) and $cevaw_auto_apply_coupon_cod == $coupon_code){
			
			// Certifica de que a sessão do cliente seja iniciada
			if( isset(WC()->session) && ! WC()->session->has_session() ) {
				WC()->session->set_customer_session_cookie(true);
			}
	
			// Grava na sessão para permitir que a exclusão do cupom funcione corretamente
			WC()->session->set( 'cevaw_auto_apply_removed', 'yes' );
		}
	}
	
}

new CEVAW_Auto_Apply_Coupon();