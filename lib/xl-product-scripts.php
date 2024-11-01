<?php

function xl_product_carousel() {

    if (!is_admin()) {
        wp_enqueue_script('xl_product_owl_js', plugins_url('/../vendors/owl/owl.carousel.min.js', __FILE__), array('jquery'), '2.0.0', true);
        wp_enqueue_script('xl_product_custom_js', plugins_url('/../assets/js/xl-product-custom.js', __FILE__), array(), '1.0.0', true);
        wp_enqueue_style('xl_product_owl_css', plugins_url('/../vendors/owl/assets/owl.carousel.css', __FILE__), array(), '2.0.0');
        wp_enqueue_style('xl_product_custom_css', plugins_url('/../assets/css/xl-product-custom.css', __FILE__), array(), '1.0.0');
    }
}

add_action('init', 'xl_product_carousel');
