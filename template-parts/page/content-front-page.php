<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );

		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap wrap--home">
			<!-- <a href="http://dev.londonfrontrunners.org/members" class="member-link">Club Members' Area</a> -->
			<header class="entry-header">
				<div class="lfr-logo">
					<a href="/">
						<img class="lfr-logo__image lfr-logo__image--home" src="<?php echo get_theme_file_uri( '/assets/images/lfr_logo.png' ); ?>" alt="London Frontrunners logo" />
					</a>
					<h2 class="lfr-tagline">London's inclusive running club for LGBT+ and gay-friendly people</h2>
				</div>
				<!-- -->

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<aside class="sidebar sidebar--home">
					<div class="sidebar__block">
						<h2 class="sidebar__title">News + Announcements</h2>
						<div class="news-posts">
							<?php
								$query = new WP_Query( array( 'category_name' => 'homepage-news,announcement' ) );
								if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
									<?php if ( in_category( 'homepage-news' ) ) : ?>
										<h2 class="news-title">
											<a href="<?php echo get_post_meta($post->ID, 'link-to', true); ?>" class="news-title__link"><?php the_title();/*3*/ ?></a>
										</h2>
										<div class="news__image">
											<?php if ( has_post_thumbnail() ) {the_post_thumbnail('medium');} ?>
										</div>
										<p><?php echo get_post_meta($post->ID, 'summary', true); ?></p>
								 		<a class="read-more" href="<?php echo get_post_meta($post->ID, 'link-to', true); ?>">Read more</a>
								 	<?php else : ?>
								 		<h2 class="news-title news-title--no-link"><?php the_title();/*3*/ ?></h2>
										<p class="announcement"><?php echo get_post_meta($post->ID, 'summary', true); ?></p>
								 	<?php endif; ?>
							<?php endwhile; endif; wp_reset_postdata(); ?>
						</div>
						<!-- <a href="http://dev.londonfrontrunners.org/news/" class="news-link cta-link">See all news</a> -->
					</div>
					<div class="sidebar__block sidebar__block--links">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div>
				</aside>
				<?php

					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );

				?>
				
			</div><!-- .entry-content -->
			<section class="homepage-features">
				<?php query_posts('category_name=splash-image'); /*1, 2*/
					if ( have_posts() ) while ( have_posts() ) : the_post(); ?><div class="image-wrapper">
						<a href="<?php echo get_post_meta($post->ID, 'link-to', true); ?>" class="hp-splash-link">
							<span class="hp-item">
								<div class="image-link">
								<?php if ( '' !== get_the_post_thumbnail()) : ?>
									<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
								<?php endif; ?></div>
							</span>
							<h2 class="splash-title"><?php the_title(); ?></h2>
						</a>
					</div><?php endwhile; ?> <?php wp_reset_query(); ?></section>
			
		</div><!-- .wrap -->
	</div><!-- .panel-content -->
	<div class="panel-content panel-content--calendar">
		<div class="wrap wrap--calendar">
			<h2 class="calendar-title">Coming up</h2>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<a href="https://londonfrontrunners.org/calendar/" class="calendar-link">View full calendar</a>
		</div>
	</div>

</article><!-- #post-## -->
