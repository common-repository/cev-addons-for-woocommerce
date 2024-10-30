<?php
/**
 * Opções do cupom para o módulo custom_bar
 */

if (!defined('ABSPATH'))
  exit;

class CEVAW_Options_Custom_Bar {
	
	public function __construct()
	{
		add_action( 'woocommerce_coupon_data_panels', array($this, 'add_fields'), 10 );
		add_action( 'woocommerce_coupon_options_save', array($this, 'save_fields'), 10, 2 );
		add_filter( 'woocommerce_coupon_data_tabs', array($this, 'coupon_data_tabs') );
	}
	
	public function coupon_data_tabs($tabs) {
?>
<style>
	.cevaw_custom_bar_options a::before {
		font-family: "WooCommerce" !important;
		content: "\e028" !important;
	}
</style>
<?php
		$tabs['cevaw_custom_bar'] = array(
			'label'  => __( 'CEV Barra', 'cev-addons-for-woocommerce' ),
			'target' => 'cevaw_custom_bar',
			'class'  => 'cevaw_custom_bar',
		);
		return $tabs;
	}
	
	// Adiciona campos personalizados na página de configuração de cupons
	public function add_fields($post_id) {
?>
<div id="cevaw_custom_bar" class="panel woocommerce_options_panel">
<div class="options_group">
<?php
		woocommerce_wp_text_input(
			array(
				'id'			=> 'cevaw_custom_bar_text',
				'label'			=> __( 'Texto da barra', 'cev-addons-for-woocommerce' ),
				'desc_tip'		=> true,
				'description'	=> __( 'Texto que será apresentado ao usuário na barra de avisos', 'cev-addons-for-woocommerce' ),
				'value'			=> $cevaw_custom_bar_text,
			)
		);
?>
<p class="form-field cevaw_custom_bar_text_field ">
<strong>
<?php echo wp_kses_post( __( 'Regras de uso<br>', 'cev-addons-for-woocommerce' ) ); ?>
</strong>
<?php echo wp_kses_post( __( 'Para compor o texto da barra você pode usar a variável <b>[coupon_code]</b> e com isso conseguirá personalizar a cor do código do cupom.<br>', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Use <b>[dbr]</b> para quebra de linha no desktop (<i>no mobile corresponderá a um espaço</i>).<br>', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Use <b>[mbr]</b> para quebra de linha no mobile (<i>no desktop corresponderá a um espaço</i>).', 'cev-addons-for-woocommerce' ) ); ?>
<?php echo wp_kses_post( __( 'Caso você preencha o texto da barra no campo abaixo, ele terá prioridade sobre o texto usado em Aparência/Personalizar.', 'cev-addons-for-woocommerce' ) ); ?>
</p>
</div>
</div>
<?php
	}

	// Salva os campos personalizados
	public function save_fields( $post_id, $coupon ) {
		if( isset( $_POST['cevaw_custom_bar_text'] ) 
			and $coupon->get_meta('cevaw_custom_bar_text') != $_POST['cevaw_custom_bar_text'] ) {
			update_post_meta( $post_id, 'cevaw_custom_bar_text', sanitize_text_field( $_POST['cevaw_custom_bar_text'] ) );
		}
	}
	
}

new CEVAW_Options_Custom_Bar();