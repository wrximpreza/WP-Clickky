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

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Clickky
 * @subpackage Clickky/includes
 * @author     Your Name <email@example.com>
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
        //register_activation_hook(__FILE__, array( 'Clickky_Activator', 'clickky_table_install' ));
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

            //$rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'name' => $welcome_name, 'text' => $welcome_text ) );

            add_option("clickky_db_version", '1.0.0');

        }
	}


}
