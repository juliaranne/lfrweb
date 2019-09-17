<?php

/*
Template Name: Member page template
*/

get_header(); ?>

<div class="wrap">
	<!-- <a href="http://dev.londonfrontrunners.org/members" class="member-link">Club Members' Area</a> -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div class="lfr-logo">
			<a href="/">
				<img src="<?php echo get_theme_file_uri( '/assets/images/logoSized-1.png' ); ?>" alt="London Frontrunners logo" />
			</a>
		</div>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'member' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
