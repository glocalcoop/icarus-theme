<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Icarus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'intro' ); ?>>
	<header class="entry-header intro-header">
		<?php if( has_post_thumbnail() ) : ?>
			<figure class="intro-image">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
			</figure>
		<?php endif; ?>
		<?php the_title( '<h1 class="page-title intro-title screen-reader-text">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content intro-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'icarus' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
