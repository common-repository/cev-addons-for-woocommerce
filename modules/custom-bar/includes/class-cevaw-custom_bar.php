<?php
/**
 * Carregamento no site - módulo custom_bar
 */

if (!defined('ABSPATH'))
  exit;

class CEVAW_Custom_Bar {
	
	//public $cevaw_coupon_url;
	public $cevaw_custombar = array();
	public $cevaw_coupon_url;
	public $cevaw_coupon_code = '';
	public $cevaw_modules;
	public $bar_html;
	public $cevaw_is_coupon_valid = false;
	public $cevaw_option_custom_bar_text = '';

	public function __construct() {
		// Módulos ativos
		$this->cevaw_modules = get_option( 'cevaw_modules', true );
		
		$this->custombar_load();
		
		// Módulo coupon-url
		if ($this->cevaw_modules['coupon_url_active']) {
			$this->cevaw_coupon_url = get_option( 'cevaw_coupon_url', true );
			if (isset($this->cevaw_coupon_url['coupon_code'])) {
				$this->cevaw_coupon_code = $this->cevaw_coupon_url['coupon_code'];
			} else {
				$this->cevaw_coupon_code = 'cod_cupom';
			}
		}
		
		if (!is_customize_preview()) {
			// Quando a barra está sendo personalizada não pode ser JS
			add_action( 'wp_enqueue_scripts', array($this, 'render_content') );
		}
		
		add_action( 'wp_head', array( $this , 'inject_css' ) );
		add_action( 'wp_body_open', array( $this , 'top_bar_html' ), 0 );
		add_action( 'wp_footer', array( $this , 'bottom_bar_html' ), 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 9999 );
		//add_action( 'template_redirect', array( $this, 'custom_bar_redirect' ), 0 );
	}
	
	public function enqueue_scripts() {
		if ($this->cevaw_custombar['icon'] == 'noicon') {
			wp_enqueue_style( 'dashicons' );
		}
	}
	
	public function is_coupon_valid( $coupon_code ) {
		$coupon = new \WC_Coupon( $coupon_code );
		
		// Aproveita que o cupom foi instanciado e pega o texto da barra
		$this->cevaw_option_custom_bar_text = $coupon->get_meta('cevaw_custom_bar_text');
		if (!empty($coupon->customer_email)) {
			$current_user = wp_get_current_user();
			if (!in_array($current_user->user_email, $coupon->customer_email)) {
				return false;
			}
			$user_email = $current_user->user_email;
		}
		$discounts = new \WC_Discounts( WC()->cart );
		$response = $discounts->is_coupon_valid( $coupon );
		return is_wp_error( $response ) ? false : true;     
	}
	
	public function custombar_load() {
		if (is_customize_preview() or empty($this->cevaw_custombar)) {
			$this->cevaw_custombar = $this->default_value( get_option('cevaw_custombar') );
		}
	}
	
	public function default_value($cevaw_custombar) {
		$default_cevaw_custombar = array(
			'bgcolor' => '#d8d8d8',
			'textcolor' => '#5b5b5b',
			'textcolor' => '#5b5b5b',
			'padding-top' => 5,
			'padding-bottom' => 5,
			'padding-left' => 25,
			'padding-right' => 25,
			'localization' => 'top',
			'position' => 'relative',
			'icon' => 'noicon',
			'icon_color' => '#000000',
			'icon_size' => 14,
			'content_text' => '',
			'font-size' => 14,
			'font-weight' => '400',
			'icon_margin-right' => 5,
			'font-align' => 'left',
			'animation-name' => 'noanimation',
			'animation-duration' => 1,
			'animation-delay' => 0,
			'iconclose_color' => '#000000',
			'iconclose_size' => 14,
			'bar_behavior' => 'first_access',
			'bar_display_type' => 'use_of_coupons',
			'bar_display' => 'show',
			'coupon_textcolor' => '#5b5b5b',
			'coupon_font-weight' => '700',
			'line-height' => 26,
		);

		// Ainda não tem dados no DB
		if ($cevaw_custombar === false) {
			$return_cevaw_custombar = $default_cevaw_custombar;
		} else {
			$return_cevaw_custombar = array_merge($default_cevaw_custombar, $cevaw_custombar);
		}

		return $return_cevaw_custombar;
	}
	
