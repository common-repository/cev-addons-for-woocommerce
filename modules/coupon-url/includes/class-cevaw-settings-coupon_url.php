<?php
/**
 * Configuração para o módulo coupon_url
 */
if (!defined('ABSPATH'))
  exit;

class CEVAW_Settings_Coupon_URL {
	
	public $cevaw_coupon_url;
	
	public function __construct()
	{
		$this->cevaw_coupon_url = get_option( 'cevaw_coupon_url', true );
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'init' ) );
	}
	
	// Adiciona a opção no menu do WordPress
	public function add_plugin_page() {
		add_submenu_page(
			CEVAW_PLUGIN_SLUG, // parent_slug
			__(CEVAW_PLUGIN_NAME . ' - URL para cupom', 'cev-addons-for-woocommerce'), // page_title
			__('URL para cupom', 'cev-addons-for-woocommerce'), // menu_title
			'manage_options', // capability 
			CEVAW_PLUGIN_SLUG . '_coupon-url', // menu_slug
			array( $this, 'create_admin_page' ), // function
			20 // position
		);
	}

	// Cria a página de configuração
	public function create_admin_page() {
?>

<div class="wrap" id="cevaw-settings-wrap">
	<h2><?php esc_html_e(CEVAW_PLUGIN_NAME, 'cev-addons-for-woocommerce'); ?></h2>
	<p><?php esc_html_e('Configures o módulo abaixo', 'cev-addons-for-woocommerce'); ?></p>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
<?php
		// Exibe os campos nonce, action e option_page para uma página de configurações.
		settings_fields( 'cevaw_coupon_url_group' );
		
		// Imprime todas as seções de configurações adicionadas a uma página de configurações específica
		do_settings_sections( 'coupon_url' );
		
		// Botão de submit
		submit_button();
?>
	</form>
</div>
<?php 
	}

	public function init() {
		// Registra os campos de configuração
		register_setting(
			'cevaw_coupon_url_group', // option_group
			'cevaw_coupon_url', // option_name
			 array(
				'type' => 'array',
				'sanitize_callback' => array( $this, 'sanitize' ),
			) // args
		);

		// Adiciona as seções da página de configurações
		add_settings_section(
			'cevaw_setting_info', // id
			__('Campo com o código cupom', 'cev-addons-for-woocommerce'), // title
			array( $this, 'section_cevaw_info' ), // callback
			'coupon_url' // page
		);

		// Adiciona os campo das seções da página de configurações.
		add_settings_field(
			'coupon_code', // id
			__('Codigo do cupom', 'cev-addons-for-woocommerce'), // title
			array( $this, 'coupon_code_callback' ), // callback
			'coupon_url', // page
			'cevaw_setting_info' // section
		);

	}

	public function sanitize($input) {
		$sanitary_values = array();
		foreach ($input as $key => $value) {
			$sanitary_values[$key] = sanitize_text_field( $value );
		}
		return $sanitary_values;

	}

	public function section_cevaw_info() {
		if ( !empty(CEVAW_PLUGIN_DOCUMENTATION_URL) ) {
?>
<p><? esc_html_e('Para mais informações acesse a', 'cev-addons-for-woocommerce'); ?> <a target="_blank" href="<?php echo esc_url( CEVAW_PLUGIN_DOCUMENTATION_URL) ; ?>"><? esc_html_e('Documentação', 'cev-addons-for-woocommerce'); ?></a></p>

<?php
		}
		include_once dirname( CEVAW_PLUGIN_FILE ) . '/templates/admin/settings-top-banner.php';
	}

	
	public function coupon_code_callback() {
		if (isset($this->cevaw_coupon_url['coupon_code'])) {
			$value = $this->cevaw_coupon_url['coupon_code'];
		} else {
			$value = 'cod_cupom';
		}
?>		
<input type="text" name="cevaw_coupon_url[coupon_code]" id="cevaw_coupon_url[coupon_code]" value="<?php echo esc_attr( $value ) ?>">
<br>
<p>
	<?php esc_html_e('Entre com o campo para o código do cupom.', 'cev-addons-for-woocommerce'); ?>
	<br>
	<?php echo wp_kses_post('<b>Regras</b>: Somente letras e o carcacter "_". Preencha com letras minúculas.', 'cev-addons-for-woocommerce'); ?>
	<br>
	<?php echo wp_kses_post('<b>Exemplo</b>: cod_cupom', 'cev-addons-for-woocommerce'); ?>
	<br>
	<br>
	<strong><?php esc_html_e('Uso após configurado', 'cev-addons-for-woocommerce'); ?></strong><br>
	<?php echo esc_url( get_home_url() . '/?' . $value . '=codigo_do_cupom' ); ?>
	<br><br>
	<?php esc_html_e('Substitua codigo_do_cupom pelo código do cupom desejado.', 'cev-addons-for-woocommerce'); ?>
	<br><br>
	<strong><? echo wp_kses_post( __('Quando usar?', 'cev-addons-for-woocommerce') ); ?></strong><br>
	<?php echo wp_kses_post( __('Este é um recurso muito útil. Seus usuários não precisam digitar e aplicar os cupons manualmente. Em vez disso, eles só precisam clicar no link fornecido. Sem aborrecimentos para copiar ou digitar o código do cupom. Garante o compartilhamento fácil do seu cupom.', 'cev-addons-for-woocommerce') ); ?>
	<br><br>
	<?php echo wp_kses_post( __('Você também pode adicionar o código do cupom a qualquer URL da sua loja e permitir que o desconto seja aplicado automaticamente ao clicar nesse URL.', 'cev-addons-for-woocommerce') ); ?>
</p>
<?php	
	}

}

new CEVAW_Settings_Coupon_URL();
