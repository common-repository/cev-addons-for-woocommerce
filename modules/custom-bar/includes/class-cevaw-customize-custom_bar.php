<?php
/**
 * Customização para o módulo custom_bar
 */
 
if (!defined('ABSPATH'))
  exit;

function cevaw_get_icons() {
$icons = array( 
'noicon' => 'Sem ícone', 'adjust' => 'xf042', 'adn' => 'xf170', 'align-center' => 'xf037', 'align-justify' => 'xf039',
'align-left' => 'xf036', 'align-right' => 'xf038', 'ambulance' => 'xf0f9', 'anchor' => 'xf13d', 'android' => 'xf17b',
'angle-double-down' => 'xf103', 'angle-double-left' => 'xf100', 'angle-double-right' => 'xf101',
'angle-double-up' => 'xf102', 'angle-down' => 'xf107', 'angle-left' => 'xf104', 'angle-right' => 'xf105',
'angle-up' => 'xf106', 'apple' => 'xf179', 'archive' => 'xf187', 'arrow-circle-down' => 'xf0ab',
'arrow-circle-left' => 'xf0a8', 'arrow-circle-o-down' => 'xf01a', 'arrow-circle-o-left' => 'xf190',
'arrow-circle-o-right' => 'xf18e', 'arrow-circle-o-up' => 'xf01b', 'arrow-circle-right' => 'xf0a9',
'arrow-circle-up' => 'xf0aa', 'arrow-down' => 'xf063', 'arrow-left' => 'xf060', 'arrow-right' => 'xf061',
'arrow-up' => 'xf062', 'arrows' => 'xf047', 'arrows-alt' => 'xf0b2', 'arrows-h' => 'xf07e', 'arrows-v' => 'xf07d',
'asterisk' => 'xf069', 'backward' => 'xf04a', 'ban' => 'xf05e', 'bar-chart-o' => 'xf080', 'barcode' => 'xf02a',
'bars' => 'xf0c9', 'beer' => 'xf0fc', 'behance' => 'xf1b4', 'behance-square' => 'xf1b5', 'bell' => 'xf0f3',
'bell-o' => 'xf0a2', 'bitbucket' => 'xf171', 'bitbucket-square' => 'xf172', 'bold' => 'xf032', 'bolt' => 'xf0e7',
'bomb' => 'xf1e2', 'book' => 'xf02d', 'bookmark' => 'xf02e', 'bookmark-o' => 'xf097', 'briefcase' => 'xf0b1',
'btc' => 'xf15a', 'bug' => 'xf188', 'building' => 'xf1ad', 'building-o' => 'xf0f7', 'bullhorn' => 'xf0a1',
'bullseye' => 'xf140', 'calendar' => 'xf073', 'calendar-o' => 'xf133', 'camera' => 'xf030', 'camera-retro' => 'xf083',
'car' => 'xf1b9', 'caret-down' => 'xf0d7', 'caret-left' => 'xf0d9', 'caret-right' => 'xf0da',
'caret-square-o-down' => 'xf150', 'caret-square-o-left' => 'xf191', 'caret-square-o-right' => 'xf152',
'caret-square-o-up' => 'xf151', 'caret-up' => 'xf0d8', 'certificate' => 'xf0a3', 'chain-broken' => 'xf127',
'check' => 'xf00c', 'check-circle' => 'xf058', 'check-circle-o' => 'xf05d', 'check-square' => 'xf14a',
'check-square-o' => 'xf046', 'chevron-circle-down' => 'xf13a', 'chevron-circle-left' => 'xf137',
'chevron-circle-right' => 'xf138', 'chevron-circle-up' => 'xf139', 'chevron-down' => 'xf078',
'chevron-left' => 'xf053', 'chevron-right' => 'xf054', 'chevron-up' => 'xf077', 'child' => 'xf1ae',
'circle' => 'xf111', 'circle-o' => 'xf10c', 'circle-o-notch' => 'xf1ce', 'circle-thin' => 'xf1db',
'clipboard' => 'xf0ea', 'clock-o' => 'xf017', 'cloud' => 'xf0c2', 'cloud-download' => 'xf0ed',
'cloud-upload' => 'xf0ee', 'code' => 'xf121', 'code-fork' => 'xf126', 'codepen' => 'xf1cb', 'coffee' => 'xf0f4',
'cog' => 'xf013', 'cogs' => 'xf085', 'columns' => 'xf0db', 'comment' => 'xf075', 'comment-o' => 'xf0e5',
'comments' => 'xf086', 'comments-o' => 'xf0e6', 'compass' => 'xf14e', 'compress' => 'xf066', 'credit-card' => 'xf09d',
'crop' => 'xf125', 'crosshairs' => 'xf05b', 'css3' => 'xf13c', 'cube' => 'xf1b2', 'cubes' => 'xf1b3',
'cutlery' => 'xf0f5', 'database' => 'xf1c0', 'delicious' => 'xf1a5', 'desktop' => 'xf108', 'deviantart' => 'xf1bd',
'digg' => 'xf1a6', 'dot-circle-o' => 'xf192', 'download' => 'xf019', 'dribbble' => 'xf17d', 'dropbox' => 'xf16b',
'drupal' => 'xf1a9', 'eject' => 'xf052', 'ellipsis-h' => 'xf141', 'ellipsis-v' => 'xf142', 'empire' => 'xf1d1',
'envelope' => 'xf0e0', 'envelope-o' => 'xf003', 'envelope-square' => 'xf199', 'eraser' => 'xf12d', 'eur' => 'xf153',
'exchange' => 'xf0ec', 'exclamation' => 'xf12a', 'exclamation-circle' => 'xf06a', 'exclamation-triangle' => 'xf071',
'expand' => 'xf065', 'external-link' => 'xf08e', 'external-link-square' => 'xf14c', 'eye' => 'xf06e',
'eye-slash' => 'xf070', 'facebook' => 'xf09a', 'facebook-square' => 'xf082', 'fast-backward' => 'xf049',
'fast-forward' => 'xf050', 'fax' => 'xf1ac', 'female' => 'xf182', 'fighter-jet' => 'xf0fb', 'file' => 'xf15b',
'file-archive-o' => 'xf1c6', 'file-audio-o' => 'xf1c7', 'file-code-o' => 'xf1c9', 'file-excel-o' => 'xf1c3',
'file-image-o' => 'xf1c5', 'file-o' => 'xf016', 'file-pdf-o' => 'xf1c1', 'file-powerpoint-o' => 'xf1c4',
'file-text' => 'xf15c', 'file-text-o' => 'xf0f6', 'file-video-o' => 'xf1c8', 'file-word-o' => 'xf1c2',
'files-o' => 'xf0c5', 'film' => 'xf008', 'filter' => 'xf0b0', 'fire' => 'xf06d', 'fire-extinguisher' => 'xf134',
'flag' => 'xf024', 'flag-checkered' => 'xf11e', 'flag-o' => 'xf11d', 'flask' => 'xf0c3', 'flickr' => 'xf16e',
'floppy-o' => 'xf0c7', 'folder' => 'xf07b', 'folder-o' => 'xf114', 'folder-open' => 'xf07c', 'folder-open-o' => 'xf115',
'font' => 'xf031', 'forward' => 'xf04e', 'foursquare' => 'xf180', 'frown-o' => 'xf119', 'gamepad' => 'xf11b',
'gavel' => 'xf0e3', 'gbp' => 'xf154', 'gift' => 'xf06b', 'git' => 'xf1d3', 'git-square' => 'xf1d2',
'github' => 'xf09b', 'github-alt' => 'xf113', 'github-square' => 'xf092', 'gittip' => 'xf184', 'glass' => 'xf000',
'globe' => 'xf0ac', 'google' => 'xf1a0', 'google-plus' => 'xf0d5', 'google-plus-square' => 'xf0d4',
'graduation-cap' => 'xf19d', 'h-square' => 'xf0fd', 'hacker-news' => 'xf1d4', 'hand-o-down' => 'xf0a7',
'hand-o-left' => 'xf0a5', 'hand-o-right' => 'xf0a4', 'hand-o-up' => 'xf0a6', 'hdd-o' => 'xf0a0',
'header' => 'xf1dc', 'headphones' => 'xf025', 'heart' => 'xf004', 'heart-o' => 'xf08a', 'history' => 'xf1da',
'home' => 'xf015', 'hospital-o' => 'xf0f8', 'html5' => 'xf13b', 'inbox' => 'xf01c', 'indent' => 'xf03c',
'info' => 'xf129', 'info-circle' => 'xf05a', 'inr' => 'xf156', 'instagram' => 'xf16d', 'italic' => 'xf033',
'joomla' => 'xf1aa', 'jpy' => 'xf157', 'jsfiddle' => 'xf1cc', 'key' => 'xf084', 'keyboard-o' => 'xf11c',
'krw' => 'xf159', 'language' => 'xf1ab', 'laptop' => 'xf109', 'leaf' => 'xf06c', 'lemon-o' => 'xf094',
'level-down' => 'xf149', 'level-up' => 'xf148', 'life-ring' => 'xf1cd', 'lightbulb-o' => 'xf0eb',
'link' => 'xf0c1', 'linkedin' => 'xf0e1', 'linkedin-square' => 'xf08c', 'linux' => 'xf17c', 'list' => 'xf03a',
'list-alt' => 'xf022', 'list-ol' => 'xf0cb', 'list-ul' => 'xf0ca', 'location-arrow' => 'xf124', 'lock' => 'xf023',
'long-arrow-down' => 'xf175', 'long-arrow-left' => 'xf177', 'long-arrow-right' => 'xf178', 'long-arrow-up' => 'xf176',
'magic' => 'xf0d0', 'magnet' => 'xf076', 'male' => 'xf183', 'map-marker' => 'xf041', 'maxcdn' => 'xf136',
'medkit' => 'xf0fa', 'meh-o' => 'xf11a', 'microphone' => 'xf130', 'microphone-slash' => 'xf131', 'minus' => 'xf068',
'minus-circle' => 'xf056', 'minus-square' => 'xf146', 'minus-square-o' => 'xf147', 'mobile' => 'xf10b',
'money' => 'xf0d6', 'moon-o' => 'xf186', 'music' => 'xf001', 'openid' => 'xf19b', 'outdent' => 'xf03b',
'pagelines' => 'xf18c', 'paper-plane' => 'xf1d8', 'paper-plane-o' => 'xf1d9', 'paperclip' => 'xf0c6',
'paragraph' => 'xf1dd', 'pause' => 'xf04c', 'paw' => 'xf1b0', 'pencil' => 'xf040', 'pencil-square' => 'xf14b',
'pencil-square-o' => 'xf044', 'phone' => 'xf095', 'phone-square' => 'xf098', 'picture-o' => 'xf03e',
'pied-piper' => 'xf1a7', 'pied-piper-alt' => 'xf1a8', 'pinterest' => 'xf0d2', 'pinterest-square' => 'xf0d3',
'plane' => 'xf072', 'play' => 'xf04b', 'play-circle' => 'xf144', 'play-circle-o' => 'xf01d', 'plus' => 'xf067',
'plus-circle' => 'xf055', 'plus-square' => 'xf0fe', 'plus-square-o' => 'xf196', 'power-off' => 'xf011',
'print' => 'xf02f', 'puzzle-piece' => 'xf12e', 'qq' => 'xf1d6', 'qrcode' => 'xf029', 'question' => 'xf128',
'question-circle' => 'xf059', 'quote-left' => 'xf10d', 'quote-right' => 'xf10e', 'random' => 'xf074',
'rebel' => 'xf1d0', 'recycle' => 'xf1b8', 'reddit' => 'xf1a1', 'reddit-square' => 'xf1a2', 'refresh' => 'xf021',
'renren' => 'xf18b', 'repeat' => 'xf01e', 'reply' => 'xf112', 'reply-all' => 'xf122', 'retweet' => 'xf079',
'road' => 'xf018', 'rocket' => 'xf135', 'rss' => 'xf09e', 'rss-square' => 'xf143', 'rub' => 'xf158',
'scissors' => 'xf0c4', 'search' => 'xf002', 'search-minus' => 'xf010', 'search-plus' => 'xf00e', 'share' => 'xf064',
'share-alt' => 'xf1e0', 'share-alt-square' => 'xf1e1', 'share-square' => 'xf14d', 'share-square-o' => 'xf045',
'shield' => 'xf132', 'shopping-cart' => 'xf07a', 'sign-in' => 'xf090', 'sign-out' => 'xf08b', 'signal' => 'xf012',
'sitemap' => 'xf0e8', 'skype' => 'xf17e', 'slack' => 'xf198', 'sliders' => 'xf1de', 'smile-o' => 'xf118',
'sort' => 'xf0dc', 'sort-alpha-asc' => 'xf15d', 'sort-alpha-desc' => 'xf15e', 'sort-amount-asc' => 'xf160',
'sort-amount-desc' => 'xf161', 'sort-asc' => 'xf0de', 'sort-desc' => 'xf0dd', 'sort-numeric-asc' => 'xf162', 'sort-numeric-desc' => 'xf163', 'soundcloud' => 'xf1be', 'space-shuttle' => 'xf197', 'spinner' => 'xf110',
'spoon' => 'xf1b1', 'spotify' => 'xf1bc', 'square' => 'xf0c8', 'square-o' => 'xf096', 'stack-exchange' => 'xf18d',
'stack-overflow' => 'xf16c', 'star' => 'xf005', 'star-half' => 'xf089', 'star-half-o' => 'xf123', 'star-o' => 'xf006',
'steam' => 'xf1b6', 'steam-square' => 'xf1b7', 'step-backward' => 'xf048', 'step-forward' => 'xf051',
'stethoscope' => 'xf0f1', 'stop' => 'xf04d', 'strikethrough' => 'xf0cc', 'stumbleupon' => 'xf1a4',
'stumbleupon-circle' => 'xf1a3', 'subscript' => 'xf12c', 'suitcase' => 'xf0f2', 'sun-o' => 'xf185',
'superscript' => 'xf12b', 'table' => 'xf0ce', 'tablet' => 'xf10a', 'tachometer' => 'xf0e4', 'tag' => 'xf02b',
'tags' => 'xf02c', 'tasks' => 'xf0ae', 'taxi' => 'xf1ba', 'tencent-weibo' => 'xf1d5', 'terminal' => 'xf120',
'text-height' => 'xf034', 'text-width' => 'xf035', 'th' => 'xf00a', 'th-large' => 'xf009', 'th-list' => 'xf00b',
'thumb-tack' => 'xf08d', 'thumbs-down' => 'xf165', 'thumbs-o-down' => 'xf088', 'thumbs-o-up' => 'xf087',
'thumbs-up' => 'xf164', 'ticket' => 'xf145', 'times' => 'xf00d', 'times-circle' => 'xf057', 'times-circle-o' => 'xf05c',
'tint' => 'xf043', 'trash-o' => 'xf014', 'tree' => 'xf1bb', 'trello' => 'xf181', 'trophy' => 'xf091',
'truck' => 'xf0d1', 'try' => 'xf195', 'tumblr' => 'xf173', 'tumblr-square' => 'xf174', 'twitter' => 'xf099',
'twitter-square' => 'xf081', 'umbrella' => 'xf0e9', 'underline' => 'xf0cd', 'undo' => 'xf0e2', 'university' => 'xf19c',
'unlock' => 'xf09c', 'unlock-alt' => 'xf13e', 'upload' => 'xf093', 'usd' => 'xf155', 'user' => 'xf007',
'user-md' => 'xf0f0', 'users' => 'xf0c0', 'video-camera' => 'xf03d', 'vimeo-square' => 'xf194', 'vine' => 'xf1ca',
'vk' => 'xf189', 'volume-down' => 'xf027', 'volume-off' => 'xf026', 'volume-up' => 'xf028', 'weibo' => 'xf18a',
'weixin' => 'xf1d7', 'wheelchair' => 'xf193', 'windows' => 'xf17a', 'wordpress' => 'xf19a', 'wrench' => 'xf0ad',
'xing' => 'xf168', 'xing-square' => 'xf169', 'yahoo' => 'xf19e', 'youtube' => 'xf167', 'youtube-play' => 'xf16a',
'youtube-square' => 'xf166'
);
	return $icons;
}

