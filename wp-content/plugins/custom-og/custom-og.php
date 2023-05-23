<?php 
/** 
 * Plugin Name: Custom OG tags
 * Description: Set OG Tags for Single Product pages, It will get  Product title, Short Description, Permalink and Product image and set them as OG Tags
 * Author: Ramesh
 * 
 */

function custom_og() {
    global $post;

    if(is_product()) {

        if(has_post_thumbnail($post->ID)) {
            $imgsource = get_the_post_thumbnail_url($loop->post->ID);
        } else {
         
            $imgsource = WP_PLUGIN_DIR . '/og-custom/og-default.png';
        }
       
        ?>
    
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php the_excerpt(); ?>"/>
    <meta property="og:type" content="product"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $imgsource; ?>"/>

<?php
    } else {
        return;
    }
}
add_action('wp_head', 'custom_og', 5);
?>