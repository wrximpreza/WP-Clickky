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
class Clickky_Admin
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
     * Array of banners
     * @var array
     */
    private $banners = array();

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $clickky The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->wp_clickky_options = get_option($this->plugin_name);

        $this->banners[] = array(
            'name' => 'Catfish Ads',
            'alias' => 'clickky',
            'callback' => 'catfish',
            'id' => 'banner',
            'js_file' => 'banner',
            'default' => array(
                    'widget_id'=>array(
                        'type'=>'text',
                        'name'=>'SITE ID',
                        'hover'=>'',
                        'help'=>''
                    ),
                    'hash'=>array(
                        'type'=>'text',
                        'name'=>'Hash',
                        'hover'=>'',
                        'help'=>''
                    ),
                    'delay'=>array(
                        'type'=> 'text',
                        'name'=>'Delay',
                        'hover'=>'parameter responsible for the delay time before displaying an advertising banner in seconds',
                        'help'=>'all positive numeric integers 0 - ad unit display at web page loading without a delay'
                    ),
                    'template' => array(
                        'type'=> 'select',
                        'name'=>'Template',
                        'hover'=>'',
                        'help'=>' <ol class="list-inline">
                                        <li>1 - top-line ,</li>
                                        <li>2 - catfish,</li>
                                        <li>3 - top-line + catfish</li>
                                    </ol>',
                        'values' =>array(
                            1 => 'http://confluence.cli.bz/download/thumbnails/19466495/1%20%281%29.jpg?version=1&modificationDate=1463399202000&api=v2',
                            2 => 'http://confluence.cli.bz/download/thumbnails/19466495/2%20%281%29.jpg?version=1&modificationDate=1463399214000&api=v2',
                            3 => 'http://confluence.cli.bz/download/thumbnails/19466495/33.jpg?version=1&modificationDate=1463399226000&api=v2'
                        )
                    ),
                    'countBanners'=>array(
                        'type'=> 'hidden',
                        'name'=>'Banners are involved in the slider',
                        'hover'=>'banners are involved in the slider',
                        'help'=>'from 0 to 1 inclusive - automatically 1, 2 or 3 templates are triggered
                                    from 2 to 4 inclusive - available for 4, 5, 6 or 7 templates
                                    > 4 - triggered the default value - 3'
                    )

            )
        );
        $this->banners[] = array(
            'name' => 'Catfish Ads Slider',
            'alias' => 'clickky/catfish_slider',
            'callback' => 'catfish_slider',
            'id' => 'banner_slider',
            'js_file' => 'banner',
            'default' => array(
                'widget_id'=>array(
                    'type'=>'text',
                    'name'=>'SITE ID',
                    'hover'=>'',
                    'help'=>''
                ),
                'hash'=>array(
                    'type'=>'text',
                    'name'=>'Hash',
                    'hover'=>'',
                    'help'=>''
                ),
                'delay'=>array(
                    'type'=> 'text',
                    'name'=>'Delay',
                    'hover'=>'parameter responsible for the delay time before displaying an advertising banner in seconds',
                    'help'=>'all positive numeric integers 0 - ad unit display at web page loading without a delay'
                ),
                'template' => array(
                    'type'=> 'select',
                    'name'=>'Template',
                    'hover'=>'',
                    'help'=>' <ol class="list-inline">
                                        <li>1 - top-line ,</li>
                                        <li>2 - catfish,</li>
                                        <li>3 - top-line + catfish</li>
                                    </ol>',
                    'values' =>array(
                        1 => 'http://confluence.cli.bz/download/thumbnails/19466495/1%20%281%29.jpg?version=1&modificationDate=1463399202000&api=v2',
                        2 => 'http://confluence.cli.bz/download/thumbnails/19466495/2%20%281%29.jpg?version=1&modificationDate=1463399214000&api=v2',
                        3 => 'http://confluence.cli.bz/download/thumbnails/19466495/33.jpg?version=1&modificationDate=1463399226000&api=v2'
                    )
                ),
                'countBanners'=>array(
                    'type'=> 'hidden',
                    'name'=>'Banners are involved in the slider',
                    'hover'=>'banners are involved in the slider',
                    'help'=>'from 0 to 1 inclusive - automatically 1, 2 or 3 templates are triggered
                                    from 2 to 4 inclusive - available for 4, 5, 6 or 7 templates
                                    > 4 - triggered the default value - 3'
                )

            )

        );
        $this->banners[] = array(
            'name' => 'Dialog Ads',
            'alias' => 'clickky/dialog',
            'callback' => 'dialog',
            'id' => 'dialog',
            'js_file' => 'dialogads'
        );
        $this->banners[] = array(
            'name' => 'Expandable Banner',
            'alias' => 'clickky/expandable_banner',
            'callback' => 'expandable_banner',
            'id' => 'expandable',
            'js_file' => 'slideads'
        );
        $this->banners[] = array(
            'name' => 'FullScreen Ads',
            'alias' => 'clickky/fullscreen',
            'callback' => 'fullscreen',
            'id' => 'fullScreen',
            'js_file' => 'full'
        );
        $this->banners[] = array(
            'name' => 'Interstitial',
            'alias' => 'clickky/interstitial',
            'callback' => 'interstitial',
            'id' => 'Interstitial',
            'js_file' => 'popin'
        );
        $this->banners[] = array(
            'name' => 'Rich media',
            'alias' => 'clickky/richmedia',
            'callback' => 'richmedia',
            'id' => 'richmedia',
            'js_file' => 'media'
        );
        $this->banners[] = array(
            'name' => 'Recommended Apps',
            'alias' => 'clickky/recommended_apps',
            'callback' => 'recommended_apps',
            'id' => 'recommended',
            'js_file' => 'tizer'
        );


        $this->recommendeds = unserialize(get_option($this->plugin_name . '_recommended'));
        if ($this->recommendeds) {
            $this->r_count = count($this->recommendeds['widget_id']);
        } else {
            $this->r_count = 0;
        }


    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/clickky-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/clickky-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * Register class
     */
    public function clickky()
    {

    }


    public function add_placement_page(){
        //if(isset($_POST['code'])){
            //$code = $_POST['code'];

            $code ="
                <!-- BEGIN CODE {literal} -->
                <script src='http://native.cli.bz/nativeads/banner/js/main.js'></script>
                <script type='text/javascript'>
            
                    var o =
                    {  'widget_id' : '13264',  
                        'hash': 'e2402ac3d7ed8c5144ae589eaaeb057b1a7409d5', 
                        'delay' : 1, 
                        'template': 1, 
                        'countBanners': 1 
                    };
            
                    var Cliky = new Cliky(o);
                    Cliky.init();
            
                </script>
                <!-- {/literal} END CODE -->
             ";
            $data = $this->validate_ad($code);

        //}

        require_once plugin_dir_path(__FILE__) . 'partials/clickky-add-placement.php';

    }


    public function my_placement_page()
    {
        if(isset($_GET['id'])){
            //TODO: uncomment when add function to add ads in DB
            $code ="
                <!-- BEGIN CODE {literal} -->
                <script src='http://native.cli.bz/nativeads/banner/js/main.js'></script>
                <script type='text/javascript'>
            
                    var o =
                    {  'widget_id' : '13264',  
                        'hash': 'e2402ac3d7ed8c5144ae589eaaeb057b1a7409d5', 
                        'delay' : 1, 
                        'template': 1, 
                        'countBanners': 1 
                    };
            
                    var Cliky = new Cliky(o);
                    Cliky.init();
            
                </script>
                <!-- {/literal} END CODE -->
             ";
            $data = $this->validate_ad($code);

            require_once plugin_dir_path(__FILE__) . 'partials/clickky-edit-placement.php';
        }else{
            require_once plugin_dir_path(__FILE__) . 'partials/clickky-my-placement.php';
        }

    }


    public function validate_ad($code){

        $ads = '';
        $count = preg_match('/src=(["\'])(.*?)\1/', $code, $match);
        if ($count === FALSE) {
            return false;
        }else {
            foreach ($this->banners as $banner){

                if(strpos($match[2], $banner['js_file']) !== false ){
                    $ads =  $banner;
                    break;
                }
            }
        }

        if(!$ads){
            return false;
        }


        preg_match_all("/('.*?'.*:.*)/", $code, $output_array);
        $data = array();
        if($output_array[0]) {
            foreach ($output_array[0] as &$value) {
                $value = str_replace(',', '', str_replace("'", "", $value));
                $value = explode(':', $value);
                if (count($value) == 2) {
                    $data[trim($value[0])] = trim($value[1]);
                }
            }
        }

        if(empty($data) || !$ads){
            return false;
        }

        $valid = true;
        foreach ($data as $k=>$v){
            if(!in_array($k, array_keys($ads['default']))){
                $valid = false;
                break;
            }
        }
        $ads['result'] = $data;
        if($valid){
            return $ads;
        }
        return false;
    }

    public function global_settings_page(){
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-global-settings.php';
    }

    /**
     * Get banner page in admin panel
     */
    public function catfish()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-catfish.php';
    }


    /**
     * Get Settings page in admin panel
     */
    public function catfish_slider()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-catfish_slider.php';
    }


    /**
     * Get Settings page in admin panel
     */
    public function dialog()
    {
        $navbar = $this->topNavigation('dialog');
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-dialog.php';
    }

    /**
     * Get Settings page in admin panel
     */
    public function expandable_banner()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-expandable_banner.php';
    }

    /**
     * Get Settings page in admin panel
     */
    public function fullscreen()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-fullscreen.php';
    }

    /**
     * Get Settings page in admin panel
     */
    public function interstitial()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-interstitial.php';
    }

    /**
     * Get Settings page in admin panel
     */
    public function richmedia()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-richmedia.php';
    }

    /**
     * Get Settings page in admin panel
     */
    public function recommended_apps()
    {
        $recommendeds = $this->recommendeds;

        $r_count = $this->r_count;
        $recommended_page = array();
        if (get_option($this->plugin_name . '_recommended_page')) {
            $recommended_page = unserialize(get_option($this->plugin_name . '_recommended_page'));
        }

        $recommended_post = array();
        if (get_option($this->plugin_name . '_recommended_post')) {
            $recommended_post = unserialize(get_option($this->plugin_name . '_recommended_post'));
        }
        $recommended_category = array();
        if (get_option($this->plugin_name . '_recommended_category')) {
            $recommended_category = unserialize(get_option($this->plugin_name . '_recommended_category'));
        }
        $recommended_widget = array();
        if (get_option($this->plugin_name . '_recommended_widget')) {
            $recommended_widget = unserialize(get_option($this->plugin_name . '_recommended_widget'));
        }

        require_once plugin_dir_path(__FILE__) . 'partials/clickky-admin-recommended_apps.php';
    }

    /**
     * Add plugin menu
     */
    public function add_admin_menu()
    {

        add_menu_page(
            'clickky',
            'Clickky Banner',
            'manage_options',
            'clickky',
            array($this, 'clickky'),
            plugin_dir_url(__FILE__) . 'img/icon.png',
            '2.1'
        );
        remove_submenu_page('clickky', 'clickky');
        add_submenu_page('clickky', 'Add placement', 'Add placement', 'manage_options', 'clickky', array($this, 'add_placement_page'));
        add_submenu_page('clickky', 'My placement', 'My placement', 'manage_options', 'my_placement', array($this, 'my_placement_page'));
        add_submenu_page('clickky', 'Global settings', 'Global settings', 'manage_options', 'global_settings', array($this, 'global_settings_page'));

    }
    /***
     *
     */

    /**
     * Update option
     */
    public function options_update()
    {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }

    /**
     * Validate input data
     * @param $input
     * @return array
     */
    public function validate($input)
    {
        $valid = array();
        /**
         * Catfish Ads valid
         */
        $valid[$this->plugin_name . '_banner_active'] = (isset($input[$this->plugin_name . '_banner_active']) && !empty($input[$this->plugin_name . '_banner_active'])) ? 1 : 0;
        $valid[$this->plugin_name . '_banner_widget_id'] = (isset($input[$this->plugin_name . '_banner_widget_id']) && !empty($input[$this->plugin_name . '_banner_widget_id'])) ? 1 : 0;
        $valid[$this->plugin_name . '_banner_hash'] = (isset($input[$this->plugin_name . '_banner_hash']) && !empty($input[$this->plugin_name . '_banner_hash'])) ? 1 : 0;
        $valid[$this->plugin_name . '_banner_template'] = (isset($input[$this->plugin_name . '_banner_template']) && !empty($input[$this->plugin_name . '_banner_template'])) ? 1 : 0;
        $valid[$this->plugin_name . '_banner_delay'] = (isset($input[$this->plugin_name . '_banner_delay']) && !empty($input[$this->plugin_name . '_banner_delay'])) ? 1 : 0;
        $valid[$this->plugin_name . '_banner_countShow'] = (isset($input[$this->plugin_name . '_banner_countShow']) && !empty($input[$this->plugin_name . '_banner_countShow'])) ? 1 : 0;
        $valid[$this->plugin_name . '_banner_countBanners'] = (isset($input[$this->plugin_name . '_banner_countBanners']) && !empty($input[$this->plugin_name . '_banner_countBanners'])) ? 1 : 0;

        return $valid;
    }

    /**
     * Register setting
     */
    public function register_settings()
    {

        /**
         * Catfish Ads
         */
        register_setting($this->plugin_name . '-banner-settings', $this->plugin_name . '_banner_active');
        register_setting($this->plugin_name . '-banner-settings', $this->plugin_name . '_banner_widget_id');
        register_setting($this->plugin_name . '-banner-settings', $this->plugin_name . '_banner_hash');
        register_setting($this->plugin_name . '-banner-settings', $this->plugin_name . '_banner_template');
        register_setting($this->plugin_name . '-banner-settings', $this->plugin_name . '_banner_delay');
        register_setting($this->plugin_name . '-banner-settings', $this->plugin_name . '_banner_countShow');
        register_setting($this->plugin_name . '-banner-settings', $this->plugin_name . '_banner_countBanners');

        register_setting($this->plugin_name . '-banner-shows-settings', $this->plugin_name . '_banner_home');
        register_setting($this->plugin_name . '-banner-shows-settings', $this->plugin_name . '_banner_main');
        register_setting($this->plugin_name . '-banner-shows-settings', $this->plugin_name . '_banner_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-banner-shows-settings', $this->plugin_name . '_banner_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-banner-shows-settings', $this->plugin_name . '_banner_category', array($this, 'serializeData'));


        /**
         * Catfish Ads Slider
         */
        register_setting($this->plugin_name . '-banner-slider-settings', $this->plugin_name . '_banner_slider_active');
        register_setting($this->plugin_name . '-banner-slider-settings', $this->plugin_name . '_banner_slider_widget_id');
        register_setting($this->plugin_name . '-banner-slider-settings', $this->plugin_name . '_banner_slider_hash');
        register_setting($this->plugin_name . '-banner-slider-settings', $this->plugin_name . '_banner_slider_template');
        register_setting($this->plugin_name . '-banner-slider-settings', $this->plugin_name . '_banner_slider_delay');
        register_setting($this->plugin_name . '-banner-slider-settings', $this->plugin_name . '_banner_slider_countShow');
        register_setting($this->plugin_name . '-banner-slider-settings', $this->plugin_name . '_banner_slider_countBanners');

        register_setting($this->plugin_name . '-banner-slider-shows-settings', $this->plugin_name . '_banner_slider_main');
        register_setting($this->plugin_name . '-banner-slider-shows-settings', $this->plugin_name . '_banner_slider_home');
        register_setting($this->plugin_name . '-banner-slider-shows-settings', $this->plugin_name . '_banner_slider_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-banner-slider-shows-settings', $this->plugin_name . '_banner_slider_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-banner-slider-shows-settings', $this->plugin_name . '_banner_slider_category', array($this, 'serializeData'));


        /**
         * Dialog Ads
         */
        register_setting($this->plugin_name . '-dialog-settings', $this->plugin_name . '_dialog_active');
        register_setting($this->plugin_name . '-dialog-settings', $this->plugin_name . '_dialog_widget_id');
        register_setting($this->plugin_name . '-dialog-settings', $this->plugin_name . '_dialog_hash');
        register_setting($this->plugin_name . '-dialog-settings', $this->plugin_name . '_dialog_template');
        register_setting($this->plugin_name . '-dialog-settings', $this->plugin_name . '_dialog_delay');
        register_setting($this->plugin_name . '-dialog-settings', $this->plugin_name . '_dialog_countShow');

        register_setting($this->plugin_name . '-dialog-shows-settings', $this->plugin_name . '_dialog_main');
        register_setting($this->plugin_name . '-dialog-shows-settings', $this->plugin_name . '_dialog_home');
        register_setting($this->plugin_name . '-dialog-shows-settings', $this->plugin_name . '_dialog_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-dialog-shows-settings', $this->plugin_name . '_dialog_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-dialog-shows-settings', $this->plugin_name . '_dialog_category', array($this, 'serializeData'));

        /**
         * Expandable Banner
         */
        register_setting($this->plugin_name . '-expandable-settings', $this->plugin_name . '_expandable_active');
        register_setting($this->plugin_name . '-expandable-settings', $this->plugin_name . '_expandable_widget_id');
        register_setting($this->plugin_name . '-expandable-settings', $this->plugin_name . '_expandable_hash');
        register_setting($this->plugin_name . '-expandable-settings', $this->plugin_name . '_expandable_template');
        register_setting($this->plugin_name . '-expandable-settings', $this->plugin_name . '_expandable_background');
        register_setting($this->plugin_name . '-expandable-settings', $this->plugin_name . '_expandable_autoShow');

        register_setting($this->plugin_name . '-expandable-shows-settings', $this->plugin_name . '_expandable_home');
        register_setting($this->plugin_name . '-expandable-shows-settings', $this->plugin_name . '_expandable_main');
        register_setting($this->plugin_name . '-expandable-shows-settings', $this->plugin_name . '_expandable_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-expandable-shows-settings', $this->plugin_name . '_expandable_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-expandable-shows-settings', $this->plugin_name . '_expandable_category', array($this, 'serializeData'));

        /**
         * FullScreen Ads
         */
        register_setting($this->plugin_name . '-fullScreen-settings', $this->plugin_name . '_fullScreen_active');
        register_setting($this->plugin_name . '-fullScreen-settings', $this->plugin_name . '_fullScreen_widget_id');
        register_setting($this->plugin_name . '-fullScreen-settings', $this->plugin_name . '_fullScreen_hash');
        register_setting($this->plugin_name . '-fullScreen-settings', $this->plugin_name . '_fullScreen_delay');
        register_setting($this->plugin_name . '-fullScreen-settings', $this->plugin_name . '_fullScreen_pageShow');

        register_setting($this->plugin_name . '-fullScreen-shows-settings', $this->plugin_name . '_fullScreen_home');
        register_setting($this->plugin_name . '-fullScreen-shows-settings', $this->plugin_name . '_fullScreen_main');
        register_setting($this->plugin_name . '-fullScreen-shows-settings', $this->plugin_name . '_fullScreen_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-fullScreen-shows-settings', $this->plugin_name . '_fullScreen_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-fullScreen-shows-settings', $this->plugin_name . '_fullScreen_category', array($this, 'serializeData'));


        /**
         * Interstitial
         */
        register_setting($this->plugin_name . '-interstitial-settings', $this->plugin_name . '_interstitial_active');
        register_setting($this->plugin_name . '-interstitial-settings', $this->plugin_name . '_interstitial_widget_id');
        register_setting($this->plugin_name . '-interstitial-settings', $this->plugin_name . '_interstitial_hash');
        register_setting($this->plugin_name . '-interstitial-settings', $this->plugin_name . '_interstitial_template');
        register_setting($this->plugin_name . '-interstitial-settings', $this->plugin_name . '_interstitial_delay');
        register_setting($this->plugin_name . '-interstitial-settings', $this->plugin_name . '_interstitial_pageShow');

        register_setting($this->plugin_name . '-interstitial-shows-settings', $this->plugin_name . '_interstitial_home');
        register_setting($this->plugin_name . '-interstitial-shows-settings', $this->plugin_name . '_interstitial_main');
        register_setting($this->plugin_name . '-interstitial-shows-settings', $this->plugin_name . '_interstitial_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-interstitial-shows-settings', $this->plugin_name . '_interstitial_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-interstitial-shows-settings', $this->plugin_name . '_interstitial_category', array($this, 'serializeData'));

        /**
         * Rich media
         */
        register_setting($this->plugin_name . '-richmedia-settings', $this->plugin_name . '_richmedia_active');
        register_setting($this->plugin_name . '-richmedia-settings', $this->plugin_name . '_richmedia_widget_id');
        register_setting($this->plugin_name . '-richmedia-settings', $this->plugin_name . '_richmedia_hash');
        register_setting($this->plugin_name . '-richmedia-settings', $this->plugin_name . '_richmedia_template');
        register_setting($this->plugin_name . '-richmedia-settings', $this->plugin_name . '_richmedia_delay');
        register_setting($this->plugin_name . '-richmedia-settings', $this->plugin_name . '_richmedia_countShow');
        register_setting($this->plugin_name . '-richmedia-settings', $this->plugin_name . '_richmedia_second');

        register_setting($this->plugin_name . '-richmedia-shows-settings', $this->plugin_name . '_richmedia_main');
        register_setting($this->plugin_name . '-richmedia-shows-settings', $this->plugin_name . '_richmedia_home');
        register_setting($this->plugin_name . '-richmedia-shows-settings', $this->plugin_name . '_richmedia_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-richmedia-shows-settings', $this->plugin_name . '_richmedia_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-richmedia-shows-settings', $this->plugin_name . '_richmedia_category', array($this, 'serializeData'));

        /**
         * Recommended Apps
         */
        register_setting($this->plugin_name . '-recommended-settings', $this->plugin_name . '_recommended', array($this, 'serializeData'));

        register_setting($this->plugin_name . '-recommended-shows-settings', $this->plugin_name . '_recommended_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-recommended-shows-settings', $this->plugin_name . '_recommended_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-recommended-shows-settings', $this->plugin_name . '_recommended_category', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-recommended-shows-settings', $this->plugin_name . '_recommended_widget', array($this, 'serializeData'));

    }


    /**
     * Serialize data
     * @param $data
     * @return string
     */
    public function serializeData($data)
    {

        return serialize($data);
    }

    /**
     * Top navigation
     * @param $active
     * @return string
     */
    public function topNavigation($active = '')
    {

        $class_global = '';
        $my_placement = '';
        if($active == 'global'){
            $class_global = 'active';
        }
        if($active == 'my-placement'){
            $my_placement = 'active';
        }

        $html = '<div class="row header">
                <div class="col s2 logo">
                    <img src="'.CLICKKY_PLUGIN_URL.'/admin/img/logo.png" height="42" alt="">
                </div>
                <div class="col s10">
                    <ul class="right top_menu">
                        <li class="'.$my_placement.'">
                            <a href="#">
                                <img src="'.CLICKKY_PLUGIN_URL.'/admin/img/my_placement_icon.png" alt="My placement" />
                                <span class="text">My placement</span>
                            </a>
                        </li>
                        <li class="'.$class_global.'">
                            <a href="admin.php?page=global_settings">
                                <img src="'.CLICKKY_PLUGIN_URL.'/admin/img/global_settings_icon.png" alt="Global settings" />
                                <span>Global settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="admin.php?page=clickky">ADD PLACEMENT</a>
                        </li>
                    </ul>
                </div>
            </div>
        ';


        return $html;
    }

    /**
     * Html setting pages, posts, categories
     * @param $active
     */
    public function pageShow($active)
    {

        ?>
        <form class="row" method="post" name="cleanup_options" action="options.php">
            <?php
            settings_fields('clickky-' . $active . '-shows-settings');
            ?>
            <div class="panel-group">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <?php echo _e('Select', 'clickky'); ?>
                        </h4>
                    </div>
                    <div id="collapse_1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="form-group checkbox">
                                <label for="<?php echo $active; ?>_main" class="text-uppercase">
                                    <input type="checkbox" id="<?php echo $active; ?>_main"
                                           name="<?php echo $this->plugin_name; ?>_<?php echo $active; ?>_main"
                                           value="1" <?php if (get_option($this->plugin_name . '_' . $active . '_main') == 1) echo 'checked'; ?> />
                                    <span
                                        class="checkbox_label"><?php _e('Show all', 'clickky'); ?></span>
                                </label>
                            </div>

                            <div class="form-group checkbox">
                                <label for="<?php echo $active; ?>_home" class="text-uppercase">
                                    <input type="checkbox" id="<?php echo $active; ?>_home"
                                           name="<?php echo $this->plugin_name; ?>_<?php echo $active; ?>_home"
                                           value="1" <?php if (get_option($this->plugin_name . '_' . $active . '_home') == 1) echo 'checked'; ?> />
                                    <span
                                        class="checkbox_label"><?php _e('Home', 'clickky'); ?></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <?php echo _e('Select page', 'clickky'); ?>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse in" id="pages_all">
                        <div class="panel-body">
                            <?php
                            $checked_pages = unserialize(get_option($this->plugin_name . '_' . $active . '_page'));
                            if (!is_array($checked_pages)) {
                                $checked_pages = array();
                            }
                            $pages = get_pages();
                            ?>
                            <div class="checkbox">
                                <label for="<?php echo $active; ?>_page_all">
                                    <input id="<?php echo $active; ?>_page_all" type="checkbox"
                                           onClick="toggleCheckbox(this, 'pages_all')"
                                        <?php
                                        if (count($checked_pages) == count($pages)) {
                                            echo 'checked';
                                        }
                                        ?>
                                    />
                                    <span
                                        class="checkbox_label"><?php _e('All', 'clickky'); ?></span>
                                </label>
                            </div>
                            <?php
                            if (count($pages) > 0) {
                                foreach ($pages as $page) {
                                    ?>

                                    <div class="checkbox">
                                        <label for="<?php echo $active; ?>_page_<?php echo $page->ID; ?>">
                                            <input type="checkbox"
                                                   name="<?php echo $this->plugin_name . '_' . $active . '_page'; ?>[]"
                                                   value="<?php echo $page->ID; ?>"
                                                   id="<?php echo $active; ?>_page_<?php echo $page->ID; ?>"
                                                <?php
                                                if (is_array($checked_pages) && count($checked_pages) > 0)
                                                    if (in_array($page->ID, $checked_pages))
                                                        echo 'checked';
                                                ?>
                                            >
                                            <span
                                                class="checkbox_label"><?php echo $page->post_title; ?></span>
                                        </label>
                                    </div>

                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <?php echo _e('Select post', 'clickky'); ?>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse in" id="all_posts">
                        <div class="panel-body">
                            <?php
                            $checked_posts = unserialize(get_option($this->plugin_name . '_' . $active . '_post'));
                            if (!is_array($checked_posts)) {
                                $checked_posts = array();
                            }
                            $posts = get_posts();

                            ?>
                            <div class="checkbox">
                                <label for="<?php echo $active; ?>_post_all">
                                    <input id="<?php echo $active; ?>_post_all" type="checkbox"
                                           onClick="toggleCheckbox(this, 'all_posts')"
                                        <?php
                                        if (count($checked_posts) == count($posts)) {
                                            echo 'checked';
                                        }
                                        ?>
                                    />
                                    <span
                                        class="checkbox_label"><?php _e('All', 'clickky'); ?></span>
                                </label>
                            </div>
                            <?php

                            if (count($posts) > 0) {
                                foreach ($posts as $post) {
                                    ?>

                                    <div class="checkbox">
                                        <label for="<?php echo $active; ?>_post_<?php echo $post->ID; ?>">

                                            <input type="checkbox"
                                                   name="<?php echo $this->plugin_name . '_' . $active . '_post'; ?>[]"
                                                   value="<?php echo $post->ID; ?>"
                                                   id="<?php echo $active; ?>_post_<?php echo $post->ID; ?>"
                                                <?php
                                                if (is_array($checked_posts) && count($checked_posts) > 0)
                                                    if (in_array($post->ID, $checked_posts))
                                                        echo 'checked';
                                                ?>
                                            >
                                            <span
                                                class="checkbox_label"><?php echo $post->post_title; ?></span>
                                        </label>
                                    </div>

                                    <?php
                                }
                            }
                            ?>


                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <?php echo _e('Select category', 'clickky'); ?>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse in" id="all_categories">
                        <div class="panel-body">
                            <?php
                            $checked_categories = unserialize(get_option($this->plugin_name . '_' . $active . '_category'));
                            if (!is_array($checked_categories)) {
                                $checked_categories = array();
                            }
                            $categories = get_categories();
                            ?>
                            <div class="checkbox">
                                <label for="<?php echo $active; ?>_category__all">
                                    <input id="<?php echo $active; ?>_category__all" type="checkbox"
                                           onClick="toggleCheckbox(this, 'all_categories')"
                                        <?php
                                        if (count($checked_categories) == count($categories)) {
                                            echo 'checked';
                                        }
                                        ?>
                                    />
                                    <span
                                        class="checkbox_label"><?php _e('All', 'clickky'); ?></span>
                                </label>
                            </div>
                            <?php
                            if (count($categories) > 0) {
                                foreach ($categories as $category) {
                                    ?>

                                    <div class="checkbox">
                                        <label
                                            for="<?php echo $active; ?>_category_<?php echo $category->term_id; ?>">
                                            <input type="checkbox"
                                                   name="<?php echo $this->plugin_name . '_' . $active . '_category'; ?>[]"
                                                   value="<?php echo $category->term_id; ?>"
                                                   id="<?php echo $active; ?>_category_<?php echo $category->term_id; ?>"
                                                <?php
                                                if (is_array($checked_categories) && count($checked_categories) > 0)
                                                    if (in_array($category->term_id, $checked_categories))
                                                        echo 'checked';
                                                ?>
                                            >
                                            <span
                                                class="checkbox_label"><?php echo $category->name; ?></span>
                                        </label>
                                    </div>

                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <hr/>
            <div class="form-group"
                 style="float:right; margin-bottom: 20px; margin-right: 20px;">
                <button type="submit" class="btn btn btn-warning"><?php _e('Save', 'clickky'); ?></button>
            </div>
        </form>
        <?php
    }

    /**
     *
     */
    public function htmlFooter()
    {
        ?>
        <div id="footer">
            <div class="container">
                <p class="muted credit">
                    Copyright ©<?php echo date('Y'); ?> Clickky Ltd. All rights reserved.<br>
                    Clickky Banner for WordPress is Free Software distributed under the
                    <a href="http://www.gnu.org/licenses/gpl.html">GNU GPL version 3</a> or any later version published
                    by
                    the FSF.
                </p>
            </div>
        </div>

        <?php
    }
}