	public function inject_css() {
		$this->custombar_load();
		
		$animation = '';
		if ($this->cevaw_custombar['animation-name'] != 'noanimation') {
			$animation = 
				PHP_EOL . '				animation-name: ' . $this->cevaw_custombar['animation-name'] . ';' . 
				PHP_EOL . '				animation-duration: ' . $this->cevaw_custombar['animation-duration'] . 's;' . 
				PHP_EOL . '				animation-delay: ' . $this->cevaw_custombar['animation-delay'] . 's;' .
				PHP_EOL;
		}
		
		?>
		<style>
			.cevaw_custom_bar_div {
				position: <?php echo esc_attr( $this->cevaw_custombar['position'] ); ?>;
				z-index:99999; 
				width:100%;
				background: <?php echo esc_attr( $this->cevaw_custombar['bgcolor'] ); ?>; 
				padding-top: <?php echo esc_attr( $this->cevaw_custombar['padding-top'] ); ?>px;
				padding-right: <?php echo esc_attr( $this->cevaw_custombar['padding-right'] ); ?>px;
				padding-bottom: <?php echo esc_attr( $this->cevaw_custombar['padding-bottom'] ); ?>px;
				padding-left: <?php echo esc_attr( $this->cevaw_custombar['padding-left'] ); ?>px;
				text-align: <?php echo esc_attr( $this->cevaw_custombar['font-align'] ); ?>;
				bottom: 0;<?php echo esc_attr( $animation ); ?>
			}
			
			.cevaw_custom_bar_text {
				color: <?php echo esc_attr( $this->cevaw_custombar['textcolor'] ); ?>;
				font-size: <?php echo esc_attr( $this->cevaw_custombar['font-size'] ); ?>px;
				font-weight: <?php echo esc_attr( $this->cevaw_custombar['font-weight'] ); ?>;
				line-height: <?php echo esc_attr( $this->cevaw_custombar['line-height'] ); ?>px;
			}
			
			.cevaw_custom_bar_icon {
				font-family: 'FontAwesome';
				font-style: normal !important;
				color: <?php echo esc_attr( $this->cevaw_custombar['icon_color'] ); ?>;
				font-size: <?php echo esc_attr( $this->cevaw_custombar['icon_size'] ); ?>px;
				margin-right: <?php echo esc_attr( $this->cevaw_custombar['icon_margin-right'] ); ?>px;
				line-height: <?php echo esc_attr( $this->cevaw_custombar['line-height'] ); ?>px;
			}
			
			.cevaw_custom_bar_btnclose {
<?php if ($this->cevaw_custombar['icon'] != 'noicon') { ?>
				font-family: 'FontAwesome';
<?php } ?>
				font-style: normal !important;
				color: <?php echo esc_attr( $this->cevaw_custombar['iconclose_color'] ); ?>;
				font-size: <?php echo esc_attr( $this->cevaw_custombar['iconclose_size'] ); ?>px;
				position: absolute;
				right: 5px;
				top: 0px;
				cursor: pointer;
			}
			
			.cevaw_custom_bar_coupon_code {
				color: <?php echo esc_attr( $this->cevaw_custombar['coupon_textcolor'] ); ?>;
				font-weight: <?php echo esc_attr( $this->cevaw_custombar['coupon_font-weight'] ); ?>;
			}
			
			.cevaw_content_desktop { display: block; }
			.cevaw_content_mobile { display: none; }

			@media screen and (max-width: 768px)
			{
				.cevaw_content_desktop { display: none; }
				.cevaw_content_mobile { display: block; }
			}
		</style>
		<?php  
	}
	
	public function get_coupon_code() {
		/**
		 * Módulo coupon-url
		 */
		
		$arReturn = array(
			'coupon_code' => '',
			'get' => false,
			'session' => false
		);
		
		// Verifica se o móduo está ativo
		if ($this->cevaw_modules['coupon_url_active']) {
			
			// Verifica se o campo de código de cupom está configurado
			if (!empty($this->cevaw_coupon_code)) {
				
				// Verifica se o parâmetro na URL foi passado
				if( isset($_GET[$this->cevaw_coupon_code]) ) {
					$arReturn['coupon_code'] = sanitize_text_field( $_GET[$this->cevaw_coupon_code] );
					if (!empty($arReturn['coupon_code'])) {
						$arReturn['get'] = true;
					}
				} else {
					// Senão tenta pegar da sessão do WooCommerce
					$arReturn['coupon_code'] = WC()->session->get('cevaw_coupon_code');
					if (!empty($arReturn['coupon_code'])) {
						$arReturn['session'] = true;
					}
				}
			}
		}
		

		if (!empty($arReturn['coupon_code'])) {
			$this->cevaw_is_coupon_valid = $this->is_coupon_valid( $arReturn['coupon_code'] );
		}
		/** Fim do módulo coupon-url */
		
		return $arReturn;
	}
	
	/**
	 * Regras para exibição da barra
	 */
	public function show_bar() {
		// Se estiver personalizando a barra
		if (is_customize_preview()) {
			return true;
		}

		// Se não estiver exibindo a barra no site
		if ( $this->cevaw_custombar['bar_display'] != 'show' ) {
			return false;
		}

		// Se for barra fixa sempre exibir
		if ($this->cevaw_custombar['bar_display_type'] == 'fixed_bar') {
			// Se não tiver texto
			if ( empty($this->cevaw_custombar['content_text']) ) {
				return false;
			} else {
				return true;
			}
			
		// Se for para uso de cupons do plugin, verificar se tem um cupom configurado
		} else if ($this->cevaw_custombar['bar_display_type'] == 'use_of_coupons') {
			
			// Pega o código do cupom 
			$get_coupon_code = $this->get_coupon_code();
			
			// Verifica se o cupom é válido para essa compra
			// Só pode usar cevaw_is_coupon_valida depois da chamada da função get_coupon_code
			if (!$this->cevaw_is_coupon_valid) {
				return false;
			}
			
			// Se o cupom tiver o texto da barra preenchido, sobrepor
			if (!empty($this->cevaw_option_custom_bar_text)) {
				$this->cevaw_custombar['content_text'] = $this->cevaw_option_custom_bar_text;
			}

			// Se não tiver texto
			if ( empty($this->cevaw_custombar['content_text']) ) {
				return false;
			}
			
			// Se tiver um cupom disponível
			if (!empty($get_coupon_code['coupon_code'])) {
				
				// Módulo coupon-url
				if ($this->cevaw_modules['coupon_url_active'] and $get_coupon_code['get']) {
					return true;
				}

			}
		
		}
		
		return false;
	}

