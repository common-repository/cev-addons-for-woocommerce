<?php
/**
 * Configuração para o módulo cutsom_bar
 */
if (!defined('ABSPATH'))
  exit;

class CEVAW_Settings_Custom_Bar {
	
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
	}
	
	// Adiciona a opção no menu do WordPress
	public function add_plugin_page() {
		add_submenu_page(
			CEVAW_PLUGIN_SLUG, // parent_slug
			__(CEVAW_PLUGIN_NAME . ' - Barra customizada', 'cev-addons-for-woocommerce'), // page_title
			__('Barra customizada', 'cev-addons-for-woocommerce'), // menu_title
			'manage_options', // capability 
			CEVAW_PLUGIN_SLUG . '_custom-bar', // menu_slug
			array( $this, 'create_admin_page' ), // function
			10 // position
		);
	}

	// Cria a página de configuração
	public function create_admin_page() {
?>

<div class="wrap" id="cevaw-settings-wrap">
	<h2><?php esc_html_e(CEVAW_PLUGIN_NAME, 'cev-addons-for-woocommerce'); ?></h2>
	<h3><?php esc_html_e('Barra Customizada', 'cev-addons-for-woocommerce'); ?></h3>
<?php
		if ( !empty(CEVAW_PLUGIN_DOCUMENTATION_URL) ) {
?>
	<p><? esc_html_e('Para mais informações acesse a', 'cev-addons-for-woocommerce'); ?> <a target="_blank" href="<?php echo esc_url( CEVAW_PLUGIN_DOCUMENTATION_URL ); ?>"><? esc_html_e('Documentação', 'cev-addons-for-woocommerce'); ?></a></p>
<?php
		}
		include_once dirname( CEVAW_PLUGIN_FILE ) . '/templates/admin/settings-top-banner.php';
?>
	<h4><? esc_html_e('Configuração', 'cev-addons-for-woocommerce'); ?></h4>
	<p><?php
		esc_html_e('Para configurar a barra acesse a ', 'cev-addons-for-woocommerce');
		echo'<a href="' . wp_customize_url() . '">';
		esc_html_e('Aparência/Personalizar/CEV Barra', 'cev-addons-for-woocommerce');
		echo '</a>';
	?></p>
	<h4><? esc_html_e('CSS', 'cev-addons-for-woocommerce'); ?></h4>
	<p><?php esc_html_e('Para personalização avançada utilizando CSS use as <strong>classes</strong> abaixo.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custom_bar_div', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Esta class permite configurar a DIV da barra.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custom_bar_text', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Esta class permite configurar o texto da barra.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custom_bar_icon', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Esta class permite configurar o ícone da barra.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custom_bar_btnclose', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Esta class permite configurar o botão de fechar da barra.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custom_bar_coupon_code', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Esta class permite configurar o código do cupom.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_content_desktop', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Esta class permite configurar a DIV para desktop.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_content_mobile', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Esta class permite configurar a DIV para mobile.', 'cev-addons-for-woocommerce'); ?></p>
	
	<h4><? esc_html_e('Hooks', 'cev-addons-for-woocommerce'); ?></h4>
	<p><?php esc_html_e('Para personalização avançada utilizando código use os <strong>filters</strong> abaixo.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custombar_icon', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Este filtro permite alterar o conteúdo do ícone.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custombar_btnclose', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Este filtro permite alterar o conteúdo do botão de fechar a barra.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('cevaw_custombar_contenttext', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Este filtro permite alterar o texto da barra.', 'cev-addons-for-woocommerce'); ?></p>	
	<p><strong><?php esc_html_e('cevaw_custombar_html', 'cev-addons-for-woocommerce'); ?></strong></p>
	<p><?php esc_html_e('Este filtro permite alterar o HTML da barra.', 'cev-addons-for-woocommerce'); ?></p>
	<p><strong><?php esc_html_e('Exemplo de uso', 'cev-addons-for-woocommerce'); ?></strong></p>
	<pre>
// O código abaixo alterar o ícone do botão fechar
function my_cevaw_custombar_btnclose($icon_html) {
	$icon_html = str_replace( 'fa-times-circle', 'fa-times', $icon_html );
	return $icon_html;
}
add_filter( 'cevaw_custombar_btnclose', 'my_cevaw_custombar_btnclose' );
	</pre>
</div>
<?php
	}

}

new CEVAW_Settings_Custom_Bar();
