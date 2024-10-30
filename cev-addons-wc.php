<?php
/**
 * Plugin Name: CEV Addons for Woocommerce
 * Description: Complementos para WooCommerce.
 * Version: 1.0.3
 * Author: Ramiro Lobo
 * Author URI: https://www.ramirolobo.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cev-addons-for-woocommerce
 * Domain Path: /languages
 * Requires at least: 5.5
 * Requires PHP: 7.0
 */
			
if (!defined('ABSPATH'))
  exit;

define('CEVAW_PLUGIN_NAME', 'CEV Addons for Woocommerce');
define('CEVAW_PLUGIN_NAME_SHORT', 'CEV Addons');
define('CEVAW_PLUGIN_VERSION', '1.0.3');
define('CEVAW_PLUGIN_DOCUMENTATION_URL', 'https://www.ramirolobo.com/2022/03/31/plugin-cev-addons-for-woocommerce/');
define('CEVAW_PLUGIN_DOCUMENTATION_URL', '');
define('CEVAW_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('CEVAW_PLUGIN_CSS_VERSION', '1.0.0');
define('CEVAW_PLUGIN_JS_VERSION', '1.0.3');
define('CEVAW_PLUGIN_FILE', __FILE__ );
define('CEVAW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('CEVAW_PLUGIN_SLUG', 'cev-addons-for-woocommerce');

// Carrega o plugin, após todos os outros plugins serem carregados
include_once dirname( __FILE__ ) . '/includes/class-cevaw-load.php';

