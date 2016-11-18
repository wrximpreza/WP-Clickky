<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://clickky.biz/
 * @since      1.1.1
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
	 * @since    1.2.0
	 */
	public static function deactivate() {


            global $wpdb;
            $table_name = $wpdb->prefix . "clickky_ads";
            $sql = "DROP TABLE IF EXISTS " . $table_name;
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            delete_option("clickky_main");
            delete_option("clickky_home");
            delete_option("clickky_page");
            delete_option("clickky_post");
            delete_option("clickky_category");
            delete_option("clickky_db_version");
            delete_option("clickky_db_version");

	}

}
