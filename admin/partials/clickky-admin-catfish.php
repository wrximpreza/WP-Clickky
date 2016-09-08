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

    <?php echo $this->topNavigation('catfish'); ?>
    <div class="container content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                <div class="bhoechie-tab-content active">
                    <h2><?php _e('Catfish Ads'); ?></h2>
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
                            <?php $this->pageShow('banner'); ?>
                        </div>

                        <div class="tab-pane col-sm-12 active" id="settings">
                            <form class="col-sm-8 row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-banner-settings'); ?>
                                <br/>
                                <div class="form-group checkbox">
                                    <label for="banner_status" class="text-uppercase">
                                        <input type="checkbox" id="banner_status"
                                               placeholder="SITE ID"
                                               name="<?php echo $this->plugin_name; ?>_banner_active"
                                               value="1" <?php if (get_option($this->plugin_name . '_banner_active') == '1') echo 'checked'; ?> />
                                        <span
                                            class="checkbox_label"><?php _e('Active', 'clickky'); ?></span>
                                    </label>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner_widget_id" class="text-uppercase">
                                        <?php _e('SITE ID'); ?>
                                    </label>

                                    <input type="text" class="form-control" id="banner_widget_id"
                                           placeholder="<?php _e('SITE ID'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_banner_widget_id"
                                           value="<?php echo get_option($this->plugin_name . '_banner_widget_id'); ?>"
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
                                           name="<?php echo $this->plugin_name; ?>_banner_hash"
                                           value="<?php echo get_option($this->plugin_name . '_banner_hash'); ?>"
                                           required/>
                                    <span id="helpBlock" class="help-block"></span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner_template" class="text-uppercase">
                                        <?php _e('Template'); ?>
                                    </label>
                                    <select class="form-control" id="banner_template"
                                            onchange="changeTemplateImg('banner_template', 'banner-template-change');"
                                            name="<?php echo $this->plugin_name; ?>_banner_template">
                                        <option
                                            value="1" <?php if (get_option($this->plugin_name . '_banner_template') == 1) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19466495/1%20%281%29.jpg?version=1&modificationDate=1463399202000&api=v2">
                                            1
                                        </option>
                                        <option
                                            value="2" <?php if (get_option($this->plugin_name . '_banner_template') == 2) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19466495/2%20%281%29.jpg?version=1&modificationDate=1463399214000&api=v2">
                                            2
                                        </option>
                                        <option
                                            value="3" <?php if (get_option($this->plugin_name . '_banner_template') == 3) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19466495/33.jpg?version=1&modificationDate=1463399226000&api=v2">
                                            3
                                        </option>
                                    </select>
                                    <span id="helpBlock" class="help-block">
                                    <ol class="list-inline">
                                        <li>1 - <?php _e('top-line'); ?> ,</li>
                                        <li>2 - <?php _e('catfish'); ?>,</li>
                                        <li>3 - <?php _e('top-line + catfish'); ?></li>
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
                                           name="<?php echo $this->plugin_name; ?>_banner_delay"
                                           value="<?php if (get_option($this->plugin_name . '_banner_delay')) echo get_option($this->plugin_name . '_banner_delay'); else echo '1'; ?>"
                                           class="form-control" id="banner-delay" required
                                           placeholder="<?php _e('Delay', 'clickky'); ?>">
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
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_banner_countShow"
                                           value="<?php if (get_option($this->plugin_name . '_banner_countShow')) echo get_option($this->plugin_name . '_banner_countShow'); else echo '1'; ?>"
                                           class="form-control" id="banner-count" required
                                           placeholder="<?php _e('Banners rotation time in minutes', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - show the following banner each time you update the current page', 'clickky'); ?>
                                </span>
                                </div>

                                <div class="form-group" style="display: none">
                                    <label
                                        for="banner-countBanners"><?php _e('Number of banners in the slider', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('banners are involved in the slider', 'clickky'); ?>"></i>
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_banner_countBanners"
                                           value="<?php if (get_option($this->plugin_name . '_banner_countBanners')) echo get_option($this->plugin_name . '_banner_countBanners'); else echo '3'; ?>"
                                           class="form-control" id="banner-countBanners" required
                                           placeholder="<?php _e('Number of banners in the slider', 'clickky'); ?>">
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
                                <?php if (get_option($this->plugin_name . '_banner_template') == 1) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19466495/1%20%281%29.jpg?version=1&modificationDate=1463399202000&api=v2"
                                        class="img-responsive banner-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_banner_template') == 2) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19466495/2%20%281%29.jpg?version=1&modificationDate=1463399214000&api=v2"
                                        class="img-responsive banner-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_banner_template') == 3) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19466495/33.jpg?version=1&modificationDate=1463399226000&api=v2"
                                        class="img-responsive banner-template-change" alt="">
                                <?php } else { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19466495/1%20%281%29.jpg?version=1&modificationDate=1463399202000&api=v2"
                                        class="img-responsive banner-template-change" alt="">
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