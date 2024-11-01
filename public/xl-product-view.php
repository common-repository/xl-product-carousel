<?php

/**
 * Short Code [xl_product]
 * @param $atts
 * @return string
 */

/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 * @return mixed
 */
function xl_product_option( $option, $section, $default = '' ) {

    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }

    return $default;
}

//Shortcode
function xl_product_shortcode($atts) {

    $posts = xl_product_option( 'xl_product_numb', 'xl_product_basics', 10 );

    extract(shortcode_atts(
        array(

        ), $atts
    ));


    $xl_loop = new WP_Query(
        array(
            'post_type' => 'product',
            'posts_per_page' => 10,
        )
    );

    $output = '<div class="xl-product-container">';
    $output .= '<div class="xl-product">';
    if($xl_loop->have_posts()){
        while($xl_loop->have_posts()) {
            $xl_loop->the_post();

            global $product;
            $product_title = get_the_title();
            
            $output .= '<div class="item">';
                $output .= '<a href="'.get_permalink().'" class="xl-img-url">';
                if (has_post_thumbnail( $xl_loop->post->ID )){
                    $output .= get_the_post_thumbnail($xl_loop->post->ID,'xl-thumb', array('class' => "xl-img"));
                }else{
                    $output .= '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />';
                }
                $output .='</a>';
                $output .= '<div class="xl-caption xl_center">';
                    $output .= '<a class="xl-title" href="'.get_permalink().'">'.$product_title.'</a>';
                    $output .= '<div class="xl-cart xl_vcs_2">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>';
                $output .= '</div><!--/.caption-->';
            $output .= '</div><!--/.item-->';
        }
    } else {
        echo 'No Product Found.';
    }
    wp_reset_postdata();
    wp_reset_query();
    $output .= '</div><!--/.xl-product-->';
    $output .= '</div><!--/.xl-product-container-->';

    return $output;    
    
}
add_shortcode('xl_product', 'xl_product_shortcode');
