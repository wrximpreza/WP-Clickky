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

    <?php echo $this->topNavigation('recommended_apps'); ?>
    <div class="container content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                <div class="bhoechie-tab-content active">
                    <h2><?php _e('Recommended Apps'); ?></h2>
                    <hr/>
                    <ul class="nav nav-tabs" id="postsTab">
                        <li class="active"><a data-target="#settings"
                                              data-toggle="tab"><?php _e('Settings', 'clickky'); ?></a>
                        </li>
                        <li><a data-target="#pages" data-toggle="tab"><?php _e('Pages to show', 'clickky'); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <br/>
                        <div class="tab-pane col-sm-12" id="pages">
                            <form method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-recommended-shows-settings'); ?>
                                <div class="panel-group">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <?php echo _e('Select page', 'clickky'); ?>
                                            </h4>
                                        </div>
                                        <div id="collapse_0" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th><?php _e('Id', 'clickky'); ?></th>
                                                        <th><?php _e('Name', 'clickky'); ?></th>
                                                        <th><?php _e('Active', 'clickky'); ?></th>
                                                        <th><?php _e('Position', 'clickky'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if ($r_count > 0): ?>
                                                        <?php for ($i = 0; $i < $r_count; $i++): ?>
                                                            <tr>
                                                                <td><?php echo $i + 1; ?></td>
                                                                <td><?php echo $recommendeds['name'][$i]; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($recommendeds['active'][$i] == 1) {
                                                                        echo _e('Yes', 'clickky');
                                                                    } else {
                                                                        echo _e('No', 'clickky');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <select
                                                                        name="<?php echo $this->plugin_name . '_recommended_page[' . $recommendeds['hash'][$i] . ']'; ?>">
                                                                        <option
                                                                            value=""><?php _e('Select', 'clickky'); ?></option>
                                                                        <!--
                                                                    <option <?php if ($recommended_page[$recommendeds['hash'][$i]] == 'before_header') echo 'selected'; ?> value="before_header">После заголовка</option>
                                                                    <option <?php if ($recommended_page[$recommendeds['hash'][$i]] == 'after_header') echo 'selected'; ?> value="after_header">Перед заголовком</option>-->
                                                                        <option <?php if ($recommended_page[$recommendeds['hash'][$i]] == 'before_comment') echo 'selected'; ?>
                                                                            value="before_comment">
                                                                            <?php _e('Before comment', 'clickky'); ?>
                                                                        </option>
                                                                        <option <?php if ($recommended_page[$recommendeds['hash'][$i]] == 'after_comment') echo 'selected'; ?>
                                                                            value="after_comment">
                                                                            <?php _e('After comment', 'clickky'); ?>
                                                                        </option>
                                                                        <option <?php if ($recommended_page[$recommendeds['hash'][$i]] == 'before_content') echo 'selected'; ?>
                                                                            value="before_content">
                                                                            <?php _e('Before content', 'clickky'); ?>
                                                                        </option>
                                                                        <option <?php if ($recommended_page[$recommendeds['hash'][$i]] == 'after_content') echo 'selected'; ?>
                                                                            value="after_content">
                                                                            <?php _e('After content', 'clickky'); ?>
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
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
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th><?php _e('Id', 'clickky'); ?></th>
                                                        <th><?php _e('Name', 'clickky'); ?></th>
                                                        <th><?php _e('Active', 'clickky'); ?></th>
                                                        <th><?php _e('Position', 'clickky'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if ($r_count > 0): ?>
                                                        <?php for ($i = 0; $i < $r_count; $i++): ?>
                                                            <tr>
                                                                <td><?php echo $i + 1; ?></td>
                                                                <td><?php echo $recommendeds['name'][$i]; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($recommendeds['active'][$i] == 1) {
                                                                        echo _e('Yes', 'clickky');
                                                                    } else {
                                                                        echo _e('No', 'clickky');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <select
                                                                        name="<?php echo $this->plugin_name . '_recommended_post[' . $recommendeds['hash'][$i] . ']'; ?>">
                                                                        <option
                                                                            value=""><?php _e('Select', 'clickky'); ?></option>
                                                                        <!--<option <?php if ($recommended_post[$recommendeds['hash'][$i]] == 'before_header') echo 'selected'; ?> value="before_header">После заголовка</option>
                                                                    <option <?php if ($recommended_post[$recommendeds['hash'][$i]] == 'after_header') echo 'selected'; ?> value="after_header">Перед заголовком</option>
                                                                    <option <?php if ($recommended_post[$recommendeds['hash'][$i]] == 'before_comment') echo 'selected'; ?> value="before_comment">Перед комментариями</option>
                                                                    -->
                                                                        <option <?php if ($recommended_post[$recommendeds['hash'][$i]] == 'after_comment') echo 'selected'; ?>
                                                                            value="after_comment"><?php _e('After comment', 'clickky'); ?>
                                                                        </option>
                                                                        <option <?php if ($recommended_post[$recommendeds['hash'][$i]] == 'before_content') echo 'selected'; ?>
                                                                            value="before_content"><?php _e('Before content', 'clickky'); ?>
                                                                        </option>
                                                                        <option <?php if ($recommended_post[$recommendeds['hash'][$i]] == 'after_content') echo 'selected'; ?>
                                                                            value="after_content"><?php _e('After content', 'clickky'); ?>
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
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
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th><?php _e('Id', 'clickky'); ?></th>
                                                        <th><?php _e('Name', 'clickky'); ?></th>
                                                        <th><?php _e('Active', 'clickky'); ?></th>
                                                        <th><?php _e('Position', 'clickky'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if ($r_count > 0): ?>
                                                        <?php for ($i = 0; $i < $r_count; $i++): ?>
                                                            <tr>
                                                                <td><?php echo $i + 1; ?></td>
                                                                <td><?php echo $recommendeds['name'][$i]; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($recommendeds['active'][$i] == 1) {
                                                                        echo _e('Yes', 'clickky');
                                                                    } else {
                                                                        echo _e('No', 'clickky');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <select
                                                                        name="<?php echo $this->plugin_name . '_recommended_category[' . $recommendeds['hash'][$i] . ']'; ?>">
                                                                        <option
                                                                            value=""><?php _e('Select', 'clickky'); ?></option>
                                                                        <option <?php if ($recommended_category[$recommendeds['hash'][$i]] == 'before_loop') echo 'selected'; ?>
                                                                            value="before_loop">
                                                                            <?php echo _e('Before articles', 'clickky'); ?>
                                                                        </option>
                                                                        <option <?php if ($recommended_category[$recommendeds['hash'][$i]] == 'after_loop') echo 'selected'; ?>
                                                                            value="after_loop">
                                                                            <?php echo _e('After articles', 'clickky'); ?>
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <?php echo _e('Select widget', 'clickky'); ?>
                                            </h4>
                                        </div>
                                        <div class="panel-collapse collapse in" id="all_widget">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th><?php _e('Id', 'clickky'); ?></th>
                                                        <th><?php _e('Name', 'clickky'); ?></th>
                                                        <th><?php _e('Active', 'clickky'); ?></th>
                                                        <th><?php _e('Widget status', 'clickky'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if ($r_count > 0): ?>
                                                        <?php for ($i = 0; $i < $r_count; $i++): ?>
                                                            <tr>
                                                                <td><?php echo $i + 1; ?></td>
                                                                <td><?php echo $recommendeds['name'][$i]; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($recommendeds['active'][$i] == 1) {
                                                                        echo _e('Yes', 'clickky');
                                                                    } else {
                                                                        echo _e('No', 'clickky');
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <select
                                                                        name="<?php echo $this->plugin_name . '_recommended_widget[' . $recommendeds['hash'][$i] . ']'; ?>">
                                                                        <option <?php
                                                                        if (isset($recommended_widget[$recommendeds['hash'][$i]]))
                                                                            if ($recommended_widget[$recommendeds['hash'][$i]] == 0)
                                                                                echo 'selected'; ?>
                                                                            value="0"><?php _e('No', 'clickky'); ?>
                                                                        </option>
                                                                        <option <?php
                                                                        if (isset($recommended_widget[$recommendeds['hash'][$i]]))
                                                                            if ($recommended_widget[$recommendeds['hash'][$i]] == 1)
                                                                                echo 'selected'; ?>
                                                                            value="1"><?php _e('Yes', 'clickky'); ?>
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr/>
                                <div class="form-group" style="float:right; margin-bottom: 20px; margin-right: 20px;">
                                    <button type="submit"
                                            class="btn btn btn-warning"><?php _e('Save', 'clickky'); ?></button>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane col-sm-12 active" id="settings">

                            <div id="tabClone">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse_0" aria-expanded="true" aria-controls="collapseOne">
                                                Recommended Apps #1
                                            </a>
                                            <a href="#" class="close" onclick="removeTab(this);" data-dismiss="alert"
                                               aria-label="close">&times;</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_0" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="col-sm-8 row" name="cleanup_options">

                                                <div class="form-group">
                                                    <label for="expandable_widget_id" class="text-uppercase">
                                                        <?php _e('Name', 'clickky'); ?>

                                                    </label>
                                                    <input type="text" class="form-control" id="interstitial_widget_id"
                                                           placeholder="<?php _e('Name', 'clickky'); ?>"
                                                           name="<?php echo $this->plugin_name; ?>_recommended[name][]"
                                                           required>
                                                    <span id="helpBlock" class="help-block">
                                                    </span>
                                                </div>
                                                <hr/>

                                                <div class="form-group">
                                                    <label for="banner_status" class="text-uppercase checkbox_label">
                                                        <?php _e('Active', 'clickky'); ?>
                                                    </label>
                                                    <select
                                                        name="<?php echo $this->plugin_name; ?>_recommended[active][]"
                                                        id="interstitial_widget_id">
                                                        <option value="0"><?php echo _e('No', 'clickky'); ?></option>
                                                        <option value="1"><?php echo _e('Yes', 'clickky'); ?></option>
                                                    </select>
                                                    <span
                                                        style="padding-top: 4px; display: block;"></span>

                                                </div>

                                                <hr/>
                                                <div class="form-group">
                                                    <label for="expandable_widget_id" class="text-uppercase">
                                                        <?php _e('SITE ID'); ?>

                                                    </label>
                                                    <input type="text" class="form-control" id="interstitial_widget_id"
                                                           placeholder="<?php _e('SITE ID'); ?>"
                                                           name="<?php echo $this->plugin_name; ?>_recommended[widget_id][]"
                                                           value="<?php echo get_option($this->plugin_name . '_interstitial_widget_id'); ?>"
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
                                                           name="<?php echo $this->plugin_name; ?>_recommended[hash][]"
                                                           value="<?php echo get_option($this->plugin_name . '_interstitial_hash'); ?>"
                                                           required/>
                                                    <span id="helpBlock" class="help-block"></span>
                                                </div>
                                                <hr/>
                                                <div class="form-group">
                                                    <label for="banner-hash" class="text-uppercase">
                                                        <?php _e('Template', 'clickky'); ?>
                                                    </label>
                                                    <select class="form-control" id="interstitial_template"
                                                            onchange="changeTemplateImg('interstitial_template', 'interstitial-template-change');"
                                                            name="<?php echo $this->plugin_name; ?>_recommended[template][]">
                                                        <option
                                                            value="1" <?php if (get_option($this->plugin_name . '_interstitial_template') == 1) echo 'selected'; ?>
                                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/1.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                            1
                                                        </option>
                                                        <option
                                                            value="2" <?php if (get_option($this->plugin_name . '_interstitial_template') == 2) echo 'selected'; ?>
                                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/2.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                            2
                                                        </option>
                                                        <option
                                                            value="3" <?php if (get_option($this->plugin_name . '_interstitial_template') == 3) echo 'selected'; ?>
                                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/3.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                            3
                                                        </option>
                                                        <option
                                                            value="4" <?php if (get_option($this->plugin_name . '_interstitial_template') == 4) echo 'selected'; ?>
                                                            data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/4.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                            4
                                                        </option>
                                                    </select>

                                                </div>
                                                <hr/>
                                                <div class="form-group">
                                                    <label for="banner-delay" class="text-uppercase">
                                                        <?php _e('Button Color', 'clickky'); ?>

                                                    </label>

                                                    <select class="form-control" id="interstitial_template"
                                                            name="<?php echo $this->plugin_name; ?>_recommended[buttonClassColor][]">
                                                        <option
                                                            value="white" <?php if (get_option($this->plugin_name . '_recommended_template') == 'white') echo 'selected'; ?>>
                                                            white
                                                        </option>
                                                        <option
                                                            value="black" <?php if (get_option($this->plugin_name . '_recommended_template') == 'black') echo 'selected'; ?>>
                                                            black
                                                        </option>

                                                    </select>

                                                    <span id="helpBlock" class="help-block">

                                                    </span>
                                                </div>
                                                <hr/>

                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-background" class="text-uppercase">
                                                            <?php _e('Background', 'clickky'); ?>

                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-4">
                                                        <input type="color" class="form-control"
                                                               id="interstitial-background"
                                                               placeholder="<?php _e('Background', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[background][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_background')) echo get_option($this->plugin_name . '_interstitial_background'); else echo '#ffffff'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-fontFamily" class="text-uppercase">
                                                            <?php _e('Font Family', 'clickky'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-12">
                                                        <input type="text" class="form-control"
                                                               id="interstitial-fontFamily"
                                                               placeholder="<?php _e('Font Family', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[fontFamily][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_fontFamily')) echo get_option($this->plugin_name . '_interstitial_fontFamily'); else echo 'Helvetica,Arial,sans-serif'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>

                                                </div>
                                                <hr/>
                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-colorFontTitle" class="text-uppercase">
                                                            <?php _e('Color font title', 'clickky'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-4">
                                                        <input type="color" class="form-control"
                                                               id="interstitial-colorFontTitle"
                                                               placeholder="<?php _e('Color font title', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[colorFontTitle][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_colorFontTitle')) echo get_option($this->plugin_name . '_interstitial_colorFontTitle'); else echo '#000000'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>

                                                </div>
                                                <hr/>

                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-colorFontDescription"
                                                               class="text-uppercase">
                                                            <?php _e('Rating Color', 'clickky'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-4">
                                                        <input type="color" class="form-control"
                                                               id="interstitial-ratingFontColor"
                                                               placeholder="<?php _e('Rating Color', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[ratingFontColor][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_ratingFontColor')) echo get_option($this->plugin_name . '_interstitial_ratingFontColor'); else echo '#000000'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>

                                                </div>
                                                <hr/>
                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-colorFontDescription"
                                                               class="text-uppercase">
                                                            <?php _e('Color description', 'clickky'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-4">
                                                        <input type="color" class="form-control"
                                                               id="interstitial-colorFontDescription"
                                                               placeholder="<?php _e('Color description', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[colorFontDescription][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_colorFontDescription')) echo get_option($this->plugin_name . '_interstitial_colorFontDescription'); else echo '#000000'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>

                                                </div>
                                                <hr/>


                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-buttonBackground"
                                                               class="text-uppercase">
                                                            <?php _e('Button background', 'clickky'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-4">
                                                        <input type="color" class="form-control"
                                                               id="interstitial-buttonBackground"
                                                               placeholder="<?php _e('Button background', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[buttonBackground][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_buttonBackground')) echo get_option($this->plugin_name . '_interstitial_buttonBackground'); else echo '#E63517'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>

                                                </div>
                                                <hr/>
                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-buttonFontColor"
                                                               class="text-uppercase">
                                                            <?php _e('Button font color', 'clickky'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-4">
                                                        <input type="color" class="form-control"
                                                               id="interstitial-buttonFontColor"
                                                               placeholder="<?php _e('Button font color', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[buttonFontColor][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_buttonFontColor')) echo get_option($this->plugin_name . '_interstitial_buttonFontColor'); else echo '#ffffff'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>

                                                </div>
                                                <hr/>
                                                <div class="form-group clearfix">
                                                    <div class="row col-sm-12">
                                                        <label for="interstitial-buttonBorderColor"
                                                               class="text-uppercase">
                                                            <?php _e('Button border color', 'clickky'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="row col-sm-4">
                                                        <input type="color" class="form-control"
                                                               id="interstitial-buttonBorderColor"
                                                               placeholder="<?php _e('Button border color', 'clickky'); ?>"
                                                               name="<?php echo $this->plugin_name; ?>_recommended[buttonBorderColor][]"
                                                               value="<?php if (get_option($this->plugin_name . '_interstitial_buttonBorderColor')) echo get_option($this->plugin_name . '_interstitial_buttonBorderColor'); else echo '#E63517'; ?>"
                                                               required/>
                                                        <span id="helpBlock" class="help-block"></span>
                                                    </div>
                                                </div>


                                            </div>
                                            <!--<div class="col-sm-4">
                                                <?php if (get_option($this->plugin_name . '_interstitial_template') == 2) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/2.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } elseif (get_option($this->plugin_name . '_interstitial_template') == 3) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/3.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } elseif (get_option($this->plugin_name . '_interstitial_template') == 4) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/4.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } elseif (get_option($this->plugin_name . '_interstitial_template') == 1) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/1.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } ?>
                                            </div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <form class="col-sm-12 row" method="post" name="cleanup_options" action="options.php">
                                <?php settings_fields('clickky-recommended-settings'); ?>
                                <div class="form-group" style="text-align:right;">
                                    <button type="button" class="btn btn btn-default"
                                            onClick="createTab(); return false;"><?php _e('Add banner', 'clickky'); ?></button>
                                </div>
                                <?php
                                $recommendeds = unserialize(get_option($this->plugin_name . '_recommended'));

                                if ($recommendeds) {
                                    $r_count = count($recommendeds['widget_id']);
                                } else {
                                    $r_count = 0;
                                }
                                ?>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php if ($r_count > 0): ?>
                                        <?php for ($i = 0; $i < $r_count; $i++):

                                            ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab"
                                                     id="heading_<?php echo $i + 1; ?>">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse_<?php echo $i + 1; ?>" aria-expanded="true"
                                                           aria-controls="collapse_<?php echo $i + 1; ?>">
                                                            Recommended Apps #<?php echo $i + 1; ?>
                                                            - <?php echo $recommendeds['name'][$i]; ?>
                                                        </a>
                                                        <a href="#" class="close" onclick="removeTab(this);"
                                                           data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_<?php echo $i + 1; ?>" class="panel-collapse collapse"
                                                     role="tabpanel"
                                                     aria-labelledby="heading_<?php echo $i + 1; ?>">
                                                    <div class="panel-body">
                                                        <div class="col-sm-8 row" name="cleanup_options">
                                                            <div class="form-group">

                                                                <label for="expandable_widget_id"
                                                                       class="text-uppercase">
                                                                    <?php _e('Shortcode', 'clickky'); ?>
                                                                    <i class="fa fa-info-circle fa-lg"
                                                                       aria-hidden="true" data-toggle="tooltip"
                                                                       data-placement="top"
                                                                       title="<?php _e('promotional code to integrate the ad unit inside of article manually', 'clickky'); ?>">
                                                                    </i>
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           value='[clickky_recommended_apps hash="<?php echo $recommendeds['hash'][$i]; ?>"]'
                                                                           id="copy-input">
                                                                    <span class="input-group-btn">
                                                                  <button class="btn btn-default" type="button"
                                                                          id="copy-button"
                                                                          data-toggle="tooltip" data-placement="button"
                                                                          title="<?php _e('Copy to Clipboard', 'clickky'); ?>">
                                                                    <?php _e('Copy'); ?>
                                                                  </button>
                                                                </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="expandable_widget_id"
                                                                       class="text-uppercase">
                                                                    <?php _e('Name', 'clickky'); ?>

                                                                </label>
                                                                <input type="text" class="form-control"
                                                                       id="interstitial_widget_id"
                                                                       placeholder="<?php _e('Name', 'clickky'); ?>"
                                                                       name="<?php echo $this->plugin_name; ?>_recommended[name][]"
                                                                       value="<?php echo $recommendeds['name'][$i]; ?>"
                                                                       required>
                                                                <span id="helpBlock" class="help-block"></span>
                                                            </div>
                                                            <hr/>

                                                            <div class="form-group">

                                                                <label for="banner_status"
                                                                       class="text-uppercase checkbox_label">
                                                                    <?php _e('Active', 'clickky'); ?>
                                                                </label>


                                                                <select
                                                                    name="<?php echo $this->plugin_name; ?>_recommended[active][]"
                                                                    id="interstitial_widget_id">
                                                                    <option
                                                                        value="0" <?php if ($recommendeds['active'][$i] == 0) echo 'selected'; ?>><?php echo _e('No', 'clickky'); ?></option>
                                                                    <option
                                                                        value="1" <?php if ($recommendeds['active'][$i] == 1) echo 'selected'; ?> ><?php echo _e('Yes', 'clickky'); ?></option>
                                                                </select>
                                                                <span
                                                                    style="padding-top: 4px; display: block;"></span>

                                                            </div>
                                                            <hr/>
                                                            <div class="form-group">
                                                                <label for="expandable_widget_id"
                                                                       class="text-uppercase">
                                                                    <?php _e('SITE ID'); ?>

                                                                </label>
                                                                <input type="text" class="form-control"
                                                                       id="interstitial_widget_id"
                                                                       placeholder="<?php _e('SITE ID'); ?>"
                                                                       name="<?php echo $this->plugin_name; ?>_recommended[widget_id][]"
                                                                       value="<?php echo $recommendeds['widget_id'][$i]; ?>"
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
                                                                       name="<?php echo $this->plugin_name; ?>_recommended[hash][]"
                                                                       value="<?php echo $recommendeds['hash'][$i]; ?>"
                                                                       required/>
                                                                <span id="helpBlock" class="help-block"></span>
                                                            </div>
                                                            <hr/>
                                                            <div class="form-group">
                                                                <label for="banner-hash" class="text-uppercase">
                                                                    <?php _e('Template'); ?>
                                                                </label>
                                                                <select class="form-control" id="interstitial_template"
                                                                        onchange="changeTemplateImg('interstitial_template', 'interstitial-template-change');"
                                                                        name="<?php echo $this->plugin_name; ?>_recommended[template][]">
                                                                    <option
                                                                        value="1" <?php if ($recommendeds['template'][$i] == 1) echo 'selected'; ?>
                                                                        data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/1.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                                        1
                                                                    </option>
                                                                    <option
                                                                        value="2" <?php if ($recommendeds['template'][$i] == 2) echo 'selected'; ?>
                                                                        data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/2.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                                        2
                                                                    </option>
                                                                    <option
                                                                        value="3" <?php if ($recommendeds['template'][$i] == 3) echo 'selected'; ?>
                                                                        data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/3.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                                        3
                                                                    </option>
                                                                    <option
                                                                        value="4" <?php if ($recommendeds['template'][$i] == 4) echo 'selected'; ?>
                                                                        data-bannerimg="http://confluence.cli.bz/download/thumbnails/19467530/4.jpg?version=1&modificationDate=1465387309000&api=v2">
                                                                        4
                                                                    </option>
                                                                </select>

                                                            </div>
                                                            <hr/>
                                                            <div class="form-group">
                                                                <label for="banner-delay" class="text-uppercase">
                                                                    <?php _e('Button Color', 'clickky'); ?>
                                                                </label>

                                                                <select class="form-control" id="interstitial_template"
                                                                        name="<?php echo $this->plugin_name; ?>_recommended[buttonClassColor][]">
                                                                    <option
                                                                        value="white" <?php if ($recommendeds['buttonClassColor'][$i] == 'white') echo 'selected'; ?>>
                                                                        white
                                                                    </option>
                                                                    <option
                                                                        value="black" <?php if ($recommendeds['buttonClassColor'][$i] == 'black') echo 'selected'; ?>>
                                                                        black
                                                                    </option>

                                                                </select>

                                                                <span id="helpBlock" class="help-block">

                                                    </span>
                                                            </div>
                                                            <hr/>

                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-background"
                                                                           class="text-uppercase">
                                                                        <?php _e('Background', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-background"
                                                                           placeholder="<?php _e('Background', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[background][]"
                                                                           value="<?php if ($recommendeds['background'][$i]) echo $recommendeds['background'][$i]; else echo '#ffffff'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-fontFamily"
                                                                           class="text-uppercase">
                                                                        <?php _e('Font Family', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-12">
                                                                    <input type="text" class="form-control"
                                                                           id="interstitial-fontFamily"
                                                                           placeholder="<?php _e('Font Family', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[fontFamily][]"
                                                                           value="<?php if ($recommendeds['fontFamily'][$i]) echo $recommendeds['fontFamily'][$i]; else echo 'Helvetica,Arial,sans-serif'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>


                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-colorFontDescription"
                                                                           class="text-uppercase">
                                                                        <?php _e('Color description', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-ratingFontColor"
                                                                           placeholder="<?php _e('Rating Color', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[ratingFontColor][]"
                                                                           value="<?php if ($recommendeds['ratingFontColor'][$i]) echo $recommendeds['ratingFontColor'][$i]; else echo '#000000'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>
                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-colorFontDescription"
                                                                           class="text-uppercase">
                                                                        <?php _e('Color description', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-colorFontDescription"
                                                                           placeholder="<?php _e('Color description', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[colorFontDescription][]"
                                                                           value="<?php if ($recommendeds['colorFontDescription'][$i]) echo $recommendeds['colorFontDescription'][$i]; else echo '#000000'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>


                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-colorFontTitle"
                                                                           class="text-uppercase">
                                                                        <?php _e('Color font title', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-colorFontTitle"
                                                                           placeholder="<?php _e('Color font title', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[colorFontTitle][]"
                                                                           value="<?php if ($recommendeds['colorFontTitle'][$i]) echo $recommendeds['colorFontTitle'][$i]; else echo '#000000'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>

                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-colorFontTitle"
                                                                           class="text-uppercase">
                                                                        <?php _e('Color font title', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-colorFontTitle"
                                                                           placeholder="<?php _e('Color font title', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[colorFontTitle][]"
                                                                           value="<?php if ($recommendeds['colorFontTitle'][$i]) echo $recommendeds['colorFontTitle'][$i]; else echo '#000000'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>

                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-colorFontDescription"
                                                                           class="text-uppercase">
                                                                        <?php _e('Rating Color', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-ratingFontColor"
                                                                           placeholder="<?php _e('Rating Color', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[ratingFontColor][]"
                                                                           value="<?php if ($recommendeds['ratingFontColor'][$i]) echo $recommendeds['ratingFontColor'][$i]; else echo '#000000'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>
                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-buttonBackground"
                                                                           class="text-uppercase">
                                                                        <?php _e('Button background', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-buttonBackground"
                                                                           placeholder="<?php _e('Button background', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[buttonBackground][]"
                                                                           value="<?php if ($recommendeds['buttonBackground'][$i]) echo $recommendeds['buttonBackground'][$i]; else echo '#E63517'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>
                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-buttonFontColor"
                                                                           class="text-uppercase">
                                                                        <?php _e('Button font color', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-buttonFontColor"
                                                                           placeholder="<?php _e('Button font color', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[buttonFontColor][]"
                                                                           value="<?php if ($recommendeds['buttonFontColor'][$i]) echo $recommendeds['buttonFontColor'][$i]; else echo '#ffffff'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <hr/>
                                                            <div class="form-group clearfix">
                                                                <div class="row col-sm-12">
                                                                    <label for="interstitial-buttonBorderColor"
                                                                           class="text-uppercase">
                                                                        <?php _e('Button border color', 'clickky'); ?>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-sm-4">
                                                                    <input type="color" class="form-control"
                                                                           id="interstitial-buttonBorderColor"
                                                                           placeholder="<?php _e('Button border color', 'clickky'); ?>"
                                                                           name="<?php echo $this->plugin_name; ?>_recommended[buttonBorderColor][]"
                                                                           value="<?php if ($recommendeds['buttonBorderColor'][$i]) echo $recommendeds['buttonBorderColor'][$i]; else echo '#E63517'; ?>"
                                                                           required/>
                                                                    <span id="helpBlock" class="help-block"></span>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <!--<div class="col-sm-4">
                                                <?php if (get_option($this->plugin_name . '_interstitial_template') == 2) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/2.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } elseif (get_option($this->plugin_name . '_interstitial_template') == 3) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/3.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } elseif (get_option($this->plugin_name . '_interstitial_template') == 4) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/4.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } elseif (get_option($this->plugin_name . '_interstitial_template') == 1) { ?>
                                                    <img
                                                        src="http://confluence.cli.bz/download/thumbnails/19467530/1.jpg?version=1&modificationDate=1465387309000&api=v2"
                                                        class="img-responsive interstitial-template-change" alt="">
                                                <?php } ?>
                                            </div>-->
                                                    </div>
                                                </div>

                                            </div>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </div>

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