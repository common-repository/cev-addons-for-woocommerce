<?php
/**
 * Configuração para ativa de módulos
 */
if (!defined('ABSPATH'))
  exit;

class CEVAW_Settings_Modeules {
	
	public $cevaw_modules;
	
	public function __construct()
	{
		$this->cevaw_modules = get_option( 'cevaw_modules', true );
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'init' ) );
	}
	
	// Adiciona a opção no menu do WordPress
	public function add_plugin_page() {
		add_menu_page(
			__(CEVAW_PLUGIN_NAME, 'cev-addons-for-woocommerce'), // page_title
			__(CEVAW_PLUGIN_NAME_SHORT, 'cev-addons-for-woocommerce'), // menu_title
			'manage_options', // capability
			CEVAW_PLUGIN_SLUG, // menu_slug
			null, // function
			'dashicons-admin-tools', // icon_url
			20 // position
		);
		
		// Para omitir a repetição do menu principal no primeiro submenu, o slug
		// do primeiro submenu deve ser igual ao do menu principal
		add_submenu_page(
			CEVAW_PLUGIN_SLUG, // parent_slug
			__(CEVAW_PLUGIN_NAME_SHORT . ' - Módulos', 'cev-addons-for-woocommerce'), // page_title
			__('Módulos', 'cev-addons-for-woocommerce'), // menu_title
			'manage_options', // capability 
			CEVAW_PLUGIN_SLUG, // menu_slug
			array( $this, 'create_admin_page' ) // function
		);
	}

	// Cria a página de configuração
	public function create_admin_page() {
?>

<div class="wrap" id="cevaw-settings-wrap">
	<h2><?php esc_html_e(CEVAW_PLUGIN_NAME, 'cev-addons-for-woocommerce'); ?></h2>
	<p><?php esc_html_e('Ative os módulos desejados.', 'cev-addons-for-woocommerce'); ?></p>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
<?php
		// Exibe os campos nonce, action e option_page para uma página de configurações.
		settings_fields( 'cevaw_modules_group' );
		
		// Imprime todas as seções de configurações adicionadas a uma página de configurações específica
		do_settings_sections( 'modules' );
		
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
			'cevaw_modules_group', // option_group
			'cevaw_modules', // option_name
			 array(
				'type' => 'array',
				'sanitize_callback' => array( $this, 'sanitize' ),
			) // args
		);

		// Adiciona as seções da página de configurações
		add_settings_section(
			'cevaw_setting_info', // id
			__('Módulos', 'cev-addons-for-woocommerce'), // title
			array( $this, 'section_cevaw_info' ), // callback
			'modules' // page
		);

		// Adiciona os campo das seções da página de configurações.
		add_settings_field(
			'custom_bar_active', // id
			__('Barra customizada', 'cev-addons-for-woocommerce'), // title
			array( $this, 'custom_bar_active_callback' ), // callback
			'modules', // page
			'cevaw_setting_info' // section
		);
		add_settings_field(
			'coupon_url_active', // id
			__('URL para cupom', 'cev-addons-for-woocommerce'), // title
			array( $this, 'coupon_url_active_callback' ), // callback
			'modules', // page
			'cevaw_setting_info' // section
		);
		add_settings_field(
			'pay_x_get_y_active', // id
			__('Pague X e leve Y', 'cev-addons-for-woocommerce'), // title
			array( $this, 'pay_x_get_y_active_callback' ), // callback
			'modules', // page
			'cevaw_setting_info' // section
		);
		add_settings_field(
			'auto_apply_active', // id
			__('Aplicação automática', 'cev-addons-for-woocommerce'), // title
			array( $this, 'auto_apply_active_callback' ), // callback
			'modules', // page
			'cevaw_setting_info' // section
		);

	}


	public function sanitize($input) {
		$sanitary_values = array();
		foreach ($input as $key => $value) {
			$sanitary_values[$key] = ($value == 1 ? 1 : 0);
		}
		return $sanitary_values;

	}

	public function section_cevaw_info() {
		if ( !empty(CEVAW_PLUGIN_DOCUMENTATION_URL) ) {
?>
<p><? esc_html_e('Para mais informações acesse a', 'cev-addons-for-woocommerce'); ?> <a target="_blank" href="<?php echo esc_url(CEVAW_PLUGIN_DOCUMENTATION_URL); ?>"><? esc_html_e('Documentação', 'cev-addons-for-woocommerce'); ?></a></p>
<?php
		}
		include_once dirname( CEVAW_PLUGIN_FILE ) . '/templates/admin/settings-top-banner.php';
?>
<h3><?php esc_html_e('Módulos para cupom', 'cev-addons-for-woocommerce'); ?></h3>
<?php
	}

	
	public function coupon_url_active_callback() {
		$cevaw_modules = $this->cevaw_modules;
?>		
<input type="checkbox" name="cevaw_modules[coupon_url_active]" id="cevaw_modules[coupon_url_active]" value="1"<?php checked( $cevaw_modules['coupon_url_active'], 1 ); ?>> <label for="cevaw_modules[coupon_url_active]"><?php print __('Habilitar o recurso de passar um cupom através de URL', 'cev-addons-for-woocommerce') ?></label><br>
<?php	
	}
	
	public function custom_bar_active_callback() {
		$cevaw_modules = $this->cevaw_modules;
?>		
<input type="checkbox" name="cevaw_modules[custom_bar_active]" id="cevaw_modules[custom_bar_active]" value="1"<?php checked( $cevaw_modules['custom_bar_active'], 1 ); ?>> <label for="cevaw_modules[custom_bar_active]"><?php print __('Habilitar o recurso de barra customizada', 'cev-addons-for-woocommerce') ?></label><br>
<?php	
	}
	
	public function pay_x_get_y_active_callback() {
		$cevaw_modules = $this->cevaw_modules;
?>		
<input type="checkbox" name="cevaw_modules[pay_x_get_y_active]" id="cevaw_modules[pay_x_get_y_active]" value="1"<?php checked( $cevaw_modules['pay_x_get_y_active'], 1 ); ?>> <label for="cevaw_modules[pay_x_get_y_active]"><?php print __('Habilitar o recurso do cupom de pague X e leve Y (Ex.: Pague 2 e leve 3)', 'cev-addons-for-woocommerce') ?></label><br>
<?php	
	}
	
	public function auto_apply_active_callback() {
		$cevaw_modules = $this->cevaw_modules;
?>		
<input type="checkbox" name="cevaw_modules[auto_apply_active]" id="cevaw_modules[auto_apply_active]" value="1"<?php checked( $cevaw_modules['auto_apply_active'], 1 ); ?>> <label for="cevaw_modules[auto_apply_active]"><?php print __('Habilitar o recurso de aplicação automática de cupom', 'cev-addons-for-woocommerce') ?></label><br>
<?php	
	}
	
}

new CEVAW_Settings_Modeules();
