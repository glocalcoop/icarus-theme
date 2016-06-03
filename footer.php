<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Icarus
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>

            <?php $widget_count = icarus_count_widgets( 'sidebar-footer' ) ?>

            <div class="footer-links widget-area <?php echo ( $widget_count ) ? $widget_count : ''; ?>" role="complementary">
                <?php dynamic_sidebar( 'sidebar-footer' ); ?>
            </div><!-- .footer-links -->

        <?php endif; ?>
            
		<div class="site-info">
			
		</div><!-- .site-info -->
        <div class="site-license">
            
        </div><!-- .site-license -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
