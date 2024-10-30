<?php
/**
 * Carregamento no site - Módulo pay-x-get-y
 */
 
if (!defined('ABSPATH'))
  exit;

class CEVAW_Pay_X_Get_Y {
	
	public $percentage_discount = 0;
	public $cevaw_pay_x = 0;
	public $cevaw_get_y = 0;
	public $cevaw_multiplus_discounts = '';
	public $show_notice = true;
	public $coupon_code = '';
	public $cevaw_error_minimum_of_products = '';
	public $cevaw_error_minimum_of_products_notice = '';
	public $total_items = 0;
	public $accepted_items = array();

	public function __construct() {
		add_filter( 'woocommerce_coupon_get_discount_amount', array($this, 'add_discout_item'), 10, 5 );
		add_action( 'woocommerce_before_cart', array($this, 'cart_notice') );
		add_action( 'woocommerce_before_checkout_form', array($this, 'cart_notice') );
	}

	public function cart_notice() {
		if ( !empty($this->cevaw_error_minimum_of_products_notice) ) {
			wc_print_notice( nl2br( htmlspecialchars_decode( $this->cevaw_error_minimum_of_products_notice ) ), 'notice' );
		}
	}

	public function discount_per_item() {
		if ($this->percentage_discount > 0) return;
	
		// Itens gratuitos
		$free_items = $this->cevaw_get_y - $this->cevaw_pay_x;
		
		// Total do carrinho
		$cart_total = 0;
		
		/**
		 * Descobre os itens mais baratos para retirar do carrinho
		 */
		 
		// Percorra os itens no carrinho para organizar os preços do menor para o maior
		$product_price = array();
		foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
			if ( empty($this->accepted_items) or in_array($cart_item_key, $this->accepted_items) ) {
				$_product = $values['data'];
				$price = $_product->get_price_including_tax();
				for ($i = 1; $i <= $values['quantity']; $i++) {
					$product_price[] = $price;
					$cart_total += $price;
				}
			}
		}
		
		// Ordena os preços do menor para o maior
		sort($product_price, SORT_NUMERIC);

		// Calcula o número de itens a remover do total
		if ($this->cevaw_multiplus_discounts == 'yes') {
			$remove = floor($this->total_items/$this->cevaw_get_y);
		} else {
			$remove = 1;
		}

		// Número de itens gratuitos * a quantidade de uso do cupom
		$remove_from_total = $free_items * $remove;
		$discount_amount = 0;
		for ($i = 1; $i <= $remove_from_total; $i++) {
			// Retira o mais barato
			$discount_amount += array_shift($product_price);
		}
		
		$this->percentage_discount = ($discount_amount * 100) / $cart_total;
	}
	
	// Calcula o total de itens baseado nas restrições de uso do cupom
	public function cart_contents_count($coupon_code) {
		$coupon = new \WC_Coupon( $coupon_code );
		
		// Se não tiver produtos ou categoria de produtos incluídos no cupom
		// retorna o total de itens do carrinho
		if ( empty($coupon->product_ids) and empty($coupon->product_categories) ) {
			$this->total_items = WC()->cart->cart_contents_count;
			return $this->total_items;
		}
		
		$valid_item = false;
		$this->total_items = 0;
		foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
			$_product = $values['data'];
			
			// Verifica se o item se encontra nas categorias permitidas
			$cats = get_the_terms( $_product->id, 'product_cat' );
			foreach ($cats as $cat) {
				$product_cat_id = $cat->term_id;
				if ( in_array($cat->term_id, $coupon->product_categories) ) {
					$this->accepted_items[] = $cart_item_key;
					$valid_item = true;
					break;
				}
			}

			// Verifica se o item se encontra nos produtos permitidos
			if ( in_array($_product->id, $coupon->product_ids) ) {
				$this->accepted_items[] = $cart_item_key;
				$valid_item = true;
			}
			
			// Conta os itens permitidos
			if ($valid_item) {
				for ($i = 1; $i <= $values['quantity']; $i++) {
					$this->total_items++;
				}
			}
		}
		
		return $this->total_items;
	}

	/*
	 * Este filtro é chamado para cada item do carrinho (um item poder quantidade superior a 1)
	 * Ele retorna o desconto para o item
	 * O deconto não pode ser maior que o valor do item
	 * Para o perfeito funcionamento, é necessário calcular o percentual de desconto que deverá ser aplicado por item
	 */
	function add_discout_item( $discount, $discounting_amount, $cart_item, $single, $coupon ) {
		if ($this->cevaw_get_y == 0) {

			// Verifica se está usando um cupom do tipo Pay_X_Get_Y
			$this->cevaw_pay_x = $coupon->get_meta('cevaw_pay_x');
			if ( $this->cevaw_pay_x > 0 ) {
				$this->cevaw_get_y = $coupon->get_meta('cevaw_get_y');
				$this->cevaw_multiplus_discounts = $coupon->get_meta('cevaw_multiplus_discounts');
				$this->coupon_code = $coupon->get_code();
				$this->cevaw_error_minimum_of_products = $coupon->get_meta('cevaw_error_minimum_of_products');

				// Se a condição abaixo ocorrer tem um erro e esse cupom não deve ser usado
				if ($this->cevaw_get_y  <= $this->cevaw_pay_x) {
					return $discount;;
				}
			}
		}
		
		// Calcula a quantidade de itens
		$this->cart_contents_count($this->coupon_code);

		// Sai da função de não tiver a quantidade mínima de produtos ($cevaw_get_y)
		if( $this->total_items < $this->cevaw_get_y and $this->show_notice) {
			// Este filter é chamado várias vezes, por isso precisamos da variável show_notice
			// para garantir que a mensagem só será processada uma vez
			$this->show_notice = false;
			if ( !empty(trim($this->cevaw_error_minimum_of_products)) ) {
				$this->cevaw_error_minimum_of_products_notice = $this->cevaw_error_minimum_of_products;
			} else {
				$this->cevaw_error_minimum_of_products_notice = sanitize_text_field( esc_html( sprintf( 
					__( 'Adicione pelo menos %d produtos no carrinho para usar o cupom <b>%s</b>', 'cev-addons-for-woocommerce' ),
					$this->cevaw_get_y,
					$this->coupon_code
				) ) );
			}
			return $discount;;
		}

		// Calcula o desconto percentual
		if ($this->cevaw_get_y > 0 and $this->percentage_discount == 0) {
			$this->discount_per_item();
		}
		
		// Calcula o desconto se for um item aceito
		if ( empty($this->accepted_items) or in_array($cart_item['key'], $this->accepted_items) ) {
			if ($this->percentage_discount > 0) {
				$discount = ($discounting_amount * $this->percentage_discount) / 100;
			}
		}

		// Aplica o desconto se existir
		return $discount;
	}
	
	public function change_coupon_amount() {
		$coupon = new WC_Coupon($this->coupon_code);// create an instance of the class using the coupon code
		$coupon->set_amount($this->discount_amount);//set coupon amount to the computed discounted price
	}

}

new CEVAW_Pay_X_Get_Y();
?>