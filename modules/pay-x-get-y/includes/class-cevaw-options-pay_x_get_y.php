<?php
/**
 * Opções para o módulo pay_x_get_y
 */

if (!defined('ABSPATH'))
  exit;

class CEVAW_Options_Pay_X_Get_Y {
	
	public $error_text;
	
	public function __construct()
	{
		add_action( 'woocommerce_coupon_data_panels', array($this, 'add_fields'), 10 );
		add_action( 'woocommerce_coupon_options_save', array($this, 'save_fields'), 10, 2 );
		if (isset($_GET['post'])) {
			$this->error_text = get_option( 'cevaw_error_coupon_' . sanitize_text_field($_GET['post']) );
			if ($this->error_text !== false) {
				delete_option( 'cevaw_error_coupon_' . sanitize_text_field($_GET['post']) );
				add_action( 'admin_notices', array($this, 'admin_notice_error') );
			}
		}
		add_filter( 'woocommerce_coupon_data_tabs', array($this, 'coupon_data_tabs') );
	}
	
	public function coupon_data_tabs($tabs) {
?>
<style>
	.cevaw_pay_x_get_y_options a::before {
		font-family: "WooCommerce" !important;
		content: "\e007" !important;
	}
</style>
<?php
		$tabs['cevaw_pay_x_get_y'] = array(
			'label'  => __( 'CEV Pague X e Leve Y', 'cev-addons-for-woocommerce' ),
			'target' => 'cevaw_pay_x_get_y',
			'class'  => 'cevaw_pay_x_get_y',
		);

		return $tabs;
	}
	
	public function admin_notice_error() {
    ?>
    <div class="notice notice-error">
        <p><?php echo wp_kses_post( htmlspecialchars_decode( $this->error_text ) ); ?></p>
    </div>
    <?php
	}
	
