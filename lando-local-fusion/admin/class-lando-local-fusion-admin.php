<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/SPACED-MAN/wp-plugin--lando-local-fusion
 * @since      1.0.0
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/admin
 * @author     Tyler Shingleton <i@spaced-man.com>
 */
class Lando_Local_Fusion_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $lando_local_fusion    The ID of this plugin.
	 */
	private $lando_local_fusion;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $lando_local_fusion       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $lando_local_fusion, $version ) {

		$this->lando_local_fusion = $lando_local_fusion;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	// public function enqueue_styles() {

	// 	/**
	// 	 * This function is provided for demonstration purposes only.
	// 	 *
	// 	 * An instance of this class should be passed to the run() function
	// 	 * defined in Lando_Local_Fusion_Loader as all of the hooks are defined
	// 	 * in that particular class.
	// 	 *
	// 	 * The Lando_Local_Fusion_Loader will then create the relationship
	// 	 * between the defined hooks and the functions defined in this
	// 	 * class.
	// 	 */

	// 	// wp_enqueue_style( $this->lando_local_fusion, plugin_dir_url( __FILE__ ) . 'css/lando-local-fusion-admin.css', array(), $this->version, 'all' );

	// }

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	// public function enqueue_scripts() {

	// 	/**
	// 	 * This function is provided for demonstration purposes only.
	// 	 *
	// 	 * An instance of this class should be passed to the run() function
	// 	 * defined in Lando_Local_Fusion_Loader as all of the hooks are defined
	// 	 * in that particular class.
	// 	 *
	// 	 * The Lando_Local_Fusion_Loader will then create the relationship
	// 	 * between the defined hooks and the functions defined in this
	// 	 * class.
	// 	 */

	// 	// wp_enqueue_script( $this->lando_local_fusion, plugin_dir_url( __FILE__ ) . 'js/lando-local-fusion-admin.js', array( 'jquery' ), $this->version, false );

	// }

	/**
	 * Registers the settings to be configured on the options page
	 *
	 * @since      1.0.0
	 */
	public function register_settings() {
		add_option( 'llf_behavior', 'Disabled');
		register_setting( 'llf_options', 'llf_behavior', 'llf_callback' );
	}

	/**
	 * Registers the options page
	 *
	 * @since      1.0.0
	 */
	public function register_options_page() {
		add_options_page('Lando Local Fusion', 'Lando Local Fusion', 'manage_options', 'llf', array ( $this, 'options_page' ) );
	}

	/**
	 * Provide a admin area view for the plugin
	 *
	 * @since      1.0.0
	 */
	public function options_page() {
		?>
		<div>
			<?php screen_icon(); ?>
			<h2>Lando Local Fusion - Options</h2>
			<form method="post" action="options.php">
			<?php 
			settings_fields( 'llf_options' );
			$option_llf_behavior = get_option('llf_behavior');
			?>
			<label for="llf_behavior"><strong>Behavior when working locally:</strong></label><br />
			<input type="radio" name="llf_behavior" value="Auto" 	<?php if(strcmp($option_llf_behavior, 'Auto') == 0) { ?>checked="checked"<?php } ?>>Auto (Only use Lando Fusion if 'none' is selected, when pulling files)<br />
			<input type="radio" name="llf_behavior" value="On" 		<?php if(strcmp($option_llf_behavior, 'On') == 0) { ?>checked="checked"<?php } ?>>Always on (Always reference the Pantheon instance when working locally)<br />
			<input type="radio" name="llf_behavior" value="Disabled" <?php if(strcmp($option_llf_behavior, 'Disabled') == 0) { ?>checked="checked"<?php } ?>>Disabled (Revert to traditional Lando behavior)<br />
			<small><br />NOTE: You can safely set the behavior on your Pantheon instance. For 'Auto'/'Always on', when taking down a fresh local instance, this plugin will work without any enabling/configuring locally)</small>
			<?php  submit_button(); ?>
			</form>
		</div>
		<?php
	}

}
