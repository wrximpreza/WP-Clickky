<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://clickky.biz/
 * @since      1.0.0
 *
 * @package    Clickky
 * @subpackage Clickky/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Clickky
 * @subpackage Clickky/public
 * @author     Your Name <email@example.com>
 */
class Clickky_Public
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
     * private
     * @var bool Alredy has js recommended ads
     */
    private $show = false;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $clickky The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($clickky, $version)
    {
        $this->plugin_name = $clickky;
        $this->version = $version;
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
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_banner()
    {

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

        if (get_option($this->plugin_name . '_banner_active') == 1) {
            echo $this->get_banner();
        } elseif (get_option($this->plugin_name . '_banner_slider_active') == 1) {
            echo $this->get_banner_slider();
        }

        if (get_option($this->plugin_name . '_dialog_active') == 1) {
            echo $this->get_dialog();
        }
        if (get_option($this->plugin_name . '_expandable_active') == 1) {
            echo $this->get_expandable();
        }
        if (get_option($this->plugin_name . '_fullScreen_active') == 1) {
            echo $this->get_fullScreen();
        }
        if (get_option($this->plugin_name . '_interstitial_active') == 1) {
            echo $this->get_interstitial();
        }
        if (get_option($this->plugin_name . '_richmedia_active') == 1) {
            echo $this->get_richmedia();
        }


    }

    /**
     * Set banner to start loop
     * @param $data
     * @return bool
     */
    public function enqueue_recommend_banner_loop_start($data)
    {
        if (!isset($data->query["cat"])) {
            return false;
        }
        if ($this->r_count > 0) {
            for ($i = 0; $i < $this->r_count; $i++) {
                if ($this->recommendeds['active'][$i] == 1) {

                    if (is_category()) {
                        $categories = unserialize(get_option($this->plugin_name . '_recommended_category'));

                        if ($categories[$this->recommendeds['hash'][$i]] == 'before_loop') {

                            echo $this->get_recommend($this->recommendeds['hash'][$i]);
                        }
                    }

                }
            }
        }

    }

    /**
     * Set banner to end loop
     * @param $data
     * @return bool
     */
    public function enqueue_recommend_banner_loop_end($data)
    {

        if (!isset($data->query["cat"])) {
            return false;
        }
        if ($this->r_count > 0) {
            for ($i = 0; $i < $this->r_count; $i++) {
                if ($this->recommendeds['active'][$i] == 1) {

                    if (is_category() && get_the_ID() == $data->query["cat"]) {
                        $categories = unserialize(get_option($this->plugin_name . '_recommended_category'));

                        if ($categories[$this->recommendeds['hash'][$i]] == 'after_loop') {
                            echo $this->get_recommend($this->recommendeds['hash'][$i]);
                        }
                    }

                }
            }
        }

    }


    /**
     * Set banner after comment
     */
    public function enqueue_recommend_banner_comment_after()
    {
        if ($this->r_count > 0) {
            for ($i = 0; $i < $this->r_count; $i++) {
                if ($this->recommendeds['active'][$i] == 1) {

                    if (is_page()) {
                        $pages = unserialize(get_option($this->plugin_name . '_recommended_page'));

                        if ($pages[$this->recommendeds['hash'][$i]] == 'after_comment') {
                            echo $this->get_recommend($this->recommendeds['hash'][$i]);
                        }
                    }

                    if (is_single()) {
                        $post = unserialize(get_option($this->plugin_name . '_recommended_post'));

                        if ($post[$this->recommendeds['hash'][$i]] == 'after_comment') {
                            echo $this->get_recommend($this->recommendeds['hash'][$i]);
                        }

                    }

                }
            }
        }
    }

    /**
     * Set banner before comment
     */
    public function enqueue_recommend_banner_comment_before()
    {
        if ($this->r_count > 0) {
            for ($i = 0; $i < $this->r_count; $i++) {
                if ($this->recommendeds['active'][$i] == 1) {

                    if (is_page()) {
                        $pages = unserialize(get_option($this->plugin_name . '_recommended_page'));

                        if ($pages[$this->recommendeds['hash'][$i]] == 'before_comment') {
                            echo $this->get_recommend($this->recommendeds['hash'][$i]);
                        }
                    }

                    if (is_single()) {
                        $post = unserialize(get_option($this->plugin_name . '_recommended_post'));

                        if ($post[$this->recommendeds['hash'][$i]] == 'before_comment') {
                            echo $this->get_recommend($this->recommendeds['hash'][$i]);
                        }

                    }

                }
            }
        }
    }

    /**
     * Set banner before and after content
     * @param $content
     * @return string
     */
    public function enqueue_recommend_banner_content($content)
    {

        if ($this->r_count > 0) {
            for ($i = 0; $i < $this->r_count; $i++) {
                if ($this->recommendeds['active'][$i] == 1) {
                    //echo $recommendeds['hash'][$i];

                    if (is_page()) {
                        $pages = unserialize(get_option($this->plugin_name . '_recommended_page'));

                        if ($pages[$this->recommendeds['hash'][$i]] == 'after_content') {
                            return $content . $this->get_recommend($this->recommendeds['hash'][$i]);
                        } elseif ($pages[$this->recommendeds['hash'][$i]] == 'before_content') {
                            return $this->get_recommend($this->recommendeds['hash'][$i]) . $content;
                        } else {
                            return $content;
                        }

                    }

                    if (is_single()) {
                        $posts = unserialize(get_option($this->plugin_name . '_recommended_post'));

                        if ($posts[$this->recommendeds['hash'][$i]] == 'after_content') {
                            return $content . $this->get_recommend($this->recommendeds['hash'][$i]);
                        } elseif ($posts[$this->recommendeds['hash'][$i]] == 'before_content') {
                            return $this->get_recommend($this->recommendeds['hash'][$i]) . $content;
                        } else {
                            return $content;
                        }
                    }

                }
            }
        }
    }

    /**
     * Generate js code Catfish Ads
     * @return string
     */
    public function get_banner()
    {


        if ($this->check_where_show('banner')) {
            return "
                <!-- BEGIN CODE {literal} -->
                <script src='http://native.cli.bz/nativeads/banner/js/main.js'></script>
                <script type='text/javascript'>
               
                    var o = {
                        'widget_id' : '" . get_option($this->plugin_name . '_banner_widget_id') . "', 
                        'hash': '" . get_option($this->plugin_name . '_banner_hash') . "', 
                        'delay' : " . get_option($this->plugin_name . '_banner_delay') . ",
                        'template': " . get_option($this->plugin_name . '_banner_template') . ",
                        'countBanners': " . get_option($this->plugin_name . '_banner_countShow') . "
                    };
                    var Cliky = new Cliky(o);
                    Cliky.init();
              
                </script>
                <!-- {/literal} END CODE -->
            ";
        }
    }

    /**
     * Generate js code Catfish Ads Slider
     * @return string
     */
    public function get_banner_slider()
    {
        if ($this->check_where_show('banner_slider')) {
            return "
                <!-- BEGIN CODE {literal} -->
                <script src='http://native.cli.bz/nativeads/banner/js/main.js'></script>
                <script type='text/javascript'>
               
                    var o = {
                        'widget_id' : '" . get_option($this->plugin_name . '_banner_slider_widget_id') . "', 
                        'hash': '" . get_option($this->plugin_name . '_banner_slider_hash') . "', 
                        'delay' : " . get_option($this->plugin_name . '_banner_slider_delay') . ",
                        'template': " . get_option($this->plugin_name . '_banner_slider_template') . ",
                        'countBanners': " . get_option($this->plugin_name . '_banner_slider_countShow') . "
                    };
                    var Cliky = new Cliky(o);
                    Cliky.init();
           
                </script>
                <!-- {/literal} END CODE -->
            ";
        }
    }

    /**
     * Generate js code Dialog
     * @return string
     */
    public function get_dialog()
    {
        if ($this->check_where_show('dialog')) {
            return "
                <!-- BEGIN CODE {literal} -->
                <script src='http://native.cli.bz/nativeads/dialogads/js/main.js'></script>
                <script type='text/javascript'>
                  
                    var o = {
                        'widget_id' : '" . get_option($this->plugin_name . '_dialog_widget_id') . "', 
                        'hash': '" . get_option($this->plugin_name . '_dialog_hash') . "', 
                        'delay' : " . get_option($this->plugin_name . '_dialog_delay') . ",
                        'template': " . get_option($this->plugin_name . '_dialog_template') . ",
                        'countShow': " . get_option($this->plugin_name . '_dialog_countShow') . "
                    };
                    var Cliky = new Cliky(o);
                    Cliky.init();
               
                </script>
                <!-- {/literal} END CODE -->
            ";
        }
    }

    /**
     * Generate js code Expandable Banner
     * @return string
     */
    public function get_expandable()
    {
        if ($this->check_where_show('expandable')) {
            return "
            <!-- BEGIN CODE {literal} -->
            <script src='http://native.cli.bz/nativeads/slideads/js/main.js'></script>
            <script type='text/javascript'>
                var o = {
                    'widget_id' : '" . get_option($this->plugin_name . '_expandable_widget_id') . "', 
                    'hash': '" . get_option($this->plugin_name . '_expandable_hash') . "', 
                    'template': " . get_option($this->plugin_name . '_expandable_template') . ",
                    'background': '" . get_option($this->plugin_name . '_expandable_background') . "',
                    'autoShow': " . get_option($this->plugin_name . '_expandable_autoShow') . "
                };
                var ClickkyMultiBanner = new ClickkyMultiBanner(o);
                ClickkyMultiBanner.init();
            </script>
            <!-- {/literal} END CODE -->
        ";
        }
    }

    /**
     * Generate js code FullScreen
     * @return string
     */
    public function get_fullScreen()
    {
        if ($this->check_where_show('fullScreen')) {
            return "
                <!-- BEGIN CODE {literal} -->
                <script src='http://native.cli.bz/nativeads/full/js/main.js'></script>
                <script type='text/javascript'>
                    var o = {
                        'widget_id' : '" . get_option($this->plugin_name . '_fullScreen_widget_id') . "',
                        'hash': '" . get_option($this->plugin_name . '_fullScreen_hash') . "', 
                        'delay' : " . get_option($this->plugin_name . '_fullScreen_delay') . ",
                        'pageShow': " . get_option($this->plugin_name . '_fullScreen_pageShow') . "
                    };
                    var ClickkyFull = new ClickkyFull(o);
                    ClickkyFull.init();
                </script>
                <!-- {/literal} END CODE -->
        ";
        }
    }

    /**
     * Generate js code Interstitial
     * @return string
     */
    public function get_interstitial()
    {
        if ($this->check_where_show('interstitial')) {
            return "
            <!-- BEGIN CODE {literal} -->
            <script src='http://native.cli.bz/nativeads/popin/js/main.js'></script>
            <script type='text/javascript'>
                   var o = {
                       'widget_id' : '" . get_option($this->plugin_name . '_interstitial_widget_id') . "', //set up site_id value
                       'hash': '" . get_option($this->plugin_name . '_interstitial_hash') . "', //set up hash value
                       'template':" . get_option($this->plugin_name . '_interstitial_template') . ",
                       'delay' : " . get_option($this->plugin_name . '_interstitial_delay') . ",
                       'pageShow': " . get_option($this->plugin_name . '_interstitial_pageShow') . "
                   };
                   new ClickkyPopin(o).init();
            </script>
            <!-- {/literal} END CODE -->
        ";
        }
    }

    /**
     * Generate js code Richmedia
     * @return string
     */
    public function get_richmedia()
    {
        if ($this->check_where_show('richmedia')) {
            return "
            <!-- BEGIN CODE {literal} -->
            <script src='http://native.cli.bz/nativeads/media/js/main.js'></script>
            <script type='text/javascript'>
                   var o = {
                       'site_id' : '" . get_option($this->plugin_name . '_richmedia_widget_id') . "', 
                       'second': " . get_option($this->plugin_name . '_richmedia_second') . ",
                       'hash': '" . get_option($this->plugin_name . '_richmedia_hash') . "', 
                       'template': " . get_option($this->plugin_name . '_richmedia_template') . ",
                       'delay': " . get_option($this->plugin_name . '_richmedia_delay') . ",
                       'countShow': " . get_option($this->plugin_name . '_richmedia_countShow') . "
                   };
                   var ClickkyRichmedia = new ClickkyRichmedia(o);
                   ClickkyRichmedia.init();
            </script>
            <!-- {/literal} END CODE -->
        ";
        }
    }


    /**
     * Generate js code Recommended Ads
     * @param $hash
     * @return bool|string
     */
    public function get_recommend($hash)
    {

        return $this->generate_recommended($hash);
    }

    /**
     * Generate shortcode for Recommended Ads
     * @param $args
     * @return bool|string
     */
    public function get_recommended_shortcode($args)
    {

        if (!isset($args['hash']) && $args['hash'] == '') {
            return false;
        }
        return $this->generate_recommended($args['hash']);


    }

    /**
     *
     */
    public function loadTizerJs() {
        wp_register_script( $this.$this->plugin_name.'-tizer', 'http://native.cli.bz/nativeads/tizer/js/main.js');
    }

    /**
     * Generate javascript for Recommended Ads
     * @param $hash
     * @return bool|string
     */
    public function generate_recommended($hash)
    {

        $data = $this->sort_recommend_array($hash);
        if (!$data) {
            return false;
        }
        $id = uniqid();
        $html = '';
        //add_action( 'wp_enqueue_scripts', array($this, 'loadTizerJs'));
        if(!$this->show){
            $html .= "<script src='http://native.cli.bz/nativeads/tizer/js/main.js'></script>";
            $this->show = true;
        }

        $html .= "
                <div id='" . $id . "'></div>
                <!-- BEGIN CODE {literal} -->
                <script type='text/javascript'>
                        var o = {
                            'site_id' : '" . $data['widget_id'] . "', 
                            'blockId': '" . $id . "',
                            'hash' : '" . $data['hash'] . "',
                            'template': " . $data['template'] . ",
                            'buttonClassColor': '" . $data['buttonClassColor'] . "',
                            'styles': {
                                'background': '" . $data['background'] . "',
                                'fontFamily': '" . $data['fontFamily'] . "',
                                'colorFontTitle': '" . $data['colorFontTitle'] . "',
                                'colorFontDescription': '" . $data['colorFontDescription'] . "',
                                'ratingFontColor': '" . $data['ratingFontColor'] . "',
                                'buttonBackground': '" . $data['buttonBackground'] . "',
                                'buttonFontColor': '" . $data['buttonFontColor'] . "',
                                'buttonBorderColor': '" . $data['buttonBackground'] . "'
                            }
                        };
                        new ClickkyTizer(o).init();
                </script>
                <!-- {/literal} END CODE -->
           
        ";
        return $html;

    }

    /**
     * Check where show banner
     * @param $type
     * @return bool
     */
    private function check_where_show($type)
    {

        if (get_option($this->plugin_name . '_' . $type . '_main') == 1) {
            return true;
        }

        if (is_home() && get_option($this->plugin_name . '_' . $type . '_home') == 1) {
            return true;
        }

        if (is_page()) {
            $banner_pages = unserialize(get_option($this->plugin_name . '_' . $type . '_page'));
            if (in_array(get_the_ID(), $banner_pages)) {
                return true;
            }
        }

        if (is_single()) {
            $banner_posts = unserialize(get_option($this->plugin_name . '_' . $type . '_post'));
            if (in_array(get_the_ID(), $banner_posts)) {
                return true;
            }
        }

        if (is_category()) {
            $category = get_queried_object();
            $banner_categories = unserialize(get_option($this->plugin_name . '_' . $type . '_category'));

            if (in_array($category->term_id, $banner_categories)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Return selected recommended ads data
     * @param $hash
     * @return array|bool
     */
    public function sort_recommend_array($hash)
    {

        $results = array();
        for ($i = 0; $i < $this->r_count; $i++) {
            if ($this->recommendeds['hash'][$i] === $hash) {
                $results['name'] = $this->recommendeds['name'][$i];
                $results['active'] = $this->recommendeds['active'][$i];
                $results['widget_id'] = $this->recommendeds['widget_id'][$i];
                $results['hash'] = $this->recommendeds['hash'][$i];
                $results['template'] = $this->recommendeds['template'][$i];
                $results['buttonClassColor'] = $this->recommendeds['buttonClassColor'][$i];
                $results['background'] = $this->recommendeds['background'][$i];
                $results['fontFamily'] = $this->recommendeds['fontFamily'][$i];
                $results['colorFontTitle'] = $this->recommendeds['colorFontTitle'][$i];
                $results['buttonBackground'] = $this->recommendeds['buttonBackground'][$i];
                $results['buttonFontColor'] = $this->recommendeds['buttonFontColor'][$i];
                $results['buttonFontColor'] = $this->recommendeds['buttonFontColor'][$i];
                $results['colorFontDescription'] = $this->recommendeds['colorFontDescription'][$i];
                $results['ratingFontColor'] = $this->recommendeds['ratingFontColor'][$i];
            }
        }

        if ($results) {
            return $results;
        }
        return false;

    }

}
