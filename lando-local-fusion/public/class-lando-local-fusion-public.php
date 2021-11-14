<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/SPACED-MAN/wp-plugin--lando-local-fusion
 * @since      1.0.0
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/public
 * @author     Tyler Shingleton <i@spaced-man.com>
 */
class Lando_Local_Fusion_Public {

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
	 * @param      string    $lando_local_fusion       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $lando_local_fusion, $version ) {

		$this->lando_local_fusion = $lando_local_fusion;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lando_Local_Fusion_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lando_Local_Fusion_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->lando_local_fusion, plugin_dir_url( __FILE__ ) . 'css/lando-local-fusion-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lando_Local_Fusion_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lando_Local_Fusion_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->lando_local_fusion, plugin_dir_url( __FILE__ ) . 'js/lando-local-fusion-public.js', array( 'jquery' ), $this->version, false );

	}

}
