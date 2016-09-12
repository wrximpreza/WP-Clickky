<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php echo $this->topNavigation('global'); ?>

<div class="row content col s12">
    <h1>Global settings</h1>
    <dv class="row">
        <div class="accordion">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header">
                        <span><?php echo _e('Select', 'clickky'); ?></span>
                        <i class="material-icons">arrow_drop_down</i>
                    </div>
                    <div class="collapsible-body">

                        <p>
                            <input type="checkbox" id="<?php echo $active; ?>_main"
                                   name="<?php echo $this->plugin_name; ?>_<?php echo $active; ?>_main"
                                   class="filled-in"
                                   value="1" <?php if (get_option($this->plugin_name . '_' . $active . '_main') == 1) echo 'checked'; ?> />
                            <label for="<?php echo $active; ?>_main"><?php _e('Show all', 'clickky'); ?></label>
                        </p>
                        <p>

                            <input type="checkbox" id="<?php echo $active; ?>_home"
                                   name="<?php echo $this->plugin_name; ?>_<?php echo $active; ?>_home"
                                   class="filled-in"
                                   value="1" <?php if (get_option($this->plugin_name . '_' . $active . '_home') == 1) echo 'checked'; ?> />
                            <label for="<?php echo $active; ?>_home"><?php _e('Home', 'clickky'); ?></label>

                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <span><?php echo _e('Select page', 'clickky'); ?></span>
                        <i class="material-icons">arrow_drop_down</i></div>
                    <div class="collapsible-body">
                        <?php
                        $checked_pages = unserialize(get_option($this->plugin_name . '_' . $active . '_page'));
                        if (!is_array($checked_pages)) {
                            $checked_pages = array();
                        }
                        $pages = get_pages();
                        ?>
                        <p>
                            <input id="<?php echo $active; ?>_page_all" type="checkbox" class="filled-in"
                                   onClick="toggleCheckbox(this, 'pages_all')"
                                <?php
                                if (count($checked_pages) == count($pages)) {
                                    echo 'checked';
                                }
                                ?>
                            />
                            <label for="<?php echo $active; ?>_page_all"><?php _e('All', 'clickky'); ?></label>
                        </p>
                        <?php
                        if (count($pages) > 0) {
                            foreach ($pages as $page) {
                                ?>
                                <p>
                                    <input type="checkbox"  class="filled-in"
                                           name="<?php echo $this->plugin_name . '_' . $active . '_page'; ?>[]"
                                           value="<?php echo $page->ID; ?>"
                                           id="<?php echo $active; ?>_page_<?php echo $page->ID; ?>"
                                        <?php
                                        if (is_array($checked_pages) && count($checked_pages) > 0)
                                            if (in_array($page->ID, $checked_pages))
                                                echo 'checked';
                                        ?>
                                    >
                                    <label for="<?php echo $active; ?>_page_<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></label>
                                </p>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <span><?php echo _e('Select post', 'clickky'); ?></span>
                        <i class="material-icons">arrow_drop_down</i></div>
                    <div class="collapsible-body">
                        <?php
                        $checked_posts = unserialize(get_option($this->plugin_name . '_' . $active . '_post'));
                        if (!is_array($checked_posts)) {
                            $checked_posts = array();
                        }
                        $posts = get_posts();

                        ?>
                        <p>
                           <input id="<?php echo $active; ?>_post_all" type="checkbox" class="filled-in"
                                       onClick="toggleCheckbox(this, 'all_posts')"
                                    <?php
                                    if (count($checked_posts) == count($posts)) {
                                        echo 'checked';
                                    }
                                    ?>
                                />
                            <label for="<?php echo $active; ?>_post_all"><?php _e('All', 'clickky'); ?></label>
                        </p>
                        <?php

                        if (count($posts) > 0) {
                            foreach ($posts as $post) {
                                ?>
                                <p>
                                        <input type="checkbox"  class="filled-in"
                                               name="<?php echo $this->plugin_name . '_' . $active . '_post'; ?>[]"
                                               value="<?php echo $post->ID; ?>"
                                               id="<?php echo $active; ?>_post_<?php echo $post->ID; ?>"
                                            <?php
                                            if (is_array($checked_posts) && count($checked_posts) > 0)
                                                if (in_array($post->ID, $checked_posts))
                                                    echo 'checked';
                                            ?>
                                        >

                                    <label for="<?php echo $active; ?>_post_<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></label>
                                </p>

                                <?php
                            }
                        }
                        ?>

                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <span><?php echo _e('Select category', 'clickky'); ?></span>
                        <i class="material-icons">arrow_drop_down</i></div>
                    <div class="collapsible-body">
                        <?php
                        $checked_categories = unserialize(get_option($this->plugin_name . '_' . $active . '_category'));
                        if (!is_array($checked_categories)) {
                            $checked_categories = array();
                        }
                        $categories = get_categories();
                        ?>
                        <p>
                            <input id="<?php echo $active; ?>_category__all" type="checkbox"  class="filled-in"
                                       onClick="toggleCheckbox(this, 'all_categories')"
                                    <?php
                                    if (count($checked_categories) == count($categories)) {
                                        echo 'checked';
                                    }
                                    ?>
                                />
                            <label for="<?php echo $active; ?>_category__all"><?php _e('All', 'clickky'); ?></label>
                        </p>
                        <?php
                        if (count($categories) > 0) {
                            foreach ($categories as $category) {
                                ?>
                                <p>
                                        <input type="checkbox"   class="filled-in"
                                               name="<?php echo $this->plugin_name . '_' . $active . '_category'; ?>[]"
                                               value="<?php echo $category->term_id; ?>"
                                               id="<?php echo $active; ?>_category_<?php echo $category->term_id; ?>"
                                            <?php
                                            if (is_array($checked_categories) && count($checked_categories) > 0)
                                                if (in_array($category->term_id, $checked_categories))
                                                    echo 'checked';
                                            ?>
                                        >
                                    <label for="<?php echo $active; ?>_category_<?php echo $category->term_id; ?>"><?php echo $category->name; ?></label>
                                </p>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </li>
            </ul>
            <div class="row">
                <a class="btn">SAVE</a>
            </div>
        </div>
    </dv>
</div>

