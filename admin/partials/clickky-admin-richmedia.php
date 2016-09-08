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

    <?php echo $this->topNavigation('richmedia'); ?>
    <div class="container content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                <div class="bhoechie-tab-content active">
                    <h2><?php _e('Rich media'); ?></h2>
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
                            <?php $this->pageShow('richmedia'); ?>
                        </div>

                        <div class="tab-pane col-sm-12 active" id="settings">
                            <form class="col-sm-8 row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-richmedia-settings'); ?>

                                <div class="form-group checkbox">
                                    <label for="richmedia_active" class="text-uppercase">
                                        <input type="checkbox" id="richmedia_active"
                                               placeholder="SITE ID"
                                               name="<?php echo $this->plugin_name; ?>_richmedia_active"
                                               value="1" <?php if (get_option($this->plugin_name . '_richmedia_active') == 1) echo 'checked'; ?> />
                                        <span class="checkbox_label"><?php _e('Active', 'clickky'); ?></span>
                                    </label>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="richmedia_widget_id" class="text-uppercase">
                                        <?php _e('SITE ID'); ?>

                                    </label>
                                    <input type="text" class="form-control" id="richmedia_widget_id"
                                           placeholder="<?php _e('SITE ID'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_richmedia_widget_id"
                                           value="<?php echo get_option($this->plugin_name . '_richmedia_widget_id'); ?>"
                                           required>
                                    <span id="helpBlock" class="help-block">
                                </span>
                                </div>
                                <hr/>

                                <div class="form-group">
                                    <label for="richmedia-hash" class="text-uppercase">
                                        <?php _e('Hash'); ?>

                                    </label>
                                    <input type="text" class="form-control" id="richmedia-hash"
                                           placeholder="<?php _e('Hash'); ?>"
                                           name="<?php echo $this->plugin_name; ?>_richmedia_hash"
                                           value="<?php echo get_option($this->plugin_name . '_richmedia_hash'); ?>"
                                           required/>
                                    <span id="helpBlock" class="help-block"></span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="richmedia_template" class="text-uppercase">
                                        <?php _e('Template', 'clickky'); ?>
                                    </label>
                                    <select class="form-control" id="richmedia_template"
                                            onchange="changeTemplateImg('richmedia_template', 'richmedia-template-change');"
                                            name="<?php echo $this->plugin_name; ?>_richmedia_template">
                                        <option
                                            value="0" <?php if (get_option($this->plugin_name . '_richmedia_template') == 0) echo 'selected'; ?>>
                                            0
                                        </option>
                                        <option
                                            value="1" <?php if (get_option($this->plugin_name . '_richmedia_template') == 1) echo 'selected'; ?>>
                                            1
                                        </option>
                                        <option
                                            value="2" <?php if (get_option($this->plugin_name . '_richmedia_template') == 2) echo 'selected'; ?>>
                                            2
                                        </option>
                                        <option
                                            value="3" <?php if (get_option($this->plugin_name . '_richmedia_template') == 3) echo 'selected'; ?>>
                                            3
                                        </option>
                                        <option
                                            value="4" <?php if (get_option($this->plugin_name . '_richmedia_template') == 4) echo 'selected'; ?>>
                                            4
                                        </option>
                                        <option
                                            value="5" <?php if (get_option($this->plugin_name . '_richmedia_template') == 5) echo 'selected'; ?>>
                                            5
                                        </option>
                                        <option
                                            value="6" <?php if (get_option($this->plugin_name . '_richmedia_template') == 6) echo 'selected'; ?>>
                                            6
                                        </option>
                                        <option
                                            value="7" <?php if (get_option($this->plugin_name . '_richmedia_template') == 7) echo 'selected'; ?>>
                                            7
                                        </option>
                                        <option
                                            value="8" <?php if (get_option($this->plugin_name . '_richmedia_template') == 8) echo 'selected'; ?>>
                                            8
                                        </option>
                                        <option
                                            value="9" <?php if (get_option($this->plugin_name . '_richmedia_template') == 9) echo 'selected'; ?>>
                                            9
                                        </option>
                                        <option
                                            value="10" <?php if (get_option($this->plugin_name . '_richmedia_template') == 10) echo 'selected'; ?>>
                                            10
                                        </option>
                                        <option
                                            value="11" <?php if (get_option($this->plugin_name . '_richmedia_template') == 11) echo 'selected'; ?>>
                                            11
                                        </option>
                                        <option
                                            value="12" <?php if (get_option($this->plugin_name . '_richmedia_template') == 12) echo 'selected'; ?>>
                                            12
                                        </option>
                                    </select>

                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="richmedia_delay" class="text-uppercase">
                                        <?php _e('Delay', 'clickky'); ?>
                                        <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                           data-placement="top"
                                           title="<?php _e('parameter responsible for the delay time before displaying an advertising banner in seconds', 'clickky'); ?>"></i>
                                    </label>
                                    <input type="text" name="<?php echo $this->plugin_name; ?>_richmedia_delay"
                                           value="<?php if (get_option($this->plugin_name . '_richmedia_delay')) echo get_option($this->plugin_name . '_richmedia_delay'); else echo '1'; ?>"
                                           required
                                           class="form-control" id="richmedia_delay"
                                           placeholder="<?php _e('Delay', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('1-60, 0 - do not open the banner', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label
                                        for="richmedia_countShow"><?php _e('Page number on what the ads appears', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('parameter that determines the page number on what the ads appears', 'clickky'); ?>"></i>
                                    <input type="text"
                                           name="<?php echo $this->plugin_name; ?>_richmedia_countShow"
                                           value="<?php if (get_option($this->plugin_name . '_richmedia_countShow')) echo get_option($this->plugin_name . '_richmedia_countShow'); else echo '1'; ?>"
                                           class="form-control" id="richmedia_countShow" required
                                           placeholder="<?php _e('Page number on what the ads appears', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers 0 - is ignored', 'clickky'); ?>
                                </span>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label
                                        for="richmedia_second"><?php _e('Delay time for the close button in seconds', 'clickky'); ?></label>
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php _e('parameter that defines the delay time for the close button in seconds', 'clickky'); ?>"></i>
                                    <input type="text" name="<?php echo $this->plugin_name; ?>_richmedia_second"
                                           value="<?php if (get_option($this->plugin_name . '_richmedia_second')) echo get_option($this->plugin_name . '_richmedia_second'); else echo '15'; ?>"
                                           class="form-control" id="richmedia_second" required
                                           placeholder="<?php _e('Delay time for the close button in seconds', 'clickky'); ?>">
                                    <span id="helpBlock" class="help-block">
                                    <?php _e('all positive numeric integers, 0 - the script does not work', 'clickky'); ?>
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