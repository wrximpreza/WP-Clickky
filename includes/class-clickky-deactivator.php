<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://clickky.biz/
 * @since      1.1.0
 *
 * @package    Clickky
 * @subpackage Clickky/includes
 */

class Clickky_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.1.0
	 */
	public static function deactivate() {

        if( defined( 'WP_UNINSTALL_PLUGIN' ) ) {
            global $wpdb;
            $table_name = $wpdb->prefix . "clickky_ads";
            $sql = "DROP TABLE IF EXISTS " . $table_name;
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);

            delete_option("1.1.0");
        }
	}

}