	// Adiciona campos personalizados na página de configuração de cupons
	public function add_fields($post_id) {
?>
<div id="cevaw_pay_x_get_y" class="panel woocommerce_options_panel">
<div class="options_group">
<?php
		$coupon = new WC_Coupon($post_id);
		
		$cevaw_pay_x = $coupon->get_meta('cevaw_pay_x');
		if ( empty($cevaw_pay_x) ) {
			$cevaw_pay_x = 0;
		}
		
		$cevaw_get_y = $coupon->get_meta('cevaw_get_y');
		if ( empty($cevaw_get_y) ) {
			$cevaw_get_y = 0;
		}
		
		$cevaw_error_minimum_of_products = htmlspecialchars_decode( $coupon->get_meta('cevaw_error_minimum_of_products' ) );
		woocommerce_wp_text_input( 
			array(
				'id'                => 'cevaw_pay_x',
				'label'             => __( 'Pague', 'cev-addons-for-woocommerce' ),
				'value'				=> $cevaw_pay_x,
				'description'       => __( 'Preencha com um valor maior que zero para habilitar o recurso', 'cev-addons-for-woocommerce' ),
				'desc_tip'    => true,

			) 
		);
		woocommerce_wp_text_input( 
			array(
				'id'                => 'cevaw_get_y',
				'label'             => __( 'Leve', 'cev-addons-for-woocommerce' ),
				'value'				=> $cevaw_get_y,
				'description'       => __( 'Preencha com um valor maior que o campo Pague', 'cev-addons-for-woocommerce' ),
				'desc_tip'    => true,

			) 
		);
		woocommerce_wp_checkbox(
			array(
				'id' => 'cevaw_multiplus_discounts',
				'label' => __( 'Múltiplos descontos', 'cev-addons-for-woocommerce' ),
				'description' => __( 'Permite aplicar múltiplos descontos', 'cev-addons-for-woocommerce'),
				'desc_tip'    => true,
			)
		);
		woocommerce_wp_textarea_input(
			array(
				'id'			=> 'cevaw_error_minimum_of_products',
				'label'			=> __( 'Regras do cupom', 'cev-addons-for-woocommerce' ),
				'desc_tip'		=> true,
				'description'	=> __( 'Texto com regras (ou ajuda) para uso deste cupom', 'cev-addons-for-woocommerce' ),
				'value'			=> $cevaw_error_minimum_of_products,
			)
		);
?>
<p class="form-field cevaw_pay_x_field ">
<strong>
<?php echo wp_kses_post( __( 'Regras de uso<br>', 'cev-addons-for-woocommerce' ) ); ?>
</strong>
<?php echo wp_kses_post( __( 'Caso não deseje não utilizar este recurso, basta deixar os campos <strong>Pague</strong> e <strong>Leve</strong> preenchidos com <strong>0</strong>.<br>', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Para utilizar o recurso, preencha os campos <strong>Pague</strong> e <strong>Leve</strong> com valores numéricos. O campo <strong>Pague</strong> deve ser preenchido com valor inferior ao do campo <strong>Leve</strong>.<br>', 'cev-addons-for-woocommerce' ) ); ?> 
<?php echo wp_kses_post( __( 'Para configurar corretamente o recurso, preencha o campo <strong>Tipo de desconto</strong> configurado com <strong>Desconto fixo de carrinho</strong> e o campo <strong>Valor do cupom</strong> preenchido com <strong>0</strong>.<br>', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Se desejar que o desconto seja aplicado apenas uma vez deixe desmarcado o campo <strong>Múltiplos descontos</strong> (Ex.: O deconto é pague 2 e leve 3, se o cliente selecionar 6 produtos irá pagar 5 e só terá o desconto de 1 produto).<br> ', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Caso queira aplicar o desconto multiplas vezes habilite o campo <strong>Múltiplos descontos</strong> (Ex.: O deconto é pague 2 e leve 3, se o cliente selecionar 6 produtos irá pagar 4). ', 'cev-addons-for-woocommerce' ) ); ?>
</p>
</div>
</div>
<?php
	}

	// Salva os campos personalizados
	public function save_fields( $post_id, $coupon ) {
		if( $_POST['cevaw_pay_x'] >  $_POST['cevaw_get_y']) {
			// Validação
			update_option( 'cevaw_error_coupon_' . $post_id, sanitize_text_field( esc_html( __( 'O campo <b>Leve</b> tem que ser maior que o campo <b>Pague</b>, por isso esses campos não foram alterados.', 'cev-addons-for-woocommerce') ) ) );
		
		} else {
			if( isset( $_POST['cevaw_pay_x'] )
				and $coupon->get_meta('cevaw_pay_x') != $_POST['cevaw_pay_x'] ) {
				update_post_meta( $post_id, 'cevaw_pay_x', sanitize_text_field( $_POST['cevaw_pay_x'] ) );
			}
			if( isset( $_POST['cevaw_get_y'] )
				and $coupon->get_meta('cevaw_get_y') != $_POST['cevaw_get_y'] ) {
				update_post_meta( $post_id, 'cevaw_get_y', sanitize_text_field( $_POST['cevaw_get_y'] ) );
			}
		}
		if( isset( $_POST['cevaw_multiplus_discounts'] ) ) {
			update_post_meta( $post_id, 'cevaw_multiplus_discounts', 'yes' );
		} else {
			update_post_meta( $post_id, 'cevaw_multiplus_discounts', 'no' );
		}
		if( isset( $_POST['cevaw_error_minimum_of_products'] )
			and $coupon->get_meta('cevaw_error_minimum_of_products') != $_POST['cevaw_error_minimum_of_products'] ) {
			update_post_meta(
				$post_id,
				'cevaw_error_minimum_of_products',
				sanitize_textarea_field( esc_html( $_POST['cevaw_error_minimum_of_products'] ) )
			);
		}
	}
	
}

new CEVAW_Options_Pay_X_Get_Y();