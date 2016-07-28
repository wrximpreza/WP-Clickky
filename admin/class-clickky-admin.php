<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://clickky.biz/
 * @since      1.0.0
 *
 * @package    Clickky
 * @subpackage Clickky/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Clickky
 * @subpackage Clickky/admin
 * @author     Your Name <email@example.com>
 */
class Clickky_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $clickky    The ID of this plugin.
	 */
	private $clickky;

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
	 * @param      string    $clickky       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $clickky, $version ) {

		$this->clickky = $clickky;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Clickky_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Clickky_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->clickky, plugin_dir_url( __FILE__ ) . 'css/сlickky-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Clickky_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Clickky_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->clickky, plugin_dir_url( __FILE__ ) . 'js/сlickky-admin.js', array( 'jquery' ), $this->version, false );

	}

}
