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

    <?php echo $this->topNavigation('expandable_banner'); ?>
    <div class="container content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                <div class="bhoechie-tab-content active">
                    <h2><?php _e('Expandable Banner'); ?></h2>
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
                            <?php $this->pageShow('expandable'); ?>
                        </div>

                        <div class="tab-pane col-sm-12 active" id="settings">
                            <form class="col-sm-8 row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-expandable-settings'); ?>

                                <div class="form-group checkbox">
                                    <label for="expandable_status" class="text-uppercase">
                                        <input type="checkbox" id="expandable_status"
                                               name="<?php echo $this->plugin_name; ?>_expandable_active"
                                               value="1" <?php if (get_option($this->plugin_name . '_expandable_active') == 1) echo 'checked'; ?> />
                                        <span class="checkbox_label"><?php _e('Active', 'clickky'); ?></span>
                                    </label>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="expandable_widget_id" class="text-uppercase">
                                        <?php _e('SITE ID'); ?>

                                    </label>
                                    <input type="text" class="form-control" id="expandable_widget_id"
                                           placeholder="<?php _e('SITE ID'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_expandable_widget_id"
                                           value="<?php echo get_option($this->plugin_name . '_expandable_widget_id'); ?>"
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
                                           name="<?php echo $this->plugin_name; ?>_expandable_hash"
                                           value="<?php echo get_option($this->plugin_name . '_expandable_hash'); ?>"
                                           required/>
                                    <span id="helpBlock" class="help-block"></span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="expandable_template" class="text-uppercase">
                                        <?php _e('Template', 'clickky'); ?>
                                    </label>
                                    <select class="form-control" id="expandable_template"
                                            onchange="changeTemplateImg('expandable_template', 'expandable-template-change');"
                                            name="<?php echo $this->plugin_name; ?>_expandable_template">
                                        <option
                                            value="0" <?php if (get_option($this->plugin_name . '_expandable_template') == 0) echo 'selected'; ?>>
                                            0
                                        </option>
                                        <option
                                            value="1" <?php if (get_option($this->plugin_name . '_expandable_template') == 1) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19465017/a.jpg?version=1&modificationDate=1458923048000&api=v2">
                                            1
                                        </option>
                                        <option
                                            value="2" <?php if (get_option($this->plugin_name . '_expandable_template') == 2) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19465017/b.jpg?version=1&modificationDate=1458923051000&api=v2">
                                            2
                                        </option>
                                        <option
                                            value="3" <?php if (get_option($this->plugin_name . '_expandable_template') == 3) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19465017/c.jpg?version=1&modificationDate=1458923055000&api=v2">
                                            3
                                        </option>
                                        <option
                                            value="4" <?php if (get_option($this->plugin_name . '_expandable_template') == 4) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19465017/d.jpg?version=1&modificationDate=1458923058000&api=v2">
                                            4
                                        </option>
                                    </select>
                                    <br/>
                                    <div class="alert  alert-warning">
                                        <?php _e('<strong>Warning!</strong> Any other values for this type of advertising makes the script useless character set, be careful.', 'clickky'); ?>
                                    </div>

                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner-background" class="text-uppercase">
                                        <?php _e('Background', 'clickky'); ?>
                                        <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                           data-placement="top"
                                           title="<?php _e('parameter that defines the background color of the space where the advertisement displays', 'clickky'); ?>"></i>
                                    </label>

                                    <select class="form-control" id="expandable_background"
                                            name="<?php echo $this->plugin_name; ?>_expandable_background">
                                        <option
                                            value="dark" <?php if (get_option($this->plugin_name . '_expandable_background') == 'dark') echo 'selected'; ?>>
                                            dark
                                        </option>
                                        <option
                                            value="light" <?php if (get_option($this->plugin_name . '_expandable_background') == 'light') echo 'selected'; ?>>
                                            light
                                        </option>

                                    </select>
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('dark or light', 'clickky'); ?>
                                    </span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label
                                        for="banner-autoShow"><?php _e('Banners rotation time in minutes', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('parameter that determines the delay time before opening the banner in seconds', 'clickky'); ?>"></i>
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_expandable_autoShow" required
                                           value="<?php if (get_option($this->plugin_name . '_expandable_autoShow')) echo get_option($this->plugin_name . '_expandable_autoShow'); else echo '5'; ?>"
                                           class="form-control" id="banner-autoShow"
                                           placeholder="<?php _e('Banners rotation time in minutes', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('from 0 to 60 inclusive  - banner will be opened immediately after the load page', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>

                                <div class="form-group" style="float:right; margin-bottom: 20px;">
                                    <button type="submit"
                                            class="btn btn btn-warning"><?php _e('Save', 'clickky'); ?></button>
                                </div>
                            </form>
                            <div class="col-sm-4">
                                <?php if (get_option($this->plugin_name . '_expandable_template') == 1) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19465017/a.jpg?version=1&modificationDate=1458923048000&api=v2"
                                        class="img-responsive expandable-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_expandable_template') == 2) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19465017/b.jpg?version=1&modificationDate=1458923051000&api=v2"
                                        class="img-responsive expandable-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_expandable_template') == 3) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19465017/c.jpg?version=1&modificationDate=1458923055000&api=v2"
                                        class="img-responsive expandable-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_expandable_template') == 4) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19465017/d.jpg?version=1&modificationDate=1458923058000&api=v2"
                                        class="img-responsive expandable-template-change" alt="">
                                <?php } else { ?>
                                    <img src="" class="img-responsive expandable-template-change" alt="">

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