<?php
/**
 * Display Featured Image for Genesis
 *
 * @package   DisplayFeaturedImageGenesis
 * @author    Robin Cornett <hello@robincornett.com>
 * @link      https://github.com/robincornett/display-featured-image-genesis/
 * @copyright 2014 Robin Cornett
 * @license   GPL-2.0+
 */

/**
 * Main plugin class.
 *
 * @package DisplayFeaturedImageGenesis
 */
class Display_Featured_Image_Genesis {
	function __construct( $output, $settings ) {
		$this->output   = $output;
		$this->settings = $settings;
	}

	public function run() {
		if ( basename( get_template_directory() ) !== 'genesis' ) {
			add_action( 'admin_init', array( $this, 'deactivate' ) );
			add_action( 'admin_notices', array( $this, 'error_message' ) );
			return;
		}
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'admin_init', array( $this->settings, 'register_settings' ) );
		add_action( 'load-options-media.php', array( $this->settings, 'help' ) );
		add_action( 'get_header', array( $this->output, 'manage_output' ) );
	}

	/**
	 * deactivates the plugin if Genesis isn't running
	 *
	 *  @since 1.1.2
	 *
	 */
	public function deactivate() {
		if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
			deactivate_plugins( plugin_basename( dirname( __DIR__ ) ) . '/display-featured-image-genesis.php' ); // __DIR__ is a magic constant introduced in PHP 5.3
		}
		else {
			deactivate_plugins( plugin_basename( dirname( dirname( __FILE__ ) ) ) . '/display-featured-image-genesis.php' );
		}
	}

	/**
	 * Error message if we're not using the Genesis Framework.
	 *
	 * @since 1.1.0
	 */
	public function error_message() {
		if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
			echo '<div class="error"><p>' . sprintf(
				__( 'Sorry, Display Featured Image for Genesis works only with the Genesis Framework. It has been deactivated.', 'display-featured-image-genesis' ) ) . '</p></div>';
		}
		else {
			echo '<div class="error"><p>' . sprintf(
				__( 'Sorry, Display Featured Image for Genesis works only with the Genesis Framework. It has been deactivated. But since we&#39;re talking anyway, did you know that your server is running PHP version %1$s, which is outdated? You should ask your host to update that for you.', 'display-featured-image-genesis' ),
				PHP_VERSION
				) . '</p></div>';
		}

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
	}

	/**
	 * Set up text domain for translations
	 *
	 * @since 1.1.0
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'display-featured-image-genesis', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

}