require_once( ABSPATH . WPINC . '/class-wp-customize-setting.php' );
require_once( ABSPATH . WPINC . '/class-wp-customize-section.php' );
require_once( ABSPATH . WPINC . '/class-wp-customize-control.php' );

class CEVAW_Customize_Slider_Control extends WP_Customize_Control {

	public $type = 'slider';
	public $max;
	public $min;
	public $step;
	public $unity;

	public function render_content() { ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?>: <span id="amount_<?php echo esc_attr( $this->id ); ?>"><?php echo esc_attr($this->value()); ?></span> <?php echo esc_html( $this->unity ); ?></span>
			<div id="slider">
				<input id="slide_<?php echo esc_attr( $this->id ); ?>" type="range" min="<?php echo esc_attr( $this->min ); ?>" max="<?php echo esc_attr( $this->max ); ?>" step="<?php echo esc_attr( $this->step ); ?>" value="<?php echo esc_attr($this->value()); ?>" onchange="updateSlider(<?php $this->link(); checked( $this->value() ); ?>)" <?php $this->link(); ?> oninput="cevaw_updateTextInput(this.value, 'amount_<?php echo esc_attr( $this->id ); ?>');" />
			</div>
		</label>
	<?php }
}

class FontAwesome_Dropdown_Custom_Control extends WP_Customize_Control
{

