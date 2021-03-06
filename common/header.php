<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,400italic,700' rel='stylesheet' type='text/css'>
    <?php
    queue_css_file(array('iconfonts', 'style', 'slider-pro.min'));
    queue_css_file('bigfoot-number');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php queue_js_file(array('vendor/jquery-accessibleMegaMenu', 'religions', 'globals')); ?>
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('bigfoot'); ?>
    <?php queue_js_file('jquery.sliderPro.min'); ?>
    <?php echo head_js(); ?>
    
    <script type="text/javascript">
        var bigfoot = jQuery.bigfoot(
                {
                    activateOnHover:true,
                    deleteOnUnhover:true,
                }
            );
    </script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">
        <div id="header" role="banner">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <div class="center-div">

                <div id="primary-nav" role="navigation">
                    <?php echo public_nav_main(); ?>

                    <div id="search-container" role="search">
                        <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                        <?php echo search_form(array('show_advanced' => true)); ?>
                        <?php else: ?>
                        <?Php echo search_form(); ?>
                        <?php endif; ?>
                    </div>
                </div><!-- end primary-nav -->

                <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
                <?php echo theme_header_image(); ?>


            </div>
        </div><!-- end header -->
        <div id="content" class="center-div" role="main" tabindex="-1">
            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
