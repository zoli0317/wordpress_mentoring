<!DOCTYPE html>
<?php $my_settings = get_option("my_options", $my_settings); ?>

<html>
    <head>
        <title><?php the_title(); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css" type="text/css" />
        <?php  wp_head(); 
                $banner_image = $my_settings["banner_image"];
                $social_link_checkbox_facebook = $my_settings["social_link_checkbox_facebook"];
                $social_link_text_facebook = $my_settings["social_link_text_facebook"];
                $social_link_checkbox_twitter = $my_settings["social_link_checkbox_twitter"];
                $social_link_text_twitter = $my_settings["social_link_text_twitter"];
        ?>
    </head>
    <body>
        <div class="main-wrapper">
            <header>
                <div class="banner-container">
                    <a href=<?php echo get_bloginfo('wpurl'); ?>  class="banner" style="background-image: url(<?php echo $banner_image;?>); "></a>
                </div>
                <div class="header-menus">
                    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'header-menu'));   

                    if(isset($social_link_checkbox_facebook) && isset($social_link_text_facebook) && trim($social_link_text_facebook) != ''){
                        ?> <a class="social_link_facebook" href="<?php echo $social_link_text_facebook;?>" target="_blank"></a> <?php   
                    }
                    if(isset($social_link_checkbox_twitter) && isset($social_link_text_twitter) && trim($social_link_text_twitter) != ''){
                        ?> <a class="social_link_twitter" href="<?php echo $social_link_text_twitter;?>" target="_blank"></a> <?php   
                    }
                    ?>                  
                    <div class="header-search"><?php get_search_form(); ?></div>
				</div>
            </header>
