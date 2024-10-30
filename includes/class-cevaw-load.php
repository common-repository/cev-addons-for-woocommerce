<?php
/**
 * Carrega as rotinas pricipais e os módulos ativos
 */

class CEVAW_Load {
	
	public $boWooCommerceActive = false;
	public $cevaw_modules;
	
	public function __construct() {
		$this->cevaw_modules = get_option( 'cevaw_modules', true );
		
		// Só carrega quantos todos os plugins estiverem carregados, incluindo o WooCommerce
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}
	
	public function init() {
		// Verifica se o WooCommerce está ativo
		if ( class_exists( 'WooCommerce' ) ) {
			$this->boWooCommerceActive = true;
		}
		
		/**
		 * Carrega o plugin
		 */
		add_action( 'init', array( __CLASS__, 'load_plugin_textdomain' ), -1 );
		
		$this->general_includes();
		
		// Esses recursos podem funcionar sem o WooCommerce
		if ( is_admin() ) {
			add_filter( 'plugin_action_links_' . CEVAW_PLUGIN_BASENAME, array( $this, 'add_action_links') );
			$this->wp_includes_admin();
		} else {
			$this->wp_includes();
		}
		
		// Esses recursos só funcionam com o WooCommerce
		if ( $this->boWooCommerceActive ) {
			if ( is_admin() ) {
				$this->wc_includes_admin();
			} else {
				$this->wc_includes();
			}
		} else {
			// Gera aviso que precisa ativar o WooCommerce
			add_action( 'admin_notices', array( $this, 'woocommerce_missing_notice' ) );
		}
	}
	
	public function add_action_links($links) {
		$links[] = '<a href="' . esc_url(admin_url('admin.php?page=' . CEVAW_PLUGIN_SLUG)) . '">' . 
			esc_html__('Configurações', 'cev-addons-for-woocommerce') . '</a>';
		$links[] = '<a target="_blank" rel="noopener noferrer" href="' . CEVAW_PLUGIN_DOCUMENTATION_URL . '">' . 
			esc_html__('Documentação', 'cev-addons-for-woocommerce') . '</a>';

		return $links;
	}
	
	/**
	 * Aviso da depência do WooCommerce.
	 */
	public function woocommerce_missing_notice() {
		include_once dirname( CEVAW_PLUGIN_FILE ) . '/templates/admin/html-admin-missing-dependencies.php';
	}
	
	/**
	 * Carregue traduções do plugins
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( CEVAW_PLUGIN_SLUG, false, dirname( plugin_basename( CEVAW_PLUGIN_FILE ) ) . '/languages/' );
	}
	

	/**
	 * Includes.
	 */
	private function general_includes() {
		// Includes que precisam ser chamados no site e no admin
		
		if ($this->cevaw_modules['custom_bar_active']) {

			wp_enqueue_script( 'cevaw-custom-bar', 
				CEVAW_PLUGIN_URL . '/modules/custom-bar/assets/js/cevaw-custom-bar-functions.js', 
				array(), 
				CEVAW_PLUGIN_JS_VERSION 
			);

			// Custom bar
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/custom-bar/includes/class-cevaw-custom_bar.php';
			
			// Custom bar setting
			// Atenção: A customização aparência/personalizar não funciona se estiver sendo chamada apenas para a área administrativa 
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/custom-bar/includes/class-cevaw-customize-custom_bar.php';
		}
	}
	
	private function wc_includes() {
		// Módulo: URL do cupom
		if ($this->cevaw_modules['coupon_url_active']) {
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/coupon-url/includes/class-cevaw-coupon_url.php';
		}
		
		// Módulo: Pague X e Leve Y
		if ($this->cevaw_modules['pay_x_get_y_active']) {
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/pay-x-get-y/includes/class-cevaw-pay_x_get_y.php';
		}
		
		// Módulo: Auto Apply Coupon
		if ($this->cevaw_modules['auto_apply_active']) {
			include_once dirname( CEVAW_PLUGIN_FILE ) .
				'/modules/auto_apply_coupon/includes/class-cevaw-auto_apply_coupon.php';
		}
	}

	private function wc_includes_admin() {
		// Custom bar setting
		if ($this->cevaw_modules['custom_bar_active']) {
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/custom-bar/includes/class-cevaw-settings-custom_bar.php';
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/custom-bar/includes/class-cevaw-options-custom_bar.php';
		}

		// Módulo: URL do cupom
		if ($this->cevaw_modules['coupon_url_active']) {
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/coupon-url/includes/class-cevaw-settings-coupon_url.php';
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/coupon-url/includes/class-cevaw-options-coupon-url.php';
		}
		
		// Módulo: Pay X Get Y 
		if ($this->cevaw_modules['pay_x_get_y_active']) {
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/pay-x-get-y/includes/class-cevaw-options-pay_x_get_y.php';
			include_once dirname( CEVAW_PLUGIN_FILE ) . '/modules/pay-x-get-y/includes/class-cevaw-settings-pay_x_get_y.php';
		}
		
		// Módulo: Auto Apply Coupon
		if ($this->cevaw_modules['auto_apply_active']) {
			include_once dirname( CEVAW_PLUGIN_FILE ) . 
				'/modules/auto_apply_coupon/includes/class-cevaw-options-auto_apply_coupon.php';
			include_once dirname( CEVAW_PLUGIN_FILE ) . 
				'/modules/auto_apply_coupon/includes/class-cevaw-settings-auto_apply_coupon.php';
		}
	}
	
	private function wp_includes() {

	}
	
	private function wp_includes_admin() {
		wp_enqueue_style( 'cevaw-admin', 
			CEVAW_PLUGIN_URL . 'assets/css/admin.css', 
			array(), 
			CEVAW_PLUGIN_CSS_VERSION 
		);
		// Ativação de módulos
		include_once dirname( __FILE__ ) . '/class-cevaw-settings-modules.php';
	}
	
}

new CEVAW_Load();