<?php

/**
 * Fired during plugin activation
 *
 * @link       https://clickky.biz/
 * @since      1.0.0
 *
 * @package    Clickky
 * @subpackage Clickky/includes
 */

class Clickky_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        global $wpdb;

        $table_name = $wpdb->prefix . "clickky_ads";
        if($wpdb->get_var("show tables like '$table_name'") != $table_name) {

            $sql = "CREATE TABLE " . $table_name . " (
                          id mediumint(9) NOT NULL AUTO_INCREMENT,
                          name tinytext NOT NULL,
                          data text NOT NULL,
                          settings text NOT NULL,
                          status mediumint(9) DEFAULT '0',
                          UNIQUE KEY id (id)
                    );";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);

            add_option("clickky_db_version", '1.0.0');

        }
	}


}
