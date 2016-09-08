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

    <?php echo $this->topNavigation('dialog'); ?>
    <div class="container content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                <div class="bhoechie-tab-content active">
                    <h2><?php _e('Dialog Ads'); ?></h2>
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
                            <?php $this->pageShow('dialog'); ?>
                        </div>

                        <div class="tab-pane col-sm-12 active" id="settings">
                            <form class="col-sm-8 row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-dialog-settings'); ?>

                                <div class="form-group checkbox">
                                    <label for="dialog_active" class="text-uppercase">
                                        <input type="checkbox" id="dialog_active"
                                               name="<?php echo $this->plugin_name; ?>_dialog_active"
                                               value="1" <?php if (get_option($this->plugin_name . '_dialog_active') == 1) echo 'checked'; ?> />
                                        <span class="checkbox_label"><?php _e('Active', 'clickky'); ?></span>
                                    </label>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="dialog_widget_id" class="text-uppercase">
                                        <?php _e('SITE ID'); ?>

                                    </label>
                                    <input type="text" class="form-control" id="dialog_widget_id"
                                           placeholder="<?php _e('SITE ID'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_dialog_widget_id"
                                           value="<?php echo get_option($this->plugin_name . '_dialog_widget_id'); ?>"
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
                                           name="<?php echo $this->plugin_name; ?>_dialog_hash"
                                           value="<?php echo get_option($this->plugin_name . '_dialog_hash'); ?>"
                                           required/>
                                    <span id="helpBlock" class="help-block"></span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="dialog_template" class="text-uppercase">
                                        <?php _e('Template', 'clickky'); ?>
                                    </label>
                                    <select class="form-control" id="dialog_template"
                                            onchange="changeTemplateImg('dialog_template', 'dialog-template-change');"
                                            name="<?php echo $this->plugin_name; ?>_dialog_template">
                                        <option
                                            value="0" <?php if (get_option($this->plugin_name . '_dialog_template') == 0) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19464935/1.jpg?version=1&modificationDate=1458899948000&api=v2">
                                            0
                                        </option>
                                        <option
                                            value="1" <?php if (get_option($this->plugin_name . '_dialog_template') == 1) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19464935/2.jpg?version=1&modificationDate=1458899961000&api=v2">
                                            1
                                        </option>
                                        <option
                                            value="2" <?php if (get_option($this->plugin_name . '_dialog_template') == 2) echo 'selected'; ?>
                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19464935/3.jpg?version=1&modificationDate=1458899972000&api=v2">
                                            2
                                        </option>

                                    </select>
                                    <br/>
                                    <div class="alert  alert-warning">
                                        <?php _e('<strong>Warning!</strong> Any other values for this type of advertising makes the script useless character set, be careful.', 'clickky'); ?>
                                    </div>

                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner_delay" class="text-uppercase">
                                        <?php _e('Delay', 'clickky'); ?>
                                        <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                           data-placement="top"
                                           title="<?php _e('parameter responsible for the delay time before displaying an advertising banner in seconds', 'clickky'); ?>"></i>
                                    </label>
                                    <input type="text" name="<?php echo $this->plugin_name; ?>_dialog_delay"
                                           value="<?php if (get_option($this->plugin_name . '_dialog_delay')) echo get_option($this->plugin_name . '_dialog_delay'); else echo '5'; ?>"
                                           required
                                           class="form-control" id="banner_delay"
                                           placeholder="<?php _e('Delay', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - ad unit display at web page loading without a delay', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label
                                        for="banner_count"><?php _e('Banners rotation time in minutes', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('banner update happens every (n) minutes', 'clickky'); ?>"></i>
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_dialog_countShow"
                                           value="<?php if (get_option($this->plugin_name . '_dialog_countShow')) echo get_option($this->plugin_name . '_dialog_countShow'); else echo '1'; ?>"
                                           class="form-control" id="banner_count" required
                                           placeholder="<?php _e('Banners rotation time in minutes', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - show the following banner each time you update the current page', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>

                                <div class="form-group" style="float:right; margin-bottom: 20px;">
                                    <button type="submit"
                                            class="btn btn btn-warning"><?php _e('Save', 'clickky'); ?></button>
                                </div>
                            </form>
                            <div class="col-sm-4">
                                <?php if (get_option($this->plugin_name . '_dialog_template') == 1) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464935/2.jpg?version=1&modificationDate=1458899961000&api=v2"
                                        class="img-responsive dialog-template-change" alt="">
                                <?php } elseif (get_option($this->plugin_name . '_dialog_template') == 2) { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464935/3.jpg?version=1&modificationDate=1458899972000&api=v2"
                                        class="img-responsive dialog-template-change" alt="">
                                <?php } else { ?>
                                    <img
                                        src="http://confluence.cli.bz/download/thumbnails/19464935/1.jpg?version=1&modificationDate=1458899948000&api=v2"
                                        class="img-responsive dialog-template-change" alt="">
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