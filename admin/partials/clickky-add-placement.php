<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<?php echo $this->topNavigation();?>
<div class="row content col s12">
    <h1>Hi you can monetize your site with Clickky!</h1>
    <div class="sub-title">
        Paste the code into the form below and we will do everything for you!<br />
        If you don't have code, you can register in the Clickky publisher platform and get code!
    </div>

    <form class="input-code" method="post" action="admin.php?page=my_placement&id=0">
        <div class="row">
            <div class="input-field">
                <textarea id="code" ></textarea>
                <textarea name="code" id="hide_code" style="display: none;"></textarea>
            </div>
        </div>
        <div class="row replace">
            <button class="btn right add_button" type="submit"><?php _e('CHECK', 'clickky'); ?></button>
        </div>
    </form>

</div>