	private $icons = false;

	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		$this->icons = cevaw_get_icons();
		parent::__construct( $manager, $id, $args );
	}

	public function render_content() {
		if ( ! empty( $this->icons ) ) { ?>
		  <label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select autocomplete="on" <?php $this->link(); ?> style="font-family: 'FontAwesome', Arial;">
			  <?php
				foreach ( $this->icons as $key => $value ) {
					if ($key == 'noicon') {
						echo '<option value="' . esc_attr($key) . '" ' . 
							selected($this->value(), $key, false) . '>' .
							esc_attr($value) . '</option>';
					} else {
						echo '<option value="fa-' . esc_attr($key) . '" ' . 
							selected($this->value(), $key, false) . '>' .
							esc_attr($key) . ' &#' . esc_attr($value) . '</option>';
					}
				}
			  ?>
			</select>
		  </label>
		<?php }
	}

}

class CEVAW_Help_Control extends WP_Customize_Control {

    public function render_content() {
        echo '<span class="dashicons dashicons-info"></span> <p class="description">' . wp_kses_post( $this->description ) . '</p>';
        echo '<hr />';
    }

}

class CEVAW_Customize_Custom_Bar {
	
	public $cevaw_coupon_url;
	
	public function __construct() {
		$this->cevaw_coupon_url = get_option( 'cevaw_coupon_url', true );
		add_action( 'customize_controls_print_scripts', array( $this , 'inject_js' ) );
		add_action( 'customize_register' , array( $this , 'register' ), 999 );
	}
	
