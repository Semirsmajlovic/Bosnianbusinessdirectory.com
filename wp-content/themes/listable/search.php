<?php
/**
 * Search results archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Listable
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Search results for: %s', 'listable' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

			<div class="postcards">
				<div class="grid" id="posts-container">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="grid__item  postcard">
							<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );
							?>
						</div>
					<?php endwhile; ?>
				</div>
				<?php the_posts_navigation(); ?>
			</div>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();

