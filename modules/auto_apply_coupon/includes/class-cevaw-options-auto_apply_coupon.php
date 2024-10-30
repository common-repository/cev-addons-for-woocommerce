<?php
/**
 * Opções para o módulo auto_apply_coupon
 */

if (!defined('ABSPATH'))
  exit;

class CEVAW_Options_Auto_Apply_Coupon {
	
	public function __construct()
	{
		add_action( 'woocommerce_coupon_data_panels', array($this, 'add_fields'), 10 );
		add_action( 'woocommerce_coupon_options_save', array($this, 'save_fields'), 10, 2 );
		add_filter( 'woocommerce_coupon_data_tabs', array($this, 'coupon_data_tabs') );
	}
	
	public function coupon_data_tabs($tabs) {
?>
<style>
	.cevaw_auto_apply_coupon_options a::before {
		font-family: "WooCommerce" !important;
		content: "\e014" !important;
	}
</style>
<?php
		$tabs['cevaw_auto_apply_coupon'] = array(
			'label'  => __( 'CEV Aplicação automática', 'cev-addons-for-woocommerce' ),
			'target' => 'cevaw_auto_apply_coupon',
			'class'  => 'cevaw_auto_apply_coupon',
		);

		return $tabs;
	}
	
	// Adiciona campos personalizados na página de configuração de cupons
	public function add_fields($post_id) {
?>
<div id="cevaw_auto_apply_coupon" class="panel woocommerce_options_panel">
<div class="options_group">
<?php
		woocommerce_wp_checkbox(
			array(
				'id' => 'cevaw_auto_apply_coupon',
				'label' => __( 'Aplicação automática', 'cev-addons-for-woocommerce' ),
				'description' => __( 'Quando marcado, se este cupom for válido para a compra do cliente, será aplicado automaticamente.', 'cev-addons-for-woocommerce'),
			)
		);
?>
<p class="form-field cevaw_auto_apply_coupon_field">
<strong>
<?php echo wp_kses_post( __( 'Regras de uso<br>', 'cev-addons-for-woocommerce' ) ); ?>
</strong>
<?php echo wp_kses_post( __( 'Só é permitido o uso para um único cupom. Quando um novo cupom é habilitado com este recurso, os outros cupons terão o recurso desabilitado automaticamente.<br>', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Será aplicado sempre no último cupom salvo com esta opção.<br>', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Por conta dos plugins de cache esse recurso não funciona com a <b>CEV Barra</b> (<i>seria necessário uma URL diferente, como no caso da URL para cupom</i>), mas se você preencher o texto da barra deste cupom (<i>o módulo precisa estar ativo</i>), esse texto será exibido nas páginas de carrinho e de checkout.', 'cev-addons-for-woocommerce' ) ); ?>
</p>
</div>
</div>
<?php
	}

	// Salva os campos personalizados
	public function save_fields( $post_id, $coupon ) {
		// Deleta todas as metas cevaw_auto_apply_coupon, para garantir que só existe um cupom com a aplicação automática
		$args = array(
			'post_type'      => array( 'shop_coupon' ),
			'posts_per_page' => -1,
			'post_status'    => array( 'publish', 'draft', 'future' ),
			'meta_key'       => 'cevaw_auto_apply_coupon'
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				delete_post_meta(get_the_ID(), 'cevaw_auto_apply_coupon');
			}
		}
		wp_reset_postdata();

		// A meta cevaw_auto_apply_coupon só serve para referência visual na edição do cupom. Não é usada.
		// A meta que realmente importa é a option cevaw_auto_apply_coupon_cod
		if( isset( $_POST['cevaw_auto_apply_coupon'] ) ) {
			update_post_meta( $post_id, 'cevaw_auto_apply_coupon', 'yes' );
			update_option( 'cevaw_auto_apply_coupon_cod', $coupon->code );
		} else {
			update_post_meta( $post_id, 'cevaw_auto_apply_coupon', 'no' );
			if ( $coupon->code == get_option('cevaw_auto_apply_coupon_cod', true ) ) {
				update_option( 'cevaw_auto_apply_coupon_cod', '' );
			}
		}
	}
	
}

new CEVAW_Options_Auto_Apply_Coupon();