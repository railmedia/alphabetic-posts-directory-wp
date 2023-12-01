<?php
/**
* @package Alphabetic posts directory for WordPress
* @author  Adrian Emil Tudorache
* @license GPL-2.0+
* @link    https://www.tudorache.me/
**/

namespace Alphabetic_Posts_Dir;

class Shortcodes {

    function __construct() {
        add_shortcode( 'alphabetic-posts-dir', array( $this, 'alphabetic_posts_dir' ) );
    }

    function alphabetic_posts_dir( $atts ) {
        
        $atts = shortcode_atts( array(
            'post_type'  => 'post',
            'navigation' => '',
            'navigation_numbers' => '',
            'hide_empty' => ''
        ), $atts );

        $posts = new \WP_Query( array(
            'post_type'      => $atts['post_type'],
            'posts_per_page' => -1,
            'orderby'        => 'post_title',
            'order'          => 'ASC'
        ) );
        if( $posts->post_count ) {

            wp_enqueue_style( 'alpha-dir' );
            wp_enqueue_script( 'alpha-dir' );

            if( $atts['navigation_numbers'] ) {
                $all_letters = array_merge( range('A', 'Z'), range(0, 9) );
            } else {
                $all_letters = range('A', 'Z');
            }
            
            foreach( $posts->posts as $post ) {
                $post_title = $post->post_title;
                $post_title = str_split($post_title);
                $letters[ $post_title[0] ][] = $post;
            }

            ob_start();

            if( $atts['navigation'] ) {
            ?>
            <div class="alphabetic-posts-dir-nav">
                <?php 
                    if( $atts['hide_empty'] ) { 
                        foreach( $letters as $letter => $post ) {
                ?>
                        <div class="letter" title="Letter <?php echo strtoupper( $letter ); ?>" data-letter="<?php echo $letter; ?>"><?php echo strtoupper( $letter ); ?></div>
                <?php
                        }
                    } else {

                        foreach( $all_letters as $letter ) {
                ?>
                        <div class="letter" title="Letter <?php echo strtoupper( $letter ); ?>" data-letter="<?php echo $letter; ?>"><?php echo strtoupper( $letter ); ?></div>
                <?php
                        }
                    }
                ?>

            </div>
            <?php
            }
            ?>
            <div class="alphabetic-posts-dir">
            <?php
            foreach( $letters as $letter => $posts ) {
            ?>
                <div class="letter" data-letter="<?php echo strtoupper( $letter ); ?>">
                    <div class="char"><?php echo strtoupper( $letter ); ?></div>
                    <div class="posts">
                        <?php foreach( $posts as $post ) { ?>
                        <div class="post-title"><?php echo $post->post_title; ?></div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            </div>
            <?php

            return ob_get_clean();

        }
    
    }

}
?>