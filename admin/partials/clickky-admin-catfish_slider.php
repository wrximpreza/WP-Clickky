<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://clickky.biz/
 * @since      1.0.0
 *
 * @package    Clickky
 * @subpackage Clickky/admin/partials
 */
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
      integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<div class="clickky-settings">

    <?php echo $this->topNavigation('catfish_slider'); ?>

    <div class="container content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                <div class="bhoechie-tab-content active">
                    <h2><?php _e('Catfish Ads Slider'); ?></h2>
                    <hr/>
                    <ul class="nav nav-tabs" id="postsTab">
                        <li class="active"><a data-target="#settings"
                                              data-toggle="tab"><?php _e('Settings', 'clickky'); ?></a>
                        </li>
                        <li><a data-target="#pages" data-toggle="tab"><?php _e('Pages to show', 'clickky'); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <br/>
                        <div class="tab-pane col-sm-8" id="pages">
                            <form class="row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-banner-slider-shows-settings'); ?>
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
                                                    <label for="all_banner" class="text-uppercase">
                                                        <input type="checkbox" id="all_banner"
                                                               name="<?php echo $this->plugin_name; ?>_banner_slider_main"
                                                               value="1" <?php if (get_option($this->plugin_name . '_banner_slider_main') == 1) echo 'checked'; ?> />
                                                        <span
                                                            class="checkbox_label"><?php _e('Show all', 'clickky'); ?></span>
                                                    </label>
                                                </div>
                                                <div class="form-group checkbox">
                                                    <label for="banner_home" class="text-uppercase">
                                                        <input type="checkbox" id="banner_home"
                                                               name="<?php echo $this->plugin_name; ?>_banner_slider_home"
                                                               value="1" <?php if (get_option($this->plugin_name . '_banner_slider_home') == 1) echo 'checked'; ?> />
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
                                        <div class="panel-collapse collapse in" id="all_pages">
                                            <div class="panel-body">
                                                <?php
                                                $checked_pages = unserialize(get_option($this->plugin_name . '_banner_slider_page'));
                                                $pages = get_pages();
                                                ?>
                                                <div class="checkbox">
                                                    <label for="banner_pages_all">
                                                        <input id="banner_pages_all" type="checkbox"
                                                               onClick="toggleCheckbox(this, 'all_pages')"
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
                                                            <label for="banner_page_<?php echo $page->ID; ?>">
                                                                <input type="checkbox"
                                                                       name="<?php echo $this->plugin_name . '_banner_slider_page'; ?>[]"
                                                                       value="<?php echo $page->ID; ?>"
                                                                       id="banner_page_<?php echo $page->ID; ?>"
                                                                    <?php
                                                                    if (count($checked_pages) > 0)
                                                                        if (in_array($page->ID, $checked_pages))
                                                                            echo 'checked'; ?>
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
                                                $checked_posts = unserialize(get_option($this->plugin_name . '_banner_slider_post'));
                                                $posts = get_posts();
                                                ?>
                                                <div class="checkbox">
                                                    <label for="banner_post_all">
                                                        <input id="banner_post_all" type="checkbox"
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
                                                            <label for="banner_post_<?php echo $post->ID; ?>">

                                                                <input type="checkbox"
                                                                       name="<?php echo $this->plugin_name . '_banner_slider_post'; ?>[]"
                                                                       value="<?php echo $post->ID; ?>"
                                                                       id="banner_post_<?php echo $post->ID; ?>"
                                                                    <?php
                                                                    if ($checked_posts)
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
                                                $checked_categories = unserialize(get_option($this->plugin_name . '_banner_slider_category'));
                                                $categories = get_categories();
                                                ?>
                                                <div class="checkbox">
                                                    <label for="banner_all_categories">
                                                        <input type="checkbox" id="banner_all_categories"
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
                                                                for="banner_category_<?php echo $category->term_id; ?>">
                                                                <input type="checkbox"
                                                                       name="<?php echo $this->plugin_name . '_banner_slider_category'; ?>[]"
                                                                       value="<?php echo $category->term_id; ?>"
                                                                       id="banner_category_<?php echo $category->term_id; ?>"
                                                                    <?php
                                                                    if ($checked_categories)
                                                                        if (in_array($category->term_id, $checked_categories))
                                                                            echo 'checked'; ?>
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
                                    <button type="submit"
                                            class="btn btn btn-warning"><?php _e('Save', 'clickky'); ?></button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane col-sm-12 active" id="settings">
                            <form class="col-sm-8 row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-banner-slider-settings'); ?>

                                <div class="form-group checkbox">
                                    <label for="banner_status" class="text-uppercase">
                                        <input type="checkbox" id="banner_status"
                                               placeholder="SITE ID"
                                               name="<?php echo $this->plugin_name; ?>_banner_slider_active"
                                               value="1" <?php if (get_option($this->plugin_name . '_banner_slider_active') == 1) echo 'checked'; ?> />
                                        <span class="checkbox_label"><?php _e('Active', 'clickky'); ?></span>
                                    </label>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner_widget_id" class="text-uppercase">
                                        <?php _e('SITE ID'); ?>

                                    </label>
                                    <input type="text" class="form-control" id="banner_widget_id"
                                           placeholder="<?php _e('SITE ID'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_banner_slider_widget_id"
                                           value="<?php echo get_option($this->plugin_name . '_banner_slider_widget_id'); ?>"
                                           required>
                                    <span id="helpBlock" class="help-block">
                                </span>
                                </div>
                                <hr/>

                                <div class="form-group">
                                    <label for="banner-hash" class="text-uppercase">
                                        <?php _e('Hash'); ?>

                                    </label>
                                    <input type="text" class="form-control" id="banner-hash"
                                           placeholder="<?php _e('Hash'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_banner_slider_hash"
                                           value="<?php echo get_option($this->plugin_name . '_banner_slider_hash'); ?>"
                                           required/>
                                    <span id="helpBlock" class="help-block"></span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner_slider_template" class="text-uppercase">
                                        <?php _e('Template', 'clickky'); ?>
                                    </label>
                                    <select class="form-control" id="banner_slider_template"
                                            onchange="changeTemplateImg('banner_slider_template', 'banner-slider-template-change');"
                                            name="<?php echo $this->plugin_name; ?>_banner_slider_template">
                                        <option
                                            value="4" <?php if (get_option($this->plugin_name . '_banner_slider_template') == 4) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19464938/44.jpg?version=1&modificationDate=1458901341000&api=v2">
                                            4
                                        </option>
                                        <option
                                            value="5" <?php if (get_option($this->plugin_name . '_banner_slider_template') == 5) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19464938/55.jpg?version=1&modificationDate=1458901360000&api=v2">
                                            5
                                        </option>
                                        <option
                                            value="6" <?php if (get_option($this->plugin_name . '_banner_slider_template') == 6) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19464938/66.jpg?version=1&modificationDate=1458901375000&api=v2">
                                            6
                                        </option>
                                        <option
                                            value="7" <?php if (get_option($this->plugin_name . '_banner_slider_template') == 7) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19464938/77.jpg?version=1&modificationDate=1458901387000&api=v2">
                                            7
                                        </option>
                                    </select>
                                    <span id="helpBlock" class="help-block">
                                    <ol class="list-inline">
                                        <li>4 - <?php _e('top-line slider (horizontal)'); ?> ,</li>
                                        <li>5 - <?php _e('catfish slider (horizontal)'); ?>,</li>
                                        <li>6 - <?php _e('top-line slider (vertical)'); ?>, </li>
                                        <li>7 - <?php _e('catfish slider (vertical)'); ?></li>
                                    </ol>
                                </span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner-delay" class="text-uppercase">
                                        <?php _e('Delay', 'clickky'); ?>
                                        <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                           data-placement="top"
                                           title="<?php _e('parameter responsible for the delay time before displaying an advertising banner in seconds', 'clickky'); ?>"></i>
                                    </label>
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_banner_slider_delay"
                                           value="<?php if (get_option($this->plugin_name . '_banner_slider_delay')) echo get_option($this->plugin_name . '_banner_slider_delay'); else echo '1'; ?>"
                                           class="form-control" id="banner-delay" placeholder="<?php _e('Delay'); ?>"
                                           required>
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - ad unit display at web page loading without a delay', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>
                                <div class="form-group" style="display: none">
                                    <label
                                        for="banner-count"><?php _e('Banners rotation time in minutes', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('banner update happens every (n) minutes', 'clickky'); ?>"></i>
                                    <input type="text" value="1"
                                           name="<?php echo $this->plugin_name; ?>_banner_slider_countShow"
                                           value="<?php echo get_option($this->plugin_name . '_banner_slider_countShow', 'clickky'); ?>"
                                           class="form-control" id="banner-count"
                                           placeholder="<?php _e('Banners rotation time in minutes', 'clickky'); ?>"
                                           required>
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - show the following banner each time you update the current page', 'clickky'); ?>
                                </span>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="banner-countBanners"><?php _e('Number of banners in the slider', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('banners are involved in the slider', 'clickky'); ?>"></i>
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_banner_slider_countBanners"
                                           value="<?php if (get_option($this->plugin_name . '_banner_slider_countBanners')) echo get_option($this->plugin_name . '_banner_slider_countBanners'); else echo '3'; ?>"
                                           class="form-control" id="banner-countBanners"
                                           placeholder="<?php _e('Number of banners in the slider', 'clickky'); ?>"
                                           required>
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('from 0 to 1 inclusive - automatically 1, 2 or 3 templates are triggered
                                    from 2 to 4 inclusive - available for 4, 5, 6 or 7 templates
                                    > 4 - triggered the default value - 3', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>
                                <div class="form-group" style="float:right; margin-bottom: 20px;">
                                    <button type="submit"
                                            class="btn btn btn-warning"><?php _e('Save', 'clickky'); ?></button>
                                </div>
                            </form>
                            <div class="col-sm-4">
                                <?php if (get_option($this->plugin_name . '_banner_slider_template') == 4) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464938/44.jpg?version=1&modificationDate=1458901341000&api=v2"
                                        class="img-responsive banner-slider-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_banner_slider_template') == 5) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464938/55.jpg?version=1&modificationDate=1458901360000&api=v2"
                                        class="img-responsive banner-slider-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_banner_slider_template') == 6) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464938/66.jpg?version=1&modificationDate=1458901375000&api=v2"
                                        class="img-responsive banner-slider-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_banner_slider_template') == 7) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464938/77.jpg?version=1&modificationDate=1458901387000&api=v2"
                                        class="img-responsive banner-slider-template-change" alt="">
                                <?php } else { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464938/44.jpg?version=1&modificationDate=1458901341000&api=v2"
                                        class="img-responsive banner-slider-template-change" alt="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $this->htmlFooter(); ?>
</div>