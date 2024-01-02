<?php

add_action( 'wp_enqueue_scripts', 'Twenty_Twenty_Two_Child_enqueue_styles' );

function Twenty_Twenty_Two_Child_enqueue_styles() {

    $parenthandle = 'parent-style';     

    $theme = wp_get_theme();

    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 

        array(),  // if the parent theme code has a dependency, copy it to here

        $theme->parent()->get('Version')

    );

    wp_enqueue_style( 'child-style', get_stylesheet_uri(),

        array( $parenthandle ),

        $theme->get('Version') // this only works if you have Version in the style header

    );

}

function wpb_custom_new_menu() {

    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));

  }

  add_action( 'init', 'wpb_custom_new_menu' );

  add_action( 'wp_enqueue_scripts', 'custom_enqueue_wc_cart_fragments' );
function custom_enqueue_wc_cart_fragments() {
    wp_enqueue_script( 'wc-cart-fragments' );
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

?>