	public function render_content() {
		$bar_html = '';

		// Regras para exibição da barra
		$boShowBar = $this->show_bar();
		if ($boShowBar) {

			// Se estiver no personalizar e não tiver texto para apresentar
			if ( is_customize_preview() and empty($this->cevaw_custombar['content_text']) ) {
				$this->cevaw_custombar['content_text'] = __( 'Preencha o texto da barra. Cupom: [coupon_code]', 'cev-addons-for-woocommerce' );
			}

			$cevaw_coupon_code_html = '';
			
			$get_coupon_code = $this->get_coupon_code();
			$cevaw_coupon_code = $get_coupon_code['coupon_code'];
			
			// Se estiver personalizando a barra
			if ( is_customize_preview() and empty($cevaw_coupon_code) ) {
				$cevaw_coupon_code = 'coupon_code';
			}
			
			if (!empty($cevaw_coupon_code)) {
				$cevaw_coupon_code_html = '<span class="cevaw_custom_bar_coupon_code">' . $cevaw_coupon_code . '</span>';
				$content_text = str_replace( '[coupon_code]', $cevaw_coupon_code_html, $this->cevaw_custombar['content_text'] );
			} else {
				$content_text = $this->cevaw_custombar['content_text'];
			}

			// Se estiver usando noicon usar o dashicon no lugar do font awesome
			if ($this->cevaw_custombar['icon'] == 'noicon') {
				$btn_close = '<span class="cevaw_custom_bar_btnclose dashicons dashicons-dismiss" onclick="cevaw_custom_bar_div_hide()"></span>';
			} else {
				$btn_close = '<i class="cevaw_custom_bar_btnclose fa-solid fa-times-circle" onclick="cevaw_custom_bar_div_hide()"></i>';
			}
			
			if (empty($this->cevaw_custombar['icon']) or $this->cevaw_custombar['icon'] == 'noicon') {
				$stIcon = '';
			} else {
				$stIcon = '<i class="cevaw_custom_bar_icon fa-solid ' . $this->cevaw_custombar['icon'] . '"></i> ';
			}
			$stIcon = apply_filters( 'cevaw_custombar_icon', $stIcon );
			$btn_close = apply_filters( 'cevaw_custombar_btnclose', $btn_close );
			$content_text = apply_filters( 'cevaw_custombar_contenttext', $content_text );
			
			// Desktop
			$content_text_desktop = str_replace( '[mbr]', ' ', $content_text );
			$content_text_desktop = str_replace( '[dbr]', '<br>', $content_text_desktop );
			$bar_html = '<div id="cevaw_custom_bar_div" class="cevaw_content_desktop cevaw_custom_bar_div">' . $stIcon . 
				'<span class="cevaw_custom_bar_text">' . $content_text_desktop . '</span>' . 
				$btn_close . '</div>';
				
			// Mobile
			$content_text_mobile = str_replace( '[mbr]', '<br>', $content_text );
			$content_text_mobile = str_replace( '[dbr]', ' ', $content_text_mobile );
			$bar_html .= '<div id="cevaw_custom_bar_div" class="cevaw_content_mobile cevaw_custom_bar_div">' . $stIcon . 
				'<span class="cevaw_custom_bar_text">' . $content_text_mobile . '</span>' . 
				$btn_close . '</div>';
			
		}
		$this->bar_html = apply_filters( 'cevaw_custombar_html', $bar_html );
		
		if (!is_customize_preview()) {
			// Quando for acesso do site usar JS por conta do cache
			wp_add_inline_script( 'cevaw-custom-bar', "const cevaw_bar_html = '" . $this->bar_html . "';", 'before' );
		}
	}
	
	public function top_bar_html() {
		if ($this->cevaw_custombar['localization'] == 'top') {
			if (is_customize_preview()) {
				// Quando estiver personalizando imprimir. Não pode usar JS.
				$this->render_content();
				echo wp_kses_post($this->bar_html);
			} else {
?>
<script type="text/javascript">
cevaw_custom_bar_print();
</script>
<?php
			}
		}
	}
	
	public function bottom_bar_html() {
		if ($this->cevaw_custombar['localization'] == 'bottom') {
			if (is_customize_preview()) {
				// Quando estiver personalizando imprimir. Não pode usar JS.
				$this->render_content();
				echo wp_kses_post($this->bar_html);
			} else {
?>
<script type="text/javascript">
cevaw_custom_bar_print();
</script>
<?php
			}
		}
	}
}

new CEVAW_Custom_Bar();
?>