<?php

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

# Enable opinionated block styles
# See: https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#default-block-styles
add_theme_support( 'wp-block-styles' );

?>
