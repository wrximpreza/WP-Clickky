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

    <?php echo $this->topNavigation('fullscreen'); ?>
    <div class="container content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                <div class="bhoechie-tab-content active">
                    <h2><?php _e('FullScreen Ads'); ?></h2>
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
                            <?php $this->pageShow('fullScreen'); ?>
                        </div>

                        <div class="tab-pane col-sm-12 active" id="settings">
                            <form class="col-sm-8 row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-fullScreen-settings'); ?>

                                <div class="form-group checkbox">
                                    <label for="fullScreen_status" class="text-uppercase">
                                        <input type="checkbox" id="fullScreen_status"
                                               name="<?php echo $this->plugin_name; ?>_fullScreen_active"
                                               value="1" <?php if (get_option($this->plugin_name . '_fullScreen_active') == 1) echo 'checked'; ?> />
                                        <span class="checkbox_label"><?php _e('Active', 'clickky'); ?></span>
                                    </label>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="fullScreen_widget_id" class="text-uppercase">
                                        <?php _e('SITE ID'); ?>
                                    </label>
                                    <input type="text" class="form-control" id="fullScreen_widget_id"
                                           placeholder="<?php _e('SITE ID'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_fullScreen_widget_id"
                                           value="<?php echo get_option($this->plugin_name . '_fullScreen_widget_id'); ?>"
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
                                           name="<?php echo $this->plugin_name; ?>_fullScreen_hash"
                                           value="<?php echo get_option($this->plugin_name . '_fullScreen_hash'); ?>"
                                           required/>
                                    <span id="helpBlock" class="help-block"></span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="banner-delay" class="text-uppercase">
                                        <?php _e('Delay', 'clickky'); ?>
                                        <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                           data-placement="top"
                                           title="<?php _e('parameter responsible for the delay time before displaying an advertising banner in seconds', 'clickky'); ?>"></i>
                                    </label>
                                    <input type="text" name="<?php echo $this->plugin_name; ?>_fullScreen_delay"
                                           value="<?php if (get_option($this->plugin_name . '_fullScreen_delay')) echo get_option($this->plugin_name . '_fullScreen_delay'); else echo '0'; ?>"
                                           required
                                           class="form-control" id="banner-delay"
                                           placeholder="<?php _e('Delay', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - ad unit display at web page loading without a delay', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label
                                        for="banner-count"><?php _e('Page number on what the ads appears', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('parameter that determines the page number on what the ads appears', 'clickky'); ?>"></i>
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_fullScreen_pageShow"
                                           value="<?php if (get_option($this->plugin_name . '_fullScreen_pageShow')) echo get_option($this->plugin_name . '_fullScreen_pageShow'); else echo '2'; ?>"
                                           class="form-control" id="banner-count" required
                                           placeholder="<?php _e('Page number on what the ads appears', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - is ignored', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>

                                <div class="form-group" style="float:right; margin-bottom: 20px;">
                                    <button type="submit"
                                            class="btn btn btn-warning"><?php _e('Save', 'clickky'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $this->htmlFooter(); ?>
</div>