<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Icarus
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
				<header class="home-header">

					<?php if( has_post_thumbnail() ) : ?>
						<figure class="intro-image">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
						</figure>
					<?php endif; ?>

					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'home' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		<?php if( is_active_sidebar( 'sidebar-home' ) ) : ?>

			<section class="home-modules">

				<?php dynamic_sidebar( 'sidebar-home' ); ?>

			</section>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