	public function inject_js() {
?>
<script>
function cevaw_updateTextInput(val, field) {
	document.getElementById(field).innerHTML = val;
}
</script>
<?php
	}
	
	public function sanitize_select( $input, $setting ){
	  
		// input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key($input);

		// get the list of possible select options 
		$choices = $setting->manager->get_control( $setting->id )->choices;
						  
		// return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
		  
	}
	
	public function sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
	
	public function sanitize_integer( $input ) {
		if( is_numeric( $input ) ) {
			return intval( $input );
		}
	}

	public function sanitize_icon( $input ) {
		if ( array_key_exists( str_replace('fa-', '', $input), cevaw_get_icons() ) ) {
			return $input;
		} else {
			return 'noicon';
		}
	}

	public function register( $wp_customize ) {
		
		// Painel
		$wp_customize->add_panel( 'cevaw_custom_bar_panel', array(
				'title'            => __( 'CEV Barra', 'cev-addons-for-woocommerce' ),
				'description'      => __( 'Personalização da barra de avisos.', 'cev-addons-for-woocommerce' ),
				'priority'       => 20
			) 
		);

		// Sessões
		$wp_customize->add_section('cevaw_custom_bar_session_general', array(
				'title'		=> __( 'Geral', 'cev-addons-for-woocommerce' ),
				'description'      => __( 'Configurações principais da barra.', 'cev-addons-for-woocommerce' ),
				'panel'		=> 'cevaw_custom_bar_panel',
				'priority'	=> 10,
			)
		);
		$wp_customize->add_section('cevaw_custom_bar_session_content', array(
				'title'		=> __( 'Conteúdo', 'cev-addons-for-woocommerce' ),
				'description'      => __( 'Conteúdo da barra.', 'cev-addons-for-woocommerce' ),
				'panel'		=> 'cevaw_custom_bar_panel',
				'priority'	=> 20,
			)
		);
		$wp_customize->add_section('cevaw_custom_bar_session_icon', array(
				'title'		=> __( 'Ícones', 'cev-addons-for-woocommerce' ),
				'description'      => __( 'Configurações do ícone da barra.', 'cev-addons-for-woocommerce' ),
				'panel'		=> 'cevaw_custom_bar_panel',
				'priority'	=> 30,
			)
		);
		$wp_customize->add_section('cevaw_custom_bar_session_design', array(
				'title'		=> __( 'Design', 'cev-addons-for-woocommerce' ),
				'description'      => __( 'Design da barra.', 'cev-addons-for-woocommerce' ),
				'panel'		=> 'cevaw_custom_bar_panel',
				'priority'	=> 40,
			)
		);

		// Sessão Geral
		$wp_customize->add_setting( 'cevaw_custombar[bar_display]', array( 
				'default' 			=> 'show',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[bar_display]',array(
				'type' => 'select',
				'label' => __( 'Exibição da barra', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_general',
				'settings'   => 'cevaw_custombar[bar_display]',
				'choices' => array( 
					'show' => 'Mostrar',
					'hide' => 'Esconder'
				)
			)
		);

		$wp_customize->add_setting( 'cevaw_custombar[localization]', array( 
				'default' 			=> 'top',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[localization]',array(
				'type' => 'select',
				'label' => __( 'Localização da barra', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_general',
				'settings'   => 'cevaw_custombar[localization]',
				'choices' => array( 
					'top' => 'Superior',
					'bottom' => 'Inferior'
				)
			)
		);
	
		$wp_customize->add_setting( 'cevaw_custombar[position]', array( 
				'default' 			=> 'relative',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[position]',array(
				'type' => 'select',
				'label' => __( 'Layout da barra', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_general',
				'settings'   => 'cevaw_custombar[position]',
				'choices' => array( 					
					'static'	=> 'Static',
					'relative'	=> 'Relative',
					'fixed'		=> 'Fixed',
					'absolute'	=> 'Absolute',
					'sticky'	=> 'Sticky'
				)
			)
		);


		$wp_customize->add_setting( 'cevaw_custombar[bar_behavior_help]',
		  array(
			'type'				=> 'option',
		  )
		);
		$wp_customize->add_control( new CEVAW_Help_Control( $wp_customize, 'cevaw_custombar[bar_behavior_help]', 
				array(
					'label'    => __( 'Ajuda', 'cev-addons-for-woocommerce' ),
					'section'  => 'cevaw_custom_bar_session_general',
					'description'      => __( '<b>Primeiro acesso</b><br>
	A barra será exibida no primeiro acesso ao site e não será mostrada nas páginas seguintes.<br>
	<br>
	<b>Compra não finalizada</b><br>
	A barra será exibida enquanto a compra não for finalizada.<br>
	', 'cev-addons-for-woocommerce' ),
				) 
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[bar_display_type]', array( 
				'default' 			=> 'use_of_coupons',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[bar_display_type]',array(
				'type' => 'select',
				'label' => __( 'Tipo de exibição', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_general',
				'settings'   => 'cevaw_custombar[bar_display_type]',
				'choices' => array( 					
					'use_of_coupons'	=> 'Uso de cupons',
					'fixed_bar'			=> 'Barra fixa'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[bar_display_help]',
		  array(
			'type'				=> 'option',
		  )
		);
		$wp_customize->add_control( new CEVAW_Help_Control( $wp_customize, 'cevaw_custombar[bar_display_help]', 
			array(
				'label'    => __( 'Ajuda', 'cev-addons-for-woocommerce' ),
				'section'  => 'cevaw_custom_bar_session_general',
				'description'      => __( '<b>Uso de cupons</b><br>
A barra só será exibida caso algum cupom esteja configurado pelo plugin <b>' . CEVAW_PLUGIN_NAME . '</b> e o usuário tenha acesso a este cupom.<br>
<br>
<b>Barra fixa</b><br>
A barra será exibida sempre. Útil para avisos que não dependem de exibição de cupom. Para o perfeiro funcionamento desta opção, configure o <b>Comportamento da barra</b> para <b>Exibir sempre</b>.', 'cev-addons-for-woocommerce' ),
			) 
		  )
		);

		$wp_customize->add_setting( 'cevaw_custombar[animation-name]', array( 
				'default' 			=> 'noanimation',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[animation-name]', array(
				'type' => 'select',
				'label' => __( 'Animação', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_general',
				'settings'   => 'cevaw_custombar[animation-name]',
				'choices' => array( 					
					'noanimation'	=> 'Sem animação',
					'bounce'		=> 'Bounce',
					'flash'			=> 'Flash',
					'pulse'			=> 'Pulse',
					'shake'			=> 'Shake',
					'swing'			=> 'Swing',
					'tada'			=> 'Tada',
					'wobble'		=> 'Wobble',
					'jello'			=> 'Jello'

				)
			)
		);

		$wp_customize->add_setting( 'cevaw_custombar[animation-duration]', array( 
				'default' 			=> 1,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[animation-duration]', 
				array(
					'label' 	=> __( 'Duração da animação', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_general',
					'settings'	=> 'cevaw_custombar[animation-duration]',
					'min'		=> 0,
					'max'		=> 5,
					'step'		=> 0.5,
					'unity'		=> 's',
					'type' 		=> 'text'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[animation-delay]', array( 
				'default' 			=> 0,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[animation-delay]', 
				array(
					'label' 	=> __( 'Atraso da animação', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_general',
					'settings'	=> 'cevaw_custombar[animation-delay]',
					'min'		=> 0,
					'max'		=> 5,
					'step'		=> 0.5,
					'unity'		=> 's',
					'type' 		=> 'text'
				)
			)
		);
		
		// Sessão Conteúdo
		$wp_customize->add_setting( 'cevaw_custombar[content_text]', array(
				'default'			=> '',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control('cevaw_custombar[content_text]', array(
			'label' => __( 'Texto da barra', 'cev-addons-for-woocommerce' ),
			'section' => 'cevaw_custom_bar_session_content',
			'settings' => 'cevaw_custombar[content_text]',
			'type' => 'text',
		));
		

		$wp_customize->add_setting( 'cevaw_custombar[content_text_help]',
		  array(
			'type'				=> 'option',
		  )
		);
		$wp_customize->add_control( new CEVAW_Help_Control( $wp_customize, 'cevaw_custombar[content_text_help]', 
			array(
				'label'    => __( 'Ajuda', 'cev-addons-for-woocommerce' ),
				'section'  => 'cevaw_custom_bar_session_content',
				'description'      => __( 'Caso você preencha o texto da barra no próprio cupom, ele irá ter prioridade em relação ao <b>Texto da barra</b><br><br>Para compor o texto da barra você pode usar a variável <b>[coupon_code]</b> e com isso conseguirá personalizar a cor do código do cupom.<br><br>Use <b>[dbr]</b> para quebra de linha no desktop (<i>no mobile corresponderá a um espaço</i>).<br><br>Use <b>[mbr]</b> para quebra de linha no mobile (<i>no desktop corresponderá a um espaço</i>).', 'cev-addons-for-woocommerce' ),
			) 
		  )
		);
		
		// Sessão Ícone
		$wp_customize->add_setting( 'cevaw_custombar[icon]',
		  array(
			'default'			=> 'noicon' ,
			'sanitize_callback'	=> array( $this, 'sanitize_icon' ),
			'type'				=> 'option',
		  )
		);
		$wp_customize->add_control( new FontAwesome_Dropdown_Custom_Control( $wp_customize, 'cevaw_custombar[icon]', 
			array(
				'label'    => __( 'Ícone', 'cev-addons-for-woocommerce' ),
				'section'  => 'cevaw_custom_bar_session_icon',
				'settings' => 'cevaw_custombar[icon]',
			) 
		  )
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[icon_help]',
		  array(
			'type'				=> 'option',
		  )
		);
		$wp_customize->add_control( new CEVAW_Help_Control( $wp_customize, 'cevaw_custombar[icon_help]', 
				array(
					'label'    => __( 'Ajuda', 'cev-addons-for-woocommerce' ),
					'section'  => 'cevaw_custom_bar_session_icon',
					'description'      => __( '<b>Font Awesome</b><br>
	Certifique-se que o seu tema incluiu a Font Awesome, caso contrário escolha a opção <b>Sem ícone</b>.<br>
	<br>
	Se a Font Awesome não estiver carregada, você pode instalar o plugin <a href="https://br.wordpress.org/plugins/font-awesome/" target="_blank"><b>Font Awesome</b></a>.<br>
	', 'cev-addons-for-woocommerce' ),
				) 
			)
		);

		$wp_customize->add_setting( 'cevaw_custombar[icon_color]', array(
				'default' 			=> '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
				'type'           	=> 'option',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cevaw_custombar[icon_color]',
				array(
					'label'      => __( 'Cor do ícone', 'cev-addons-for-woocommerce' ),
					'section'    => 'cevaw_custom_bar_session_icon',
					'settings'   => 'cevaw_custombar[icon_color]',
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[icon_size]', array( 
				'default' 			=> 14,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[icon_size]', 
				array(
					'label' 	=> __( 'Tamanho', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_icon',
					'settings'	=> 'cevaw_custombar[icon_size]',
					'min'		=> 14,
					'max'		=> 30,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);

		$wp_customize->add_setting( 'cevaw_custombar[icon_margin-right]', array( 
				'default' 			=> 5,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[icon_margin-right]', 
				array(
					'label' 	=> __( 'Margem direita', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_icon',
					'settings'	=> 'cevaw_custombar[icon_margin-right]',
					'min'		=> 0,
					'max'		=> 30,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);
	
		$wp_customize->add_setting( 'cevaw_custombar[iconclose_color]', array(
				'default' 			=> '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
				'type'           	=> 'option',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cevaw_custombar[iconclose_color]',
				array(
					'label'      => __( 'Cor do ícone fechar', 'cev-addons-for-woocommerce' ),
					'section'    => 'cevaw_custom_bar_session_icon',
					'settings'   => 'cevaw_custombar[iconclose_color]',
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[iconclose_size]', array( 
				'default' 			=> 14,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[iconclose_size]', 
				array(
					'label' 	=> __( 'Tamanho ícone fechar', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_icon',
					'settings'	=> 'cevaw_custombar[iconclose_size]',
					'min'		=> 14,
					'max'		=> 30,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);

		// Sessão Design 
		$wp_customize->add_setting( 'cevaw_custombar[bgcolor]', array(
				'default' 			=> '#d8d8d8',
				'sanitize_callback' => 'sanitize_hex_color',
				'type'           	=> 'option',
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cevaw_custombar[bgcolor]',
				array(
					'label'      => __( 'Cor de fundo', 'cev-addons-for-woocommerce' ),
					'section'    => 'cevaw_custom_bar_session_design',
					'settings'   => 'cevaw_custombar[bgcolor]',
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[textcolor]', array(
				'default' 			=> '#5b5b5b',
				'sanitize_callback' => 'sanitize_hex_color',
				'type'           	=> 'option',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cevaw_custombar[textcolor]',
				array(
					'label'      => __( 'Cor da fonte', 'cev-addons-for-woocommerce' ),
					'section'    => 'cevaw_custom_bar_session_design',
					'settings'   => 'cevaw_custombar[textcolor]',
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[font-size]', array( 
				'default' 			=> 14,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[font-size]', 
				array(
					'label' 	=> __( 'Tamanho da fonte', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_design',
					'settings'	=> 'cevaw_custombar[font-size]',
					'min'		=> 14,
					'max'		=> 30,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[line-height]', array( 
				'default' 			=> 26,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[line-height]', 
				array(
					'label' 	=> __( 'Altura da linha', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_design',
					'settings'	=> 'cevaw_custombar[line-height]',
					'min'		=> 1,
					'max'		=> 40,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[font-weight]', array( 
				'default' 			=> '400',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[font-weight]',array(
				'type' => 'select',
				'label' => __( 'Peso da fonte', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_design',
				'settings'   => 'cevaw_custombar[font-weight]',
				'choices' => array( 
					'100' => '100',
					'200' => '200',
					'300' => '300',
					'400' => '400',
					'500' => '500',
					'600' => '600',
					'700' => '700',
					'800' => '800',
					'900' => '900'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[font-align]', array( 
				'default' 			=> 'left',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[font-align]',array(
				'type' => 'select',
				'label' => __( 'Alinhamento do texto', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_design',
				'settings'   => 'cevaw_custombar[font-align]',
				'choices' => array( 
					'center'	=> 'center',
					'left'		=> 'left',
					'right'		=> 'right'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[padding-top]', array( 
				'default' 			=> 5,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[padding-top]', 
				array(
					'label' 	=> __( 'Preenchimento superior', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_design',
					'settings'	=> 'cevaw_custombar[padding-top]',
					'min'		=> 0,
					'max'		=> 100,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[padding-bottom]', array( 
				'default' 			=> 5,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[padding-bottom]', 
				array(
					'label' 	=> __( 'Preenchimento inferior', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_design',
					'settings'	=> 'cevaw_custombar[padding-bottom]',
					'min'		=> 0,
					'max'		=> 100,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[padding-left]', array( 
				'default' 			=> 25,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[padding-left]', 
				array(
					'label' 	=> __( 'Preenchimento esquerdo', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_design',
					'settings'	=> 'cevaw_custombar[padding-left]',
					'min'		=> 0,
					'max'		=> 100,
					'step'		=> 1,
					'unity'		=> 'px',
					'type' 		=> 'text'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[padding-right]', array( 
				'default' 			=> 25,
				'sanitize_callback' => array( $this, 'sanitize_integer' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( new CEVAW_Customize_Slider_Control( $wp_customize, 'cevaw_custombar[padding-right]', 
				array(
					'label' 	=> __( 'Preenchimento direito', 'cev-addons-for-woocommerce' ),
					'section' 	=> 'cevaw_custom_bar_session_design',
					'settings'	=> 'cevaw_custombar[padding-right]',
					'min'		=> 0,
					'max'		=> 100,
					'step'		=> 1,
					'unity'		=> 'px',
					'type'		=> 'text'
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[coupon_textcolor]', array(
				'default' 			=> '#5b5b5b',
				'sanitize_callback' => 'sanitize_hex_color',
				'type'           	=> 'option',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cevaw_custombar[coupon_textcolor]',
				array(
					'label'      => __( 'Cor do código do cupom', 'cev-addons-for-woocommerce' ),
					'section'    => 'cevaw_custom_bar_session_design',
					'settings'   => 'cevaw_custombar[coupon_textcolor]',
				)
			)
		);
		
		$wp_customize->add_setting( 'cevaw_custombar[coupon_font-weight]', array( 
				'default' 			=> '700',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
				'type'           	=> 'option',
			) 
		);
		$wp_customize->add_control( 'cevaw_custombar[coupon_font-weight]',array(
				'type' => 'select',
				'label' => __( 'Peso da fonte do cupom', 'cev-addons-for-woocommerce' ),
				'section' => 'cevaw_custom_bar_session_design',
				'settings'   => 'cevaw_custombar[coupon_font-weight]',
				'choices' => array( 
					'100' => '100',
					'200' => '200',
					'300' => '300',
					'400' => '400',
					'500' => '500',
					'600' => '600',
					'700' => '700',
					'800' => '800',
					'900' => '900'
				)
			)
		);

	}

}

new CEVAW_Customize_Custom_Bar();
?>