<?php
/**
 * Configuração para o módulo pay_x_get_y
 */
if (!defined('ABSPATH'))
  exit;

class CEVAW_Settings_Pay_X_Get_Y {
	
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
	}
	
	// Adiciona a opção no menu do WordPress
	public function add_plugin_page() {
		add_submenu_page(
			CEVAW_PLUGIN_SLUG, // parent_slug
			__(CEVAW_PLUGIN_NAME . ' - Pague X e Leve Y', 'cev-addons-for-woocommerce'), // page_title
			__('Pague X e Leve Y', 'cev-addons-for-woocommerce'), // menu_title
			'manage_options', // capability 
			CEVAW_PLUGIN_SLUG . '_pay-x-get-y', // menu_slug
			array( $this, 'create_admin_page' ), // function
			30 // position
		);
	}

	// Cria a página de configuração
	public function create_admin_page() {
?>

<div class="wrap" id="cevaw-settings-wrap">
	<h2><?php esc_html_e(CEVAW_PLUGIN_NAME, 'cev-addons-for-woocommerce'); ?></h2>
	<h3><?php esc_html_e('Pague X e Leve Y', 'cev-addons-for-woocommerce'); ?></h3>
<?php
		if ( !empty(CEVAW_PLUGIN_DOCUMENTATION_URL) ) {
?>
	<p><? esc_html_e('Para mais informações acesse a', 'cev-addons-for-woocommerce'); ?> <a target="_blank" href="<?php echo esc_url(CEVAW_PLUGIN_DOCUMENTATION_URL ); ?>"><? esc_html_e('Documentação', 'cev-addons-for-woocommerce'); ?></a></p>
<?php
		}
		include_once dirname( CEVAW_PLUGIN_FILE ) . '/templates/admin/settings-top-banner.php';
?>
	<h4><? echo wp_kses_post( __('Configuração', 'cev-addons-for-woocommerce') ); ?></h4>
	<p><?php echo wp_kses_post( __('A configuração deste recurso se encontra disponível na aba <strong>CEV Pague X e Leve Y</strong> da edição dos cupons.', 'cev-addons-for-woocommerce') ); ?></p>
</div>
<?php
	}

}

new CEVAW_Settings_Pay_X_Get_Y();
