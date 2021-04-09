<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Listable
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
        <div id="footer-sidebar" class="footer-widget-area" role="complementary">
            <?php dynamic_sidebar( 'footer-widget-area' ); ?>
        </div><!-- #primary-sidebar -->
    <?php endif; ?>
    <div class="footer-text-area">
        <div class="site-info">
            <?php
            $copyright_text = pixelgrade_option('footer_copyright');
            if ( $copyright_text ) : ?>
                <div class="site-copyright-area">
                    <?php
                    // We need to parse any tags present
                    $copyright_text = pixelgrade_parse_content_tags( $copyright_text );

                    // Finally process any shortcodes that might be in there
                    echo do_shortcode( $copyright_text ); ?>
                </div>
            <?php endif; ?>
            <?php
            $args = array(
                'theme_location'  => 'footer_menu',
                'container'       => '',
                'container_class' => '',
                'menu_class'      => 'footer-menu',
                'depth'           => 1,
                'fallback_cb'     => null,
            );
            wp_nav_menu( $args );
            ?>
        </div><!-- .site-info -->
        <div class="theme-info">
            <?php printf( esc_html__( '%1$s by %2$s.', 'listable' ), 'Developed', '<a href="https://semirsmajlovic.com/" rel="developer">Semir Smajlovic</a>' ); ?>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<div class="hide">
    <div class="arrow-icon-svg"><?php get_template_part( 'assets/svg/carousel-arrow-svg' ); ?></div>
    <div class="cluster-icon-svg"><?php get_template_part( 'assets/svg/map-pin-cluster-svg' ); ?></div>
    <div class="selected-icon-svg"><?php get_template_part( 'assets/svg/map-pin-selected-svg' ); ?></div>
    <div class="empty-icon-svg"><?php get_template_part( 'assets/svg/map-pin-empty-svg' ); ?></div>
    <div class="card-pin-svg"><?php get_template_part( 'assets/svg/pin-simple-svg' ); ?></div>
</div>

<?php wp_footer(); ?>

</body>
</html>