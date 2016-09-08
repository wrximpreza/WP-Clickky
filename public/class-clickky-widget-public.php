<?php

/**
 * The widget plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Clickky
 * @subpackage Clickky/includes
 * @author     Your Name <email@example.com>
 */
class Clickky_Widget
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $clickky The ID of this plugin.
     */
    private $clickky;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * class Clickky_Public.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $clickky_public The container of Clickky_Public class.
     */
    private $clickky_public;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $clickky The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($clickky, $version, $clickky_public)
    {
        $this->plugin_name = $clickky;
        $this->version = $version;
        $this->clickky_public = $clickky_public;
        $this->recommendeds = array();
        if (get_option($this->plugin_name . '_recommended')) {
            $this->recommendeds = unserialize(get_option($this->plugin_name . '_recommended'));
        }
        $this->r_count = 0;
        if ($this->recommendeds) {
            $this->r_count = count($this->recommendeds['widget_id']);
        }
    }

    /**
     * Generate widget for Recommended Ads
     */
    public function clickky_register_widget()
    {
        $recommended_widget = array();
        if (get_option($this->plugin_name . '_recommended_widget')) {
            $recommended_widget = unserialize(get_option($this->plugin_name . '_recommended_widget'));
        }

        if ($this->r_count > 0) {
            for ($i = 0; $i < $this->r_count; $i++) {
                if(!isset($recommended_widget[$this->recommendeds['hash'][$i]]))
                    continue;
                if ($this->recommendeds['active'][$i] == 1 && $recommended_widget[$this->recommendeds['hash'][$i]] == 1) {

                    $clickky_id = $this->recommendeds['name'][$i];
                    $this->recommend = $this->recommendeds['hash'][$i];

                    wp_register_sidebar_widget(
                        'clickky_widget_'.$this->recommend,
                        sprintf('Clickky: ID: %s', $clickky_id),
                        function (){
                            echo "<div class='clickky_widget_$this->recommend'>" . $this->clickky_public->generate_recommended($this->recommend) . '</div>';
                        },
                        array('description' => sprintf('%s ID: %s', __('Widget displays Clickky Recommended Apps', 'clickky'), $clickky_id))
                    );


                }
            }
        }


    }

    /**
     *  Info in admin widget
     */
    public function clickky_widget_control()
    {
        ?>
        <p>
            <?php printf('<strong>%s</strong> %s', __('Please note:', $this->plugin_name), sprintf('<a href="admin.php?page=clickky/settings" target="_blank">%s</a>', __("Select ad block to display in the widget you can on the plugin settings page in the 'Widget' tab.", $this->plugin_name.'-plugin'))); ?>
        </p>
    <?php }


    /**
     * Public js code in widget
     */
    public function clickky_widget_display()
    {
        echo "<div class='clickky_widget'>" . $this->clickky_public->generate_recommended($this->recommend) . '</div>';
    }

}
