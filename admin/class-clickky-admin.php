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

        $this->banners['banner'] = array(
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
        $this->banners['banner_slider'] = array(
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
                                         <li>4 - top-line slider (horizontal) ,</li>
                                        <li>5 - catfish slider (horizontal),</li>
                                        <li>6 - top-line slider (vertical), </li>
                                        <li>7 - catfish slider (vertical)</li>
                                    </ol>',
                    'values' =>array(
                        4 => 'http://confluence.cli.bz/download/thumbnails/19464938/44.jpg?version=1&modificationDate=1458901341000&api=v2',
                        5 => 'http://confluence.cli.bz/download/thumbnails/19464938/55.jpg?version=1&modificationDate=1458901360000&api=v2',
                        6 => 'http://confluence.cli.bz/download/thumbnails/19464938/66.jpg?version=1&modificationDate=1458901375000&api=v2',
                        7 => 'http://confluence.cli.bz/download/thumbnails/19464938/77.jpg?version=1&modificationDate=1458901387000&api=v2'
                    )
                ),
                'countBanners'=>array(
                    'type'=> 'text',
                    'name'=>'Banners are involved in the slider',
                    'hover'=>'banners are involved in the slider',
                    'help'=>'from 0 to 1 inclusive - automatically 1, 2 or 3 templates are triggered
                                    from 2 to 4 inclusive - available for 4, 5, 6 or 7 templates
                                    > 4 - triggered the default value - 3'
                )

            )

        );
        $this->banners['dialog'] = array(
            'name' => 'Dialog Ads',
            'alias' => 'clickky/dialog',
            'callback' => 'dialog',
            'id' => 'dialog',
            'js_file' => 'dialogads',
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
                    'help'=>'  <div class="alert  alert-warning">'. __('<strong>Warning!</strong> Any other values for this type of advertising makes the script useless character set, be careful.', 'clickky').'</div>',
                    'values' =>array(
                        0 => 'http://confluence.cli.bz/download/thumbnails/19464935/1.jpg?version=1&modificationDate=1458899948000&api=v2',
                        1 => 'http://confluence.cli.bz/download/thumbnails/19464935/2.jpg?version=1&modificationDate=1458899961000&api=v2',
                        2 => 'http://confluence.cli.bz/download/thumbnails/19464935/3.jpg?version=1&modificationDate=1458899972000&api=v2'
                    )
                ),
                'countShow'=>array(
                    'type'=> 'text',
                    'name'=>'Banners rotation time in minutes',
                    'hover'=>'banner update happens every (n) minutes',
                    'help'=>'all positive numeric integers 0 - show the following banner each time you update the current page'
                )

            )
        );
        $this->banners['expandable'] = array(
            'name' => 'Expandable Banner',
            'alias' => 'clickky/expandable_banner',
            'callback' => 'expandable_banner',
            'id' => 'expandable',
            'js_file' => 'slideads',
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
                'template' => array(
                    'type'=> 'select',
                    'name'=>'Template',
                    'hover'=>'',
                    'help'=>'  <div class="alert  alert-warning">'. __('<strong>Warning!</strong> Any other values for this type of advertising makes the script useless character set, be careful.', 'clickky').'</div>',
                    'values' =>array(
                        0 => '',
                        1 => 'http://confluence.cli.bz/download/thumbnails/19465017/a.jpg?version=1&modificationDate=1458923048000&api=v2',
                        2 => 'http://confluence.cli.bz/download/thumbnails/19465017/b.jpg?version=1&modificationDate=1458923051000&api=v2',
                        3 => 'http://confluence.cli.bz/download/thumbnails/19465017/c.jpg?version=1&modificationDate=1458923055000&api=v2',
                        4 => 'http://confluence.cli.bz/download/thumbnails/19465017/d.jpg?version=1&modificationDate=1458923058000&api=v2'
                    )
                ),
                'background'=>array(
                    'type'=> 'select',
                    'name'=>'Background',
                    'hover'=>'parameter that defines the background color of the space where the advertisement displays',
                    'help' => 'dark or light',
                    'values' =>array(
                        'dark'=>'dark',
                        'light' => 'light'
                    )
                ),
                'autoShow'=>array(
                    'type'=> 'text',
                    'name'=>'Banners rotation time in minutes',
                    'hover'=>'parameter that determines the delay time before opening the banner in seconds',
                    'help'=>'from 0 to 60 inclusive  - banner will be opened immediately after the load page'
                )

            )
        );
        $this->banners['fullScreen'] = array(
            'name' => 'FullScreen Ads',
            'alias' => 'clickky/fullscreen',
            'callback' => 'fullscreen',
            'id' => 'fullScreen',
            'js_file' => 'full',
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
                'pageShow'=>array(
                    'type'=> 'text',
                    'name'=>'Page number on what the ads appears',
                    'hover'=>'parameter that determines the page number on what the ads appears',
                    'help'=>'all positive numeric integers 0 - is ignored'
                )

            )
        );
        $this->banners['Interstitial'] = array(
            'name' => 'Interstitial',
            'alias' => 'clickky/interstitial',
            'callback' => 'interstitial',
            'id' => 'Interstitial',
            'js_file' => 'popin',
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
                'template' => array(
                    'type'=> 'select',
                    'name'=>'Template',
                    'hover'=>'',
                    'help'=>'',
                    'values' =>array(
                        0 => '',
                        1 => 'http://confluence.cli.bz/download/thumbnails/19467530/1.jpg?version=1&modificationDate=1465387309000&api=v2',
                        2 => 'http://confluence.cli.bz/download/thumbnails/19467530/2.jpg?version=1&modificationDate=1465387309000&api=v2',
                        3 => 'http://confluence.cli.bz/download/thumbnails/19467530/3.jpg?version=1&modificationDate=1465387309000&api=v2',
                        4 => 'http://confluence.cli.bz/download/thumbnails/19467530/4.jpg?version=1&modificationDate=1465387309000&api=v2'
                    )
                ),
                'delay'=>array(
                    'type'=> 'text',
                    'name'=>'Delay',
                    'hover'=>'parameter responsible for the delay time before displaying an advertising banner in seconds',
                    'help'=>'all positive numeric integers 0 - ad unit display at web page loading without a delay'
                ),
                'pageShow'=>array(
                    'type'=> 'text',
                    'name'=>'Page number on what the ads appears',
                    'hover'=>'parameter that determines the page number on what the ads appears',
                    'help'=>'all positive numeric integers 0 - is ignored'
                )

            )

        );
        $this->banners['richmedia'] = array(
            'name' => 'Rich media',
            'alias' => 'clickky/richmedia',
            'callback' => 'richmedia',
            'id' => 'richmedia',
            'js_file' => 'media',
            'default' => array(
                'site_id'=>array(
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
                'template' => array(
                    'type'=> 'select',
                    'name'=>'Template',
                    'hover'=>'',
                    'help'=>'',
                    'values' =>array(
                        0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
                    )
                ),
                'delay'=>array(
                    'type'=> 'text',
                    'name'=>'Delay',
                    'hover'=>'parameter responsible for the delay time before displaying an advertising banner in seconds',
                    'help'=>'all positive numeric integers 0 - ad unit display at web page loading without a delay'
                ),
                'countShow'=>array(
                    'type'=> 'text',
                    'name'=>'Page number on what the ads appears',
                    'hover'=>'parameter that determines the page number on what the ads appears',
                    'help'=>'all positive numeric integers 0 - is ignored'
                ),
                'second'=>array(
                    'type'=> 'text',
                    'name'=>'Delay time for the close button in seconds',
                    'hover'=>'parameter that defines the delay time for the close button in seconds',
                    'help'=>'all positive numeric integers, 0 - the script does not work'
                )

            )

        );
        $this->banners['recommended'] = array(
            'name' => 'Recommended Apps',
            'alias' => 'clickky/recommended_apps',
            'callback' => 'recommended_apps',
            'id' => 'recommended',
            'js_file' => 'tizer',
            'default' => array(
                'name'=>array(
                    'type'=>'text',
                    'name'=>'Name',
                    'hover'=>'',
                    'help'=>'',
                    'show' => 0
                ),
                'site_id'=>array(
                    'type'=>'text',
                    'name'=>'SITE ID',
                    'hover'=>'',
                    'help'=>'',
                    'show' => 1

                ),
                'blockId'=>array(
                    'type'=>'hidden',
                    'name'=>'',
                    'hover'=>'',
                    'help'=>'',
                    'show' => 1
                ),
                'hash'=>array(
                    'type'=>'text',
                    'name'=>'Hash',
                    'hover'=>'',
                    'help'=>'',
                    'show' => 1
                ),
                'template' => array(
                    'type'=> 'select',
                    'name'=>'Template',
                    'hover'=>'',
                    'help'=>'',
                    'values' =>array(
                        1 => 'http://confluence.cli.bz/download/thumbnails/19467530/1.jpg?version=1&modificationDate=1465387309000&api=v2',
                        2 => 'http://confluence.cli.bz/download/thumbnails/19467530/2.jpg?version=1&modificationDate=1465387309000&api=v2',
                        3 => 'http://confluence.cli.bz/download/thumbnails/19467530/3.jpg?version=1&modificationDate=1465387309000&api=v2',
                        4 => 'http://confluence.cli.bz/download/thumbnails/19467530/4.jpg?version=1&modificationDate=1465387309000&api=v2'
                    ),
                    'show' => 1
                ),
                'buttonClassColor'=>array(
                    'type'=> 'select',
                    'name'=>'Button Color',
                    'hover'=>'',
                    'help'=>'',
                    'values' => array(
                        'white'=>'white',
                        'red' => 'red'
                    ),
                    'show' => 1
                ),
                'background'=>array(
                    'type'=> 'color',
                    'name'=>'Background',
                    'hover'=>'',
                    'help'=>'',
                    'value'=>'#ffffff',
                    'show' => 0
                ),
                'fontFamily'=>array(
                    'type'=> 'text',
                    'name'=>'Font Family',
                    'hover'=>'',
                    'help'=>'',
                    'value' => 'Helvetica,Arial,sans-serif',
                    'show' => 0
                ),
                'colorFontTitle'=>array(
                    'type'=> 'color',
                    'name'=>'Color font title',
                    'hover'=>'',
                    'help'=>'',
                    'value' => '#000000',
                    'show' => 0
                ),
                'ratingFontColor'=>array(
                    'type'=> 'color',
                    'name'=>'Rating Color',
                    'hover'=>'',
                    'help'=>'',
                    'value' => '#000000',
                    'show' => 0
                ),
                'colorFontDescription'=>array(
                    'type'=> 'color',
                    'name'=>'Color description',
                    'hover'=>'',
                    'help'=>'',
                    'value' => '#000000',
                    'show' => 0
                ),
                'buttonBackground'=>array(
                    'type'=> 'color',
                    'name'=>'Button background',
                    'hover'=>'',
                    'help'=>'',
                    'value' => '#E63517',
                    'show' => 0
                ),
                'buttonFontColor'=>array(
                    'type'=> 'color',
                    'name'=>'Button font color',
                    'hover'=>'',
                    'help'=>'',
                    'value' => '#ffffff',
                    'show' => 0
                ),
                'buttonBorderColor'=>array(
                    'type'=> 'color',
                    'name'=>'Button border color',
                    'hover'=>'',
                    'help'=>'',
                    'value' => '#E63517',
                    'show' => 0
                )


            )
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
    public function global_settings_page(){
        require_once plugin_dir_path(__FILE__) . 'partials/clickky-global-settings.php';
    }


    public function add_placement_page(){

        require_once plugin_dir_path(__FILE__) . 'partials/clickky-add-placement.php';

    }

    public function publish_ad_javascript(){
        ?>
        <script type="text/javascript">

            jQuery(".switch input").on('change', function (event) {

                jQuery.ajax({
                    type: "POST",
                    data: {
                        'switch': jQuery(this).prop('checked'),
                        action: 'publish_action',
                        id: jQuery(this).data('id')
                    },
                    url: ajaxurl,
                    success: function (result) {}
                });
                return false;
            });

            jQuery(".ads_list .delete a").on('click', function (event) {

                var is = confirm("Вы действительно хотите удалить?");
                if(is) {
                    var self = this;
                    jQuery.ajax({
                        type: "POST",
                        data: {
                            action: 'delete_action',
                            id: jQuery(this).data('id')
                        },
                        url: ajaxurl,
                        success: function () {
                            jQuery(self).parent().parent().remove();
                        }
                    });
                }
                return false;
            });

        </script>
        <?php
    }
    public function publish_action_callback(){
        global $wpdb;
        $table_name = $wpdb->prefix . "clickky_ads";
        if ($_POST['action']=='publish_action') {

            $status = 1;
            if($_POST['switch']=='false'){
                $status = 0;
            }
            $wpdb->get_results("UPDATE ".$table_name." SET status = ".$status." WHERE id=".$_POST['id']." LIMIT 1");
            wp_die();
        }elseif($_POST['action']=='delete_action'){
            $wpdb->get_results("DELETE  FROM ".$table_name." WHERE id=".$_POST['id']);
            wp_die();
        }
    }




    public function check_ad_javascript(){
        ?>
        <script type="text/javascript">
            jQuery(".add_button").on('click', function (event) {
                if (jQuery('#code').val() == '') {
                    return false;
                }
                jQuery.ajax({
                    type: "POST",
                    data: {'code': jQuery('#code').val(), action: 'check_action'},
                    url: ajaxurl,
                    success: function (result) {
                        if(typeof result != 'object') {
                            jQuery("#hide_code").val(jQuery('#code').val());
                            jQuery("#code").val(result);
                            jQuery("#code").addClass('active');
                            jQuery(".replace").html('<button class="btn right" type="submit">Next</button>');
                        }
                    }
                });
                return false;
            });
            jQuery("#code").on('click', function (event) {
                jQuery("#code").removeClass('active');
            });
        </script>
        <?php
    }

    public function check_action_callback(){

            if (isset($_POST['code'])) {
                $code = $_POST['code'];
                $data = $this->validate_ad($code);
                if ($data) {
                    echo 'You put correct code! You should turn on placement on my placement page or change delivery setting to this placement there!';
                }else{
                    echo 'Check your code';
                }

                wp_die();
            }

    }

    public function my_placement_page()
    {

        global $wpdb;
        $table_name = $wpdb->prefix . "clickky_ads";
        if(isset($_GET['id'])){

            $id = $_GET['id'];

            if(isset($_POST['name'])) {

                if(isset($_POST['data']['active'])){
                    $status = $_POST['data']['active'];
                }else{
                    $status = 0;
                }

                if ($id == 0) {

                    $rows_affected = $wpdb->insert( $table_name,
                        array(
                            'name' => $_POST['name'],
                            'data' => serialize($_POST['data']),
                            'settings' => serialize($_POST['settings']),
                            'status' => $status
                        )
                    );

                    if($rows_affected){
                        echo "<script>window.location.href='admin.php?page=my_placement';</script>;";
                        wp_die();
                    }

                }else{
                    $rows_affected = $wpdb->update( $table_name,
                        array(
                            'name' => $_POST['name'],
                            'data' => serialize($_POST['data']),
                            'settings' => serialize($_POST['settings']),
                            'status' => $status
                        ),
                        array('id'=>$id)
                    );
                }
            }

            $code = $_POST['code'];
            if($id == 0) {
                $data = $this->validate_ad($code);
            }else{
                $data = array();
                $result = $wpdb->get_results("SELECT * FROM ".$table_name." WHERE id=".$id." LIMIT 1");

                if($result){
                    $result = $result[0];
                    $settings = unserialize($result->settings);

                    $data['name'] = $result->name;
                    $data['id'] = $settings['ads'];
                    $data['js_file'] =$settings['js_file'];
                    $data['result'] = unserialize($result->data);
                    $data['default'] = $this->banners[$data['id']]['default'];
                }

            }

            require_once plugin_dir_path(__FILE__) . 'partials/clickky-edit-placement.php';
        }else{

            $data = $wpdb->get_results("SELECT * FROM ".$table_name." ");
            $result = array();

            foreach ($data as $k=>$v){
                $settings = unserialize($v->settings);

                $result[] = array(

                    'original_id' => $v->id,
                    'name' => $v->name,
                    'status' => $v->status,
                    'id' => $settings['ads'],
                    'js_file' => $settings['js_file'],
                    'result' => unserialize($v->data),
                    'default' => $this->banners[$data['id']]['default']
                );

            }

            require_once plugin_dir_path(__FILE__) . 'partials/clickky-my-placement.php';
        }

    }


    public function validate_ad($code){

        $ads = '';
        $code = stripcslashes($code);
        $count = preg_match_all('/src=(["\'])(.*?)\1/', $code, $match);

        if ($count === FALSE || empty($match[2])) {
            return false;
        }else {

            foreach ($this->banners as $banner){

                if(strpos($match[2][0], $banner['js_file']) !== false ){
                    $ads =  $banner;
                    break;
                }
            }
        }

        if($ads == ''){
            return false;
        }


        preg_match_all("/('.*?'.*:.*)/", $code, $output_array);
        $data = array();
        if($output_array[0]) {
            foreach ($output_array[0] as &$value) {
                $value = str_replace("'", "", $value);
                $value = explode(':', $value);
                if (count($value) == 2) {
                    $v = explode(',', $value[1]);

                    $data[trim($value[0])] = trim($v[0]);
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
        if(count($ads['default'])!=count($data)){
            return false;
        }
        if($ads['id']=='banner' && $data['template']>3){
            $ads = $this->banners['banner_slider'];
        }

        $ads['result'] = $data;
        if($valid){
            return $ads;
        }
        return false;
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
        return $valid;
    }

    /**
     * Register setting
     */
    public function register_settings()
    {

        register_setting($this->plugin_name . '-settings', $this->plugin_name . '_home');
        register_setting($this->plugin_name . '-settings', $this->plugin_name . '_main');
        register_setting($this->plugin_name . '-settings', $this->plugin_name . '_page', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-settings', $this->plugin_name . '_post', array($this, 'serializeData'));
        register_setting($this->plugin_name . '-settings', $this->plugin_name . '_category', array($this, 'serializeData'));

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

        $html = '
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
                  integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <div class="row header">
                <div class="col s2 logo">
                    <img src="'.CLICKKY_PLUGIN_URL.'/admin/img/logo.png" height="42" alt="">
                </div>
                <div class="col s10">
                    <ul class="right top_menu">
                        <li class="'.$my_placement.'">
                            <a href="admin.php?page=my_placement">
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

    public function createField($name, $value, $data){


        if($value['type'] == 'text' || $value['type'] == 'hidden' || $value['type'] == 'color' ) {
            if($value['type'] == 'hidden') {
                $html = '<div class="form-group" style="display: none;">';
            }else{
                $html = '<div class="form-group">';
            }
            $html .= '<label for="'.$data['id'].'_'.$name.'" class="text-uppercase"> '. __($value['name'], 'clickky');
            if($value['hover']!='') {
                $html .= ' <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                               data-placement="right"
                                               title="'.$value['hover'].'"></i>';
            }
            $html .= '</label>';
            if($data['result'][$name]){
                $v = $data['result'][$name];
            }else{
                $v = $data['default'][$name]['value'];
            }
            $html .= '<input type="' . $value['type'] . '" class="form-control" id="' . $data['id'] . '_'.$name.'"
                               placeholder="' . __($value['name'], 'clickky') . '"
                               name="data['.$name.']"
                               value="' . $v . '"
                               required>';
            $html .= '<span id="helpBlock" class="help-block">'.$value['help'].'</span>';
            $html .= '</div>';
        }elseif ($value['type'] =='select'){

            $html = '<div class="form-group">';

            $html .= '<label for="'.$data['id'].'_'.$name.'" class="text-uppercase"> '. __($value['name'], 'clickky');
            if($value['hover']!='') {
                $html .= ' <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                               data-placement="right"
                                               title="'.$value['hover'].'"></i>';
            }
            $html .= '</label>';
            $script = "changeTemplateImg('".$data['id']."_".$name."', '".$data['id']."-".$name."-change');";


            $html .= '<select  id="'.$data['id'].'_'.$name.'" class="browser-default" 
                                onchange="'.$script.'"
                                name="data['.$name.']">';
            foreach ($value['values'] as $k=>$img) {
                $s = '';
                if ($data['result'][$name] == $k)
                    $s =  'selected';

                $html .= '<option
                                value="'.$k.'" '.$s.' 
                                data-bannerimg="'.$img.'">
                                '.$k.'
                            </option>';
            }

            $html .= '</select>';
            $html .= '<span id="helpBlock" class="help-block">'.$value['help'].'</span>';
            $html .= '</div>';
        }


        return $html;
    }
    /**
     * Html setting pages, posts, categories
     * @param $active
     */
    public function pageShow($active)
    {

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